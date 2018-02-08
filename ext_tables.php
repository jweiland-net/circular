<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'JWeiland.' . $_EXTKEY,
    'Circular',
    'LLL:EXT:circular/Resources/Private/Language/locallang_db.xlf:plugin.circular.title'
);
if (TYPO3_MODE === 'BE') {
    /**
     * Registers a Backend Module
     */
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
}
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Circular');
$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY . '_circular'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    $_EXTKEY . '_circular',
    'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/Circular.xml'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
    'tx_circular_domain_model_circular',
    'EXT:circular/Resources/Private/Language/locallang_csh_tx_circular_domain_model_circular.xlf'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_circular_domain_model_circular');
$TCA['tx_circular_domain_model_circular'] = [
    'ctrl' => [
        'title' => 'LLL:EXT:circular/Resources/Private/Language/locallang_db.xlf:tx_circular_domain_model_circular',
        'label' => 'number',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'dividers2tabs' => true,
        'default_sortby' => 'ORDER BY crdate DESC',
        'versioningWS' => 2,
        'versioning_followPages' => true,
        'origUid' => 't3_origuid',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime'
        ],
        'searchFields' => 'number,title',
        'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Circular.php',
        'iconfile' => 'EXT:circular/Resources/Public/Icons/tx_circular_domain_model_circular.gif'
    ]
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
    'tx_circular_domain_model_department',
    'EXT:circular/Resources/Private/Language/locallang_csh_tx_circular_domain_model_department.xlf'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_circular_domain_model_department');
$TCA['tx_circular_domain_model_department'] = [
    'ctrl' => [
        'title' => 'LLL:EXT:circular/Resources/Private/Language/locallang_db.xlf:tx_circular_domain_model_department',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'dividers2tabs' => true,
        'versioningWS' => 2,
        'versioning_followPages' => true,
        'origUid' => 't3_origuid',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime'
        ],
        'searchFields' => 'title',
        'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Department.php',
        'iconfile' => 'EXT:circular/Resources/Public/Icons/tx_circular_domain_model_department.gif'
    ]
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
    'tx_circular_domain_model_category',
    'EXT:circular/Resources/Private/Language/locallang_csh_tx_circular_domain_model_category.xlf'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_circular_domain_model_category');
$TCA['tx_circular_domain_model_category'] = [
    'ctrl' => [
        'title' => 'LLL:EXT:circular/Resources/Private/Language/locallang_db.xlf:tx_circular_domain_model_category',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'dividers2tabs' => true,
        'versioningWS' => 2,
        'versioning_followPages' => true,
        'origUid' => 't3_origuid',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime'
        ],
        'searchFields' => 'title',
        'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Category.php',
        'iconfile' => 'EXT:circular/Resources/Public/Icons/tx_circular_domain_model_category.gif'
    ]
];
