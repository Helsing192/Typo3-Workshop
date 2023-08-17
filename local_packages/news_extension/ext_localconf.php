<?php

defined('TYPO3') or die();

use Bikar\NewsExtension\Controller\FrontendController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

(static function (string $extensionName): void {
    /**
     * Configure the Plugin to call the
     * right combination of Controller and Action according to
     * the user input (default settings, FlexForm, URL etc.)
     */
        ExtensionUtility::configurePlugin(
            $extensionName,
            'Pi1',
            // Cache-able Controller-Actions
            [
                FrontendController::class => 'list,show',
            ],
            // Non-Cache-able Controller-Actions
            [
                FrontendController::class => 'list,show',
            ]
        );
})('NewsExtension');
