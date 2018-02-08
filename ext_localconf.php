<?php

use JWeiland\Circular\Controller\FilesCommandController;

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'JWeiland.' . $_EXTKEY,
    'Circular',
    [
        'Circular' => 'list, show'
    ],
    // non-cacheable actions
    [
        'Circular' => ''
    ]
);
if (TYPO3_MODE === 'BE') {
    // move files from uploads/tx_files to uploads/tx_circular
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['extbase']['commandControllers'][] = FilesCommandController::class;
}
