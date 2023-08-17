<?php

return [
    'news_extension_icon' => [
        'provider' => \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        'source' => 'EXT:news_extension/Resources/Public/Icons/Extension.svg',
    ],
    'newsextension_frontend' => [
        'provider' => \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
        'source' => 'EXT:news_extension/Resources/Public/Icons/icon_tx_newsextension_domain_model_category.gif',
    ]
];
