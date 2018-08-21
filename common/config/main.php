<?php

return [
    'timeZone' => 'PRC',
    'language' => 'zh-CN',
    'sourceLanguage' => 'en-US',
    'version' => '1.0.0',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
