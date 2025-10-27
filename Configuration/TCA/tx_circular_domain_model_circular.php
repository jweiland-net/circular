<?php

/*
 * This file is part of the package jweiland/circular.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

return [
    'ctrl' => [
        'title' => 'LLL:EXT:circular/Resources/Private/Language/locallang_db.xlf:tx_circular_domain_model_circular',
        'label' => 'number',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'default_sortby' => 'ORDER BY crdate DESC',
        'versioningWS' => true,
        'origUid' => 't3_origuid',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'number,title',
        'typeicon_classes' => [
            'default' => 'ext-circular-circular',
        ],
    ],
    'types' => [
        '1' => [
            'showitem' => '--palette--;;language, --palette--;;numberHidden, --palette--;;titleDate,
            category, department, files,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.access, 
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.access;access',
        ],
    ],
    'palettes' => [
        'language' => ['showitem' => 'sys_language_uid, l10n_parent'],
        'numberHidden' => ['showitem' => 'number, hidden'],
        'titleDate' => ['showitem' => 'title, date_of_circular'],
        'access' => [
            'showitem' => 'starttime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:starttime_formlabel,endtime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:endtime_formlabel',
        ],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple',
                    ],
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_circular_domain_model_circular',
                'size' => 1,
                'maxitems' => 1,
                'minitems' => 0,
                'default' => 0,
            ],
        ],
        'l10n_source' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true,
                    ],
                ],
            ],
        ],
        'cruser_id' => [
            'label' => 'cruser_id',
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'pid' => [
            'label' => 'pid',
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'crdate' => [
            'label' => 'crdate',
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'tstamp' => [
            'label' => 'tstamp',
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'number' => [
            'label' => 'LLL:EXT:circular/Resources/Private/Language/locallang_db.xlf:tx_circular_domain_model_circular.number',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required',
            ],
        ],
        'title' => [
            'label' => 'LLL:EXT:circular/Resources/Private/Language/locallang_db.xlf:tx_circular_domain_model_circular.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required',
            ],
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
                    ['', ''],
                ],
                'default' => '',
            ],
        ],
        'date_of_circular' => [
            'label' => 'LLL:EXT:circular/Resources/Private/Language/locallang_db.xlf:tx_circular_domain_model_circular.date_of_circular',
            'config' => [
                'type' => 'input',
                'size' => 7,
                'renderType' => 'inputDateTime',
                'eval' => 'date,required',
                'checkbox' => 1,
                'default' => time(),
            ],
        ],
        'send' => [
            'config' => [
                'type' => 'passthrough',
            ],
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
                'fieldControl' => [
                    'addRecord' => [
                        'disabled' => false,
                        'options' => [
                            'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:be_users.usergroup_add_title',
                            'table' => 'tx_circular_domain_model_department',
                            'pid' => '###CURRENT_PID###',
                            'setValue' => 'set',
                        ],
                    ],
                ],
                'suggestOptions' => [
                    'minimumCharacters' => 3,
                    'searchWholePhrase' => true,
                ],
            ],
        ],
        'files' => [
            'exclude' => true,
            'label' => 'LLL:EXT:circular/Resources/Private/Language/locallang_db.xlf:tx_circular_domain_model_circular.files',
            'config' => [
                'type' => 'file',
                'maxitems' => 1,
                'minitems' => 0,
                'allowed' => 'pdf'
            ],
            'default' => '',
        ],
    ],
];
