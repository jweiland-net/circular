<?php

/*
 * This file is part of the package jweiland/circular.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

return [
    'ctrl' => [
        'title' => 'LLL:EXT:circular/Resources/Private/Language/locallang_db.xlf:tx_circular_domain_model_circular',
        'label' => 'number',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
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
        'typeicon_classes' => [
            'default' => 'ext-circular-circular'
        ]
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, number, title, category, date_of_circular, department, files'
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, number, title, category, date_of_circular, department, files,--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.access,starttime, endtime']
    ],
    'palettes' => [
        '1' => ['showitem' => '']
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'sys_language',
                'foreign_table_where' => 'ORDER BY sys_language.title',
                'items' => [
                    ['LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages', -1],
                    ['LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.default_value', 0]
                ]
            ]
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0]
                ],
                'foreign_table' => 'tx_circular_domain_model_circular',
                'foreign_table_where' => 'AND tx_circular_domain_model_circular.pid=###CURRENT_PID### AND tx_circular_domain_model_circular.sys_language_uid IN (-1,0)'
            ]
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough'
            ]
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255
            ]
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check'
            ]
        ],
        'starttime' => [
            'exclude' => true,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'max' => 20,
                'eval' => 'datetime',
                'renderType' => 'inputDateTime',
                'checkbox' => 0,
                'default' => 0,
                'range' => [
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ]
            ]
        ],
        'endtime' => [
            'exclude' => true,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'max' => 20,
                'eval' => 'datetime',
                'renderType' => 'inputDateTime',
                'checkbox' => 0,
                'default' => 0,
                'range' => [
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ]
            ]
        ],
        'number' => [
            'label' => 'LLL:EXT:circular/Resources/Private/Language/locallang_db.xlf:tx_circular_domain_model_circular.number',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ]
        ],
        'title' => [
            'label' => 'LLL:EXT:circular/Resources/Private/Language/locallang_db.xlf:tx_circular_domain_model_circular.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ]
        ],
        'category' => [
            'exclude' => true,
            'label' => 'LLL:EXT:circular/Resources/Private/Language/locallang_db.xlf:tx_circular_domain_model_circular.category',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_circular_domain_model_category',
                'size' => 1,
                'items' => [
                    ['', '']
                ],
                'default' => ''
            ]
        ],
        'date_of_circular' => [
            'label' => 'LLL:EXT:circular/Resources/Private/Language/locallang_db.xlf:tx_circular_domain_model_circular.date_of_circular',
            'config' => [
                'type' => 'input',
                'size' => 7,
                'eval' => 'date,required',
                'renderType' => 'inputDateTime',
                'checkbox' => 1,
                'default' => time(),
            ]
        ],
        'send' => [
            'config' => [
                'type' => 'passthrough'
            ]
        ],
        'department' => [
            'exclude' => true,
            'label' => 'LLL:EXT:circular/Resources/Private/Language/locallang_db.xlf:tx_circular_domain_model_circular.department',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_circular_domain_model_department',
                'foreign_table' => 'tx_circular_domain_model_department', // this is only for extbase internal
                'size' => 1,
                'minitems' => 0,
                'maxitems' => 1,
                'wizards' => [
                    'add' => [
                        'type' => 'script',
                        'title' => 'LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:be_users.usergroup_add_title',
                        'icon' => 'add.gif',
                        'params' => [
                            'table' => 'tx_circular_domain_model_department',
                            'pid' => '###CURRENT_PID###',
                            'setValue' => 'set'
                        ],
                        'module' => [
                            'name' => 'wizard_add'
                        ]
                    ],
                    'suggest' => [
                        'type' => 'suggest',
                        'minimumCharacters' => 3,
                        'searchWholePhrase' => true
                    ]
                ]
            ]
        ],
        'files' => [
            'exclude' => true,
            'label' => 'LLL:EXT:circular/Resources/Private/Language/locallang_db.xlf:tx_circular_domain_model_circular.files',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'files',
                [
                    'maxitems' => 1,
                    'minitems' => 0,
                ],
                'pdf'
            )
        ]
    ]
];
