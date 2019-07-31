<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'JWeiland.' . $_EXTKEY,
    'Circular',
    'LLL:EXT:circular/Resources/Private/Language/locallang_db.xlf:plugin.circular.title'
);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
    'JWeiland.' . $_EXTKEY,
    'web',     // Make module a submodule of 'web'
    'circular',    // Submodule key
    '',                        // Position
    [
        'Circular' => 'list, show, prepare'
    ],
    [
        'access' => 'user,group',
        'icon' => 'EXT:' . $_EXTKEY . '/ext_icon.gif',
        'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_circular.xlf'
    ]
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Circular');
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY . '_circular'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    $_EXTKEY . '_circular',
    'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/Circular.xml'
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
