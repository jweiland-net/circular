<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/circular.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Circular\Controller;

use JWeiland\Circular\Configuration\ExtConf;
use JWeiland\Circular\Domain\Model\Circular;
use JWeiland\Circular\Domain\Model\SysDmail;
use JWeiland\Circular\Domain\Model\Telephone;
use JWeiland\Circular\Domain\Repository\CircularRepository;
use JWeiland\Circular\Domain\Repository\DepartmentRepository;
use JWeiland\Circular\Domain\Repository\SysDmailRepository;
use JWeiland\Circular\Domain\Repository\TelephoneRepository;
use JWeiland\Circular\Event\PostProcessFluidVariablesEvent;
use TYPO3\CMS\Core\Exception\SiteNotFoundException;
use TYPO3\CMS\Core\Site\SiteFinder;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;
use TYPO3\CMS\Fluid\View\StandaloneView;

/**
 * Main controller to list and show circulars
 */
class CircularController extends ActionController
{
    /**
     * @var CircularRepository
     */
    protected $circularRepository;

    /**
     * @var TelephoneRepository
     */
    protected $telephoneRepository;

    /**
     * @var SysDmailRepository
     */
    protected $sysDmailRepository;

    /**
     * @var DepartmentRepository
     */
    protected $departmentRepository;

    /**
     * @var ExtConf
     */
    protected $extConf;

    public function injectCircularRepository(CircularRepository $circularRepository): void
    {
        $this->circularRepository = $circularRepository;
    }

    public function injectTelephoneRepository(TelephoneRepository $telephoneRepository): void
    {
        $this->telephoneRepository = $telephoneRepository;
    }

    public function injectSysDmailRepository(SysDmailRepository $sysDmailRepository): void
    {
        $this->sysDmailRepository = $sysDmailRepository;
    }

    public function injectDepartmentRepository(DepartmentRepository $departmentRepository): void
    {
        $this->departmentRepository = $departmentRepository;
    }

    public function injectExtConf(ExtConf $extConf): void
    {
        $this->extConf = $extConf;
    }

    public function listAction(): void
    {
        $this->postProcessAndAssignFluidVariables([
            'circulars' => $this->circularRepository->findBySend(0),
            'departments' => $this->departmentRepository->findAll(),
            'categories' => $this->getCategories(),
        ]);
    }

    public function showAction(Circular $circular): void
    {
        $this->view->assign('circular', $circular);
    }

    public function prepareAction(array $circulars = []): void
    {
        // get recipients from telephone directory
        $recipients = $this->telephoneRepository->getRecipientsFromPid((int)$this->settings['pidOfTelephoneDirectory']);
        // query info is a serialized value for recipients in sys_dmail-table
        $queryInfo = $this->buildQueryInfo('tx_telephonedirectory_domain_model_employee', $recipients);
        // loop through circulars and create a sys_dmail-record
        foreach ($circulars as $circularUid) {
            /** @var Circular $circular */
            $circular = $this->circularRepository->findByIdentifier($circularUid);
            // if there are no files in circular don't create an dmail entry
            if (\count($circular->getFiles()) === 0) {
                continue;
            }

            $sysDmail = GeneralUtility::makeInstance(SysDmail::class);
            $sysDmail->setSubject($circular->getTitle());
            $sysDmail->setFromEmail($this->extConf->getFromEmail());
            $sysDmail->setFromName($this->extConf->getFromName());
            $sysDmail->setReplytoEmail($this->extConf->getReplytoEmail());
            $sysDmail->setReplytoName($this->extConf->getReplytoName());
            $sysDmail->setOrganisation($this->extConf->getOrganisation());
            $sysDmail->setMailcontent(
                \base64_encode(
                    \serialize(
                        [
                            'html' => [
                                'content' => $this->getMailContent($circular),
                            ],
                        ],
                    )
                )
            );
            $sysDmail->setQueryInfo($queryInfo);
            $sysDmail->setScheduled(\time()); // can not be 0 and must be less than time() when scheduler was invoked
            $sysDmail->setLongLinkRdctUrl($this->getUrlBase(1));
            $this->sysDmailRepository->add($sysDmail);
        }

        $this->redirect('list');
    }

    /**
     * SF: As getUrlBase of direct_mail package was moved as protected method into DmailController
     * we can not call it anymore.
     * That's why I have copy&pasted that method into our own CircularController now.
     *
     * @param int $pageId
     * @return string
     * @throws SiteNotFoundException
     */
    protected function getUrlBase(int $pageId): string
    {
        if ($pageId > 0) {
            $siteFinder = GeneralUtility::makeInstance(SiteFinder::class);
            if (!empty($siteFinder->getAllSites())) {
                $site = $siteFinder->getSiteByPageId($pageId);
                $base = $site->getBase();

                return sprintf('%s://%s', $base->getScheme(), $base->getHost());
            }

            return ''; // No site found in root line of pageId
        }

        return ''; // No valid pageId
    }

    protected function getMailContent(Circular $circular): string
    {
        $baseUri = $this->getControllerContext()->getRequest()->getBaseUri();
        $baseUriForFe = \substr($baseUri, 0, -6);

        $view = GeneralUtility::makeInstance(StandaloneView::class);
        $view->setTemplatePathAndFilename(
            ExtensionManagementUtility::extPath('circular') . 'Resources/Private/Templates/Mail/Circular.html'
        );
        $view->setControllerContext($this->getControllerContext());
        $view->assign('settings', $this->settings);
        $view->assign('circular', $circular);
        $view->assign('baseUri', $baseUriForFe);

        return $view->render();
    }

    /**
     * Build serialized query info
     *
     * @param QueryResultInterface|Telephone[] $telephones
     * @return string serialized query info for sysDmail
     */
    protected function buildQueryInfo(string $table, QueryResultInterface $telephones): string
    {
        $listOfUids = [];
        foreach ($telephones as $telephone) {
            $listOfUids[] = $telephone->getUid();
        }

        $queryInfo = [
            'id_lists' => [
                $table => $listOfUids,
            ],
        ];

        return \serialize($queryInfo);
    }

    /**
     * Get categories for select box in search form
     */
    protected function getCategories(): array
    {
        $categories = [];
        foreach (['circular', 'aboutDisposal', 'vacancy'] as $entry) {
            $category = new \stdClass();
            $category->key = $entry;
            $category->value = LocalizationUtility::translate(
                'tx_circular_domain_model_circular.category.' . $entry,
                'circular'
            );
            $categories[] = $category;
        }

        return $categories;
    }

    protected function postProcessAndAssignFluidVariables(array $variables = []): void
    {
        /** @var PostProcessFluidVariablesEvent $event */
        $event = $this->eventDispatcher->dispatch(
            new PostProcessFluidVariablesEvent(
                $this->request,
                $this->settings,
                $variables
            )
        );

        $this->view->assignMultiple($event->getFluidVariables());
    }
}
