<?php

$params = array_merge(
        require __DIR__ . '/../../common/config/params.php', require __DIR__ . '/../../common/config/params-local.php', require __DIR__ . '/params.php', require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-api',
    'name' => 'Yii2 Plus API',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'api\controllers',
    'bootstrap' => ['log'],
    'modules' => [
//        'v1' => [
//            'basePath' => '@app/modules/v1',
//            'class' => 'api\modules\v1\Module'
//        ]
        'v1' => [
            'class' => 'api\modules\v1\Module',
        ],
    ],
    'components' => [
        'i18n' => [
            'translations' => [
                'sys*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@api/messages',
                ],
            ],
        ],
        'response' => [
            'class' => 'yii\web\Response',
            'on beforeSend' => function ($event) {
                $response = $event->sender;
                $response->data = [
                    'respCode' => $response->getStatusCode(),
                    'respData' => $response->data,
                    'respMsg' => $response->statusText
                ];
                $response->format = yii\web\Response::FORMAT_JSON;
            },
        ],
        'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'enableSession' => false,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                    [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
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
                    ['class' => 'yii\rest\UrlRule',
                    'controller' => 'auth',
                    'pluralize' => false,
                    'extraPatterns' => [
                        'POST login' => 'login',
                    ]
                ],
            ],
        ],
    ],
    'params' => $params,
];
