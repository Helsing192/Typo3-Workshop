<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

ExtensionUtility::registerPlugin(
    'NewsExtension',
    'Pi1',
    'News extension plugin' // A title shown in the backend dropdown field
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['newsextension_pi1'] = 'select_key';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['newsextension_pi1'] = 'pi_flexform';

ExtensionManagementUtility::addPiFlexFormValue(
    'newsextension_pi1',
    'FILE:EXT:news_extension/Configuration/FlexForms/PluginSettings.xml'
);
