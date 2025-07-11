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

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Circular',
    'Circular',
    'LLL:EXT:circular/Resources/Private/Language/locallang_db.xlf:plugin.circular.title',
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['circular_circular'] = 'pi_flexform';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    'circular_circular',
    'FILE:EXT:circular/Configuration/FlexForms/Circular.xml',
);
