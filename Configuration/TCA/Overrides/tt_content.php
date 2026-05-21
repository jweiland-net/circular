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

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

ExtensionUtility::registerPlugin(
    'Circular',
    'Circular',
    'LLL:EXT:circular/Resources/Private/Language/locallang_db.xlf:plugin.circular.title',
    'ext-circular-circular',
    'plugins',
    'LLL:EXT:circular/Resources/Private/Language/locallang_db.xlf:plugin.circular.description',
);

ExtensionManagementUtility::addPiFlexFormValue(
    '*',
    'FILE:EXT:circular/Configuration/FlexForms/Circular.xml',
    'circular_circular',
);

ExtensionManagementUtility::addToAllTCAtypes(
    'tt_content',
    '--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:plugin,pi_flexform',
    'circular_circular',
    'after:subheader',
);
