<?php
namespace JWeiland\Circular\Controller;

/*
 * This file is part of the circular project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use DirectMailTeam\DirectMail\DirectMailUtility;
use JWeiland\Circular\Domain\Model\Circular;
use JWeiland\Circular\Domain\Model\SysDmail;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Fluid\View\StandaloneView;

/**
 * Class CircularController
 *
 * @package JWeiland\Circular\Controller
 */
class CircularController extends AbstractController
{
    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $circulars = $this->circularRepository->findBySend(0);
        $this->view->assign('circulars', $circulars);
        $this->view->assign('departments', $this->departmentRepository->findAll());
        $this->view->assign('categories', $this->getCategories());
    }

    /**
     * action show
     *
     * @param Circular $circular
     * @return void
     */
    public function showAction(Circular $circular)
    {
        $this->view->assign('circular', $circular);
    }

    /**
     * action prepare
     *
     * @param array $circulars
     * @return void
     */
    public function prepareAction(array $circulars = [])
    {
        // get recipients from telephone directory
        $recipients = $this->telephoneRepository->getRecipientsFromPid($this->settings['pidOfTelephoneDirectory']);
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
            //$circular->setSend(TRUE);
            //$this->circularRepository->update($circular);
            /** @var SysDmail $sysDmail */
            $sysDmail = $this->objectManager->get(SysDmail::class);
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
                                'content' => $this->getMailContent($circular)
                            ]
                        ]
                    )
                )
            );
            $sysDmail->setQueryInfo($queryInfo);
            $sysDmail->setScheduled(\time()); // can not be 0 and must be less than time() when scheduler was invoked
            $sysDmail->setLongLinkRdctUrl(DirectMailUtility::getUrlBase(true));
            $this->sysDmailRepository->add($sysDmail);
        }
        $this->redirect('list');
    }

    /**
     * get mail content
     *
     * @param Circular $circular
     * @return string
     */
    public function getMailContent(Circular $circular)
    {
        $baseUri = $this->getControllerContext()->getRequest()->getBaseUri();
        $baseUriForFe = \substr($baseUri, 0, -6);
        /** @var StandaloneView $view */
        $view = $this->objectManager->get(StandaloneView::class);
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
