<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'A News extension example for the Extbase framework',
    'description' => '...',
    'version' => '12.0.0',
    'category' => 'example',
    'author' => '',
    'author_company' => '',
    'author_email' => '',
    'state' => 'stable',
    'clearCacheOnLoad' => 1,
    'constraints' => [
        'depends' => [
            'typo3' => '12.4.0-12.4.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'autoload' => [
        'psr-4' => [
            'Bikar\\NewsExtension\\' => 'Classes/',
        ],
    ],
];
