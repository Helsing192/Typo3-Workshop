<?php

use Bikar\NewsExtension\Controller\BackendController;

return [
    'news_extension' => [
        'parent' => 'web',
        'position' => ['before' => 'web_info'],
        'access' => 'user',
        'workspaces' => 'live',
        'path' => '/module/web/news_extension',
        'iconIdentifier' => 'news_extension_icon',
        'labels' => [
            'title' => 'News extension label',
            'description' => '...',
            'shortDescription' => '[...]',
        ],
        'extensionName' => 'NewsExtension',
        'controllerActions' => [
            BackendController::class => [
                'index',
                'showAllNews',
                'showCategory',
                'showNews',
            ],
        ],
    ],
];
