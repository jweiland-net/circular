<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Circular',
    'description' => 'circular',
    'category' => 'plugin',
    'author' => 'Stefan Froemken',
    'author_email' => 'sfroemken@jweiland.net',
    'author_company' => 'jweiland.net',
    'state' => 'stable',
    'version' => '4.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.36-11.5.99',
            'direct_mail' => '5.2.0-7.99.99',
            'telephonedirectory' => '3.0.0-0.0.0.',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
];
