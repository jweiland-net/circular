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

call_user_func(static function () {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Circular',
        'Circular',
        [
            \JWeiland\Circular\Controller\CircularController::class => 'list, show',
        ],
        // non-cacheable actions
        [
            \JWeiland\Circular\Controller\CircularController::class => '',
        ],
    );

    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['circularFiles']
        = \JWeiland\Circular\Updates\FilesUpdateWizard::class;

    // Add circular plugin to new element wizard
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:circular/Configuration/TSconfig/ContentElementWizard.tsconfig">',
    );

    // Register SVG Icon Identifier
    $svgIcons = [
        'ext-circular-category' => 'category.svg',
        'ext-circular-circular' => 'circular.svg',
        'ext-circular-department' => 'department.svg',
    ];
    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
    foreach ($svgIcons as $identifier => $fileName) {
        $iconRegistry->registerIcon(
            $identifier,
            \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
            ['source' => 'EXT:circular/Resources/Public/Icons/' . $fileName],
        );
    }
});
