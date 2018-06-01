<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'console\controllers',
    'components' => [
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ],
    'controllerMap' => [
        // Миграции проекта ЗАЧЕСТНЫЙБИЗНЕС
        'migrate-zchb' => [
            'class' => 'yii\console\controllers\MigrateController',
            'db' => 'zchb',
            'migrationPath' => '@zchb/migrations'
        ],
        // Миграции проекта vseinfo24
        'migrate-vseinfo24' => [
            'class' => 'yii\console\controllers\MigrateController',
            'db' => 'vseinfo24',
            'migrationPath' => '@vseinfo24/migrations'
        ],
        // Миграции проекта inforus
        'migrate-inforus' => [
            'class' => 'yii\console\controllers\MigrateController',
            'db' => 'inforus',
            'migrationPath' => '@inforus/migrations'
        ],
        // Миграции проекта infozum
        'migrate-infozum' => [
            'class' => 'yii\console\controllers\MigrateController',
            'db' => 'infozum',
            'migrationPath' => '@infozum/migrations'
        ],
    ],
    'params' => $params,
];
