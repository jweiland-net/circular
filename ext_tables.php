<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

call_user_func(static function () {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        'Circular',
        'Circular',
        'LLL:EXT:circular/Resources/Private/Language/locallang_db.xlf:plugin.circular.title'
    );
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
        'Circular',
        'web',     // Make module a submodule of 'web'
        'circular',    // Submodule key
        '',                        // Position
        [
            \JWeiland\Circular\Controller\CircularController::class => 'list, show, prepare',
        ],
        [
            'access' => 'user,group',
            'icon' => 'EXT:circular/Resources/Public/Icons/Extension.svg',
            'labels' => 'LLL:EXT:circular/Resources/Private/Language/locallang_circular.xlf',
        ]
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('circular', 'Configuration/TypoScript', 'Circular');
    $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['circular_circular'] = 'pi_flexform';
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
        'circular_circular',
        'FILE:EXT:circular/Configuration/FlexForms/Circular.xml'
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_circular_domain_model_circular');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_circular_domain_model_department');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_circular_domain_model_category');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
        'tx_circular_domain_model_circular',
        'EXT:circular/Resources/Private/Language/locallang_csh_tx_circular_domain_model_circular.xlf'
    );
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
        'tx_circular_domain_model_department',
        'EXT:circular/Resources/Private/Language/locallang_csh_tx_circular_domain_model_department.xlf'
    );
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
        'tx_circular_domain_model_category',
        'EXT:circular/Resources/Private/Language/locallang_csh_tx_circular_domain_model_category.xlf'
    );
});
