<?php

return [
    'ctrl' => [
        'title' => 'News',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'sortby' => 'sorting',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'iconfile' => 'EXT:news_backend/Resources/Public/Icons/icon_tx_newsbackend_domain_model_news.gif',
    ],
    'types' => [
        '1' => ['showitem' => 'hidden, title, content'],
    ],
    'columns' => [
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.enabled',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true,
                    ],
                ],
            ],
        ],
        'title' => [
            'label' => 'Title',
            'config' => [
                'type' => 'input',
                'size' => 20,
                'eval' => 'trim',
                'required' => true,
                'max' => 256,
            ],
        ],
        'content' => [
            'exclude' => true,
            'label' => 'Content',
            'config' => [
                'type' => 'text',
                'rows' => 30,
                'cols' => 80,
            ],
        ],
    ],
];
