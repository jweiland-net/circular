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

$GLOBALS['TCA']['sys_dmail']['columns']['mailContent'] = [
    'config' => [
        'type' => 'passthrough',
    ],
];

$GLOBALS['TCA']['sys_dmail']['columns']['query_info'] = [
    'config' => [
        'type' => 'passthrough',
    ],
];
