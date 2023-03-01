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
use JWeiland\Circular\Domain\Repository\SysDmailRepository;
use JWeiland\Circular\Domain\Repository\TelephoneRepository;
use TYPO3\CMS\Backend\View\BackendTemplateView;
use TYPO3\CMS\Core\Core\Environment;
use TYPO3\CMS\Core\Exception\SiteNotFoundException;
use TYPO3\CMS\Core\Messaging\AbstractMessage;
use TYPO3\CMS\Core\Site\SiteFinder;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\PathUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Fluid\View\StandaloneView;

/**
 * Maintenance controller to register circulars for direct_mail
 */
class MaintenanceController extends ActionController
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
     * @var ExtConf
     */
    protected $extConf;

    /**
     * The default view object to use if none of the resolved views can render
     * a response for the current request.
     *
     * @var string
     */
    protected $defaultViewObjectName = BackendTemplateView::class;

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

    public function injectExtConf(ExtConf $extConf): void
    {
        $this->extConf = $extConf;
    }

    public function listAction(): void
    {
        if ((int)($this->settings['pidOfTelephoneDirectory'] ?? 0) <= 0) {
            $this->addFlashMessage('Please set settings.pidOfTelephoneDirectory to a value higher than 0');
        }

        $this->view->assign('circulars', $this->circularRepository->findBySend(0));
    }

    public function showAction(Circular $circular): void
    {
        $this->view->assign('circular', $circular);
    }

    public function deleteAction(Circular $circular): void
    {
        $this->circularRepository->remove($circular);

        $this->addFlashMessage('Circular record with number ' . $circular->getNumber() . ' has been deleted');

        $this->redirect('list');
    }

    public function prepareAction(array $circulars = []): void
    {
        // Early return
        if (($pidOfTelephoneDirectory = (int)($this->settings['pidOfTelephoneDirectory'] ?? 0)) <= 0) {
            $this->addFlashMessage(
                'Please set settings.pidOfTelephoneDirectory to a value higher than 0',
                'Empty PID in TypoScript',
                AbstractMessage::ERROR
            );
            $this->redirect('list');
        }

        if ($circulars === []) {
            $this->addFlashMessage(
                'Please choose at least one circular from list',
                'Empty Selection',
                AbstractMessage::ERROR
            );
            $this->redirect('list');
        }

        $recipients = $this->telephoneRepository->getRecipientsFromPid($pidOfTelephoneDirectory);
        if ($recipients->count() === 0) {
            $this->addFlashMessage(
                'Recipient list of telephonedirectory is empty. Please configure your recipients first.',
                'No Recipients found',
                AbstractMessage::ERROR
            );
            $this->redirect('list');
        }

        // Query info is a serialized value for recipients in sys_dmail-table
        $queryInfo = $this->buildQueryInfo('tx_telephonedirectory_domain_model_employee', $recipients);

        // Loop through circulars and create a sys_dmail-record
        $counter = 0;
        foreach ($circulars as $circularUid) {
            /** @var Circular $circular */
            $circular = $this->circularRepository->findByIdentifier($circularUid);
            if (\count($circular->getFiles()) === 0) {
                $this->addFlashMessage('Skipping circular UID: ' . $circularUid . ' as it does not contain any files');

                continue;
            }

            $sysDmail = GeneralUtility::makeInstance(SysDmail::class);
            $sysDmail->setSubject($circular->getTitle());
            $sysDmail->setFromEmail($this->extConf->getFromEmail());
            $sysDmail->setFromName($this->extConf->getFromName());
            $sysDmail->setReplytoEmail($this->extConf->getReplytoEmail());
            $sysDmail->setReplytoName($this->extConf->getReplytoName());
            $sysDmail->setOrganisation($this->extConf->getOrganisation());
            $sysDmail->setMailContent(
                \base64_encode(
                    \serialize(
                        [
                            'html' => [
                                'content' => $this->getMailContent($circular),
                            ],
                            'messageid' => $this->getMessageID(),
                        ],
                    )
                )
            );
            $sysDmail->setQueryInfo($queryInfo);
            $sysDmail->setScheduled(\time()); // can not be 0 and must be less than time() when scheduler was invoked
            $sysDmail->setLongLinkRdctUrl($this->getUrlBase(1));

            $this->sysDmailRepository->add($sysDmail);

            $counter++;
        }

        $this->addFlashMessage('We have added ' . $counter . ' records to next mail queue (sys_dmail)');

        $this->redirect('list');
    }

    /**
     * SF: This is a copy of the first parts of Dmailer::start()
     * to be as compatible as possible
     */
    protected function getMessageID(): string
    {
        $host = $this->getHostname();
        if (!$host || $host === '127.0.0.1' || $host === 'localhost' || $host === 'localhost.localdomain') {
            $host = ($GLOBALS['TYPO3_CONF_VARS']['SYS']['sitename'] ? preg_replace('/[^A-Za-z0-9_\-]/', '_', $GLOBALS['TYPO3_CONF_VARS']['SYS']['sitename']) : 'localhost') . '.TYPO3';
        }

        $idLeft = time() . '.' . uniqid();
        $idRight = !empty($host) ? $host : 'symfony.generated';

        return $idLeft . '@' . $idRight;
    }

    /**
     * Get the fully-qualified domain name of the host
     *
     * SF: This is a copy of Dmailer class to be as compitible as possible
     *
     * @param bool $requestHost Use request host (when not in CLI mode).
     * @return string The fully-qualified host name.
     */
    protected function getHostname(bool $requestHost = true): string
    {
        $host = '';
        // If not called from the command-line, resolve on getIndpEnv()
        if ($requestHost && !Environment::isCli()) {
            $host = GeneralUtility::getIndpEnv('HTTP_HOST');
        }
        if (!$host) {
            // will fail for PHP 4.1 and 4.2
            $host = @php_uname('n');
            // 'n' is ignored in broken installations
            if (strpos($host, ' ')) {
                $host = '';
            }
        }
        // We have not found a FQDN yet
        if ($host && !str_contains($host, '.')) {
            $ip = gethostbyname($host);
            // We got an IP address
            if ($ip !== $host) {
                $fqdn = gethostbyaddr($ip);
                if ($ip !== $fqdn) {
                    $host = $fqdn;
                }
            }
        }
        if (!$host) {
            $host = 'localhost.localdomain';
        }
        return $host;
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
        $view = GeneralUtility::makeInstance(StandaloneView::class);
        $view->setTemplatePathAndFilename(
            'EXT:circular/Resources/Private/Templates/Mail/Circular.html'
        );
        $view->setControllerContext($this->getControllerContext());
        $view->assignMultiple([
            'settings' => $this->settings,
            'circular' => $circular,
            'baseUri' => GeneralUtility::locationHeaderUrl(
                PathUtility::getAbsoluteWebPath(
                    Environment::getPublicPath()
                )
            ),
        ]);

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
}
