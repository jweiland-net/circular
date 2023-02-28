<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/circular.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Circular\Controller;

use DirectMailTeam\DirectMail\DirectMailUtility;
use JWeiland\Circular\Domain\Model\Circular;
use JWeiland\Circular\Domain\Model\SysDmail;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\View\StandaloneView;

/**
 * Main controller to list and show circulars
 */
class CircularController extends AbstractController
{
    public function listAction(): void
    {
        $circulars = $this->circularRepository->findBySend(0);
        $this->view->assign('circulars', $circulars);
        $this->view->assign('departments', $this->departmentRepository->findAll());
        $this->view->assign('categories', $this->getCategories());
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
            $sysDmail
                ->setSubject($circular->getTitle())
                ->setFromEmail($this->extConf->getFromEmail())
                ->setFromName($this->extConf->getFromName())
                ->setReplytoEmail($this->extConf->getReplytoEmail())
                ->setReplytoName($this->extConf->getReplytoName())
                ->setOrganisation($this->extConf->getOrganisation())
                ->setMailcontent(
                    \base64_encode(
                        \serialize(
                            [
                                'html' => [
                                    'content' => $this->getMailContent($circular),
                                ],
                            ],
                        )
                    )
                )
                ->setQueryInfo($queryInfo)
                ->setScheduled(\time()) // can not be 0 and must be less than time() when scheduler was invoked
                ->setLongLinkRdctUrl(DirectMailUtility::getUrlBase(1));
            $this->sysDmailRepository->add($sysDmail);
        }
        $this->redirect('list');
    }

    public function getMailContent(Circular $circular): string
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
}
