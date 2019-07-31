<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Circular',
    'description' => 'circular',
    'category' => 'plugin',
    'author' => 'Stefan Froemken',
    'author_email' => 'sfroemken@jweiland.net',
    'author_company' => 'jweiland.net',
    'shy' => '',
    'priority' => '',
    'module' => '',
    'state' => 'stable',
    'internal' => '',
    'uploadfolder' => '1',
    'createDirs' => '',
    'modify_tables' => '',
    'clearCacheOnLoad' => 0,
    'lockType' => '',
    'version' => '2.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.0-9.5.99',
            'direct_mail' => '5.2.0-5.2.99',
            'telephonedirectory' => '2.0.0-2.99.99'
        ],
        'conflicts' => [],
        'suggests' => []
    ]
];
