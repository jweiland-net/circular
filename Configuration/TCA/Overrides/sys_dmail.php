<?php
if (!defined('TYPO3_MODE')) {
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
