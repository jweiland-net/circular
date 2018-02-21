<?php
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
        'iconfile' => 'EXT:circular/Resources/Public/Icons/tx_circular_domain_model_circular.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, number, title, category, date_of_circular, department, file_name, files'
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, number, title, category, date_of_circular, department, file_name, files,--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,starttime, endtime']
    ],
    'palettes' => [
        '1' => ['showitem' => '']
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'foreign_table' => 'sys_language',
                'foreign_table_where' => 'ORDER BY sys_language.title',
                'items' => [
                    ['LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1],
                    ['LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0]
                ]
            ]
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
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
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255
            ]
        ],
        'hidden' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check'
            ]
        ],
        'starttime' => [
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'max' => 20,
                'eval' => 'datetime',
                'checkbox' => 0,
                'default' => 0,
                'range' => [
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ]
            ]
        ],
        'endtime' => [
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'max' => 20,
                'eval' => 'datetime',
                'checkbox' => 0,
                'default' => 0,
                'range' => [
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ]
            ]
        ],
        'number' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:circular/Resources/Private/Language/locallang_db.xlf:tx_circular_domain_model_circular.number',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ]
        ],
        'title' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:circular/Resources/Private/Language/locallang_db.xlf:tx_circular_domain_model_circular.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'category' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:circular/Resources/Private/Language/locallang_db.xlf:tx_circular_domain_model_circular.category',
            'config' => [
                'type' => 'select',
                'foreign_table' => 'tx_circular_domain_model_category',
                'size' => 1,
                'items' => [
                    ['', '']
                ],
                'default' => ''
            ]
        ],
        'date_of_circular' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:circular/Resources/Private/Language/locallang_db.xlf:tx_circular_domain_model_circular.date_of_circular',
            'config' => [
                'type' => 'input',
                'size' => 7,
                'eval' => 'date',
                'checkbox' => 1,
                'default' => time()
            ]
        ],
        'send' => [
            'config' => [
                'type' => 'passthrough'
            ]
        ],
        'department' => [
            'exclude' => 1,
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
        'file_name' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:circular/Resources/Private/Language/locallang_db.xlf:tx_circular_domain_model_circular.file_name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'files' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:circular/Resources/Private/Language/locallang_db.xlf:tx_circular_domain_model_circular.files',
            'config' => [
                'type' => 'group',
                'internal_type' => 'file',
                'allowed' => 'pdf',
                'max_size' => 16384,
                'uploadfolder' => 'uploads/tx_circular',
                'size' => 5,
                'minitems' => 0,
                'maxitems' => 1
            ]
        ]
    ]
];
