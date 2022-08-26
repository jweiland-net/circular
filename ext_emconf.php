<?php

/*
 * This file is part of the package jweiland/circular.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

$EM_CONF[$_EXTKEY] = [
    'title' => 'Circular',
    'description' => 'circular',
    'category' => 'plugin',
    'author' => 'Stefan Froemken',
    'author_email' => 'sfroemken@jweiland.net',
    'author_company' => 'jweiland.net',
    'state' => 'stable',
    'clearCacheOnLoad' => 0,
    'version' => '3.0.2',
    'constraints' => [
        'depends' => [
            'typo3' => '9.5.0-10.4.99',
            'direct_mail' => '5.2.0-7.99.99',
            'telephonedirectory' => '2.0.0-3.99.99',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
];
