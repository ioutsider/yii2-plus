<?php

return $rules = [
    [
        'class' => 'yii\rest\UrlRule',
        'controller' => 'admin',
    ],
    [
        'class' => 'yii\rest\UrlRule',
        'controller' => 'article',
        'pluralize' => false,
        'extraPatterns' => [
            'POST index' => 'index',
            'POST send-email' => 'send-email'
        ],
    ],
    [
        'class' => 'yii\rest\UrlRule',
        'controller' => ['v1/article'],
        'pluralize' => false,
        'extraPatterns' => [
            'POST index' => 'index',
            'POST send-email' => 'send-email'
        ],
    ],
    [
        'class' => 'yii\rest\UrlRule',
        'controller' => ['v2/article'],
        'pluralize' => false,
        'extraPatterns' => [
            'POST index' => 'index',
            'POST send-email' => 'send-email'
        ],
    ],
    ['class' => 'yii\rest\UrlRule',
        'controller' => 'auth',
        'pluralize' => false,
        'extraPatterns' => [
            'POST login' => 'login',
        ]
    ],
];
