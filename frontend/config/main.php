<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id'        => 'app-frontend',
    'language'  => 'ru',
    'name'      => 'zachestnyibiznes.ru',
    'basePath'  => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'zchb\controllers',
    'components' => [
        // 'view' => [
        //     'class' => 'common\widgets\View',
        // ],
        'request' => [
            'enableCsrfValidation' => false,
            'csrfParam' => '_csrf-zchb',
        ],
        'user' => [
            'identityClass' => 'backend\models\User',
            'enableAutoLogin' => true,
            'enableSession' => true,
            'identityCookie' => ['name' => '_identity-zchb', 'httpOnly' => true],
        ],
        'session' => [
            'class' => 'yii\web\CacheSession',
            'cache' => 'cache',
            // this is the name of the session cookie used for login on the zchb
            'name' => 'advanced-zchb',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                    'logFile' => '@app/runtime/logs/eauth.log',
                    'categories' => ['nodge\eauth\*'],
                    'logVars' => [],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'day/<date>' => 'day/index',
                '/' => 'site/index',
                'lp/<id:\w+>' => 'lp/view',
                '/user/tickets/<id:\d+>' => 'user/tickets',
                '/services/<cat:\w+>'=> 'services-partners/cat',
                '/services/<cat:\w+>/<id:\d+>'=> 'services-partners/company-card',

                '/how-to-use' => 'site/howtouse',
                '/company/<type:(ip|ul)>/<string>' => 'company/company',
                '/company/<type:(ip|ul)>/<string>/<view:(egrul|egrip|balance|arbitration)>' => 'company/company',

                '/doc/<name:(rules|rulesapi|info|terms|terms-api|policy)>' => 'site/doc',
                
                '/signup' => 'site/signup',
                
                '/user' => 'user/index',
                '/user/app/<id:\d+>' => 'user/api-view',
                '/user/stat/<id:\d+>' => 'user/stat',
                '/user/change/<id:\d+>' => 'user/change',
                //'/api-key/switch/<id:\d+>' => 'api-key/switch',

                'login/<service:google|facebook|etc>' => 'site/login',

                '/blog' => 'blog/index',
                'blog/<id:\w+>' => 'blog/view',

                '/court/<type:(arbitration)>/<id:[\w_\/-]+>' => 'court/<type>',

                '/<method>' => 'site/<method>',
                '/api/<td:(td-free|td-demo|td-html|td-api)>' => 'site/api',
                'notify/<id:\w+>' => 'notify/view',
            ],
        ],
        'i18n' => [
            'translations' => [
                'eauth' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@eauth/messages',
                ],
            ],
        ],
    ],
    'params' => $params,
];
