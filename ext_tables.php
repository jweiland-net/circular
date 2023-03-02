<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

call_user_func(static function () {
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
