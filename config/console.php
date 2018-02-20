<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$log = require __DIR__ . '/log.php';

$config = [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
        '@tests' => '@app/tests',
    ],
    'language' => $params['language'],
    'components' => [
        'formatter' => [
                'dateFormat' => $params['dateFormat'],
                'timeFormat' => $params['timeFormat'],
                'datetimeFormat' => $params['datetimeFormat'],
                'timeZone' => $params['timeZone'],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => $log,
        'db' => $db,
    ],
    'params' => $params,
    'controllerMap' => [
        'fixture' => [ // Fixture generation command line.
            'class' => 'yii\faker\FixtureController',
            'language' => $params['language'],
        ],
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
