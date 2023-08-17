<?php

use Bikar\NewsBackend\Controller\BackendController;

return [
    'news_backend' => [
        'parent' => 'web',
        'position' => ['before' => 'web_info'],
        'access' => 'user',
        'workspaces' => 'live',
        'path' => '/module/web/news_backend',
        'iconIdentifier' => 'news_backend_icon',
        'labels' => [
            'title' => 'News backend label',
            'description' => '...',
            'shortDescription' => '[...]',
        ],
        'extensionName' => 'NewsBackend',
        'controllerActions' => [
            BackendController::class => [
                'list',
                'show',
            ],
        ],
    ],
];
