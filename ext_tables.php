<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

call_user_func(static function () {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
        'Circular',
        'web',     // Make module a submodule of 'web'
        'circular', // Submodule key
        '',               // Position
        [
            \JWeiland\Circular\Controller\MaintenanceController::class => 'list, show, delete, prepare',
        ],
        [
            'access' => 'user,group',
            'icon' => 'EXT:circular/Resources/Public/Icons/Extension.svg',
            'labels' => 'LLL:EXT:circular/Resources/Private/Language/locallang_circular.xlf',
        ]
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
        'tx_circular_domain_model_circular',
        'EXT:circular/Resources/Private/Language/locallang_csh_tx_circular_domain_model_circular.xlf'
    );
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
        'tx_circular_domain_model_department',
        'EXT:circular/Resources/Private/Language/locallang_csh_tx_circular_domain_model_department.xlf'
    );
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
        'tx_circular_domain_model_category',
        'EXT:circular/Resources/Private/Language/locallang_csh_tx_circular_domain_model_category.xlf'
    );
});
