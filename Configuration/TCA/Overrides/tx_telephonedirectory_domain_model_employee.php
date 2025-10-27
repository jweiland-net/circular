<?php

/*
 * This file is part of the package jweiland/circular.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

if (!defined('TYPO3')) {
    die('Access denied.');
}

// We have to add this column to employee to prevent a null exception in direct_mail:
// $rows = GeneralUtility::makeInstance(TempRepository::class)->getListOfRecipentCategories($table, $relationTable, $uid);
$employeeColumns = [
    'module_sys_dmail_category' => [
        'label' => 'LLL:EXT:direct_mail/Resources/Private/Language/locallang_tca.xlf:sys_dmail_category.category',
        'exclude' => '1',
        'l10n_mode' => 'exclude',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectCheckBox',
            'renderMode' => 'checkbox',
            'foreign_table' => 'sys_dmail_category',
            'foreign_table_where' => 'AND sys_dmail_category.l18n_parent=0 AND sys_dmail_category.pid IN (###PAGE_TSCONFIG_IDLIST###) ORDER BY sys_dmail_category.sorting',
            'itemsProcFunc' => DirectMailTeam\DirectMail\SelectCategories::class . '->getLocalizedCategories',
            'itemsProcFunc_config' => [
                'table' => 'sys_dmail_category',
                'indexField' => 'uid',
            ],
            'size' => 5,
            'minitems' => 0,
            'maxitems' => 60,
            'MM' => 'sys_dmail_ttcontent_category_mm',
        ],
    ],
];

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
    'tx_telephonedirectory_domain_model_employee',
    $employeeColumns,
);

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCATypes(
    'tx_telephonedirectory_domain_model_employee',
    'module_sys_dmail_category',
);
