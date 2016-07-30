<?php


return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
            'cachePath'=>'@data/cache',
        ],
        'schemaCache' => [
            'class' => 'yii\caching\FileCache',
            'cachePath'=>'@data/cache',
            'keyPrefix'=>'scheme_'
        ],
        'security' => [
            'class' => 'source\core\base\Security',
        ],
	  	'assetManager' => [
			'basePath' => '@webroot/statics/assets',
			'baseUrl'=>'@web/statics/assets',
            'bundles' => [
                'yii\web\JqueryAsset'=>[
                    'js'=>[]
                ],
	          	// you can override AssetBundle configs here
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [],
                ]
	      	],
	      	//'linkAssets' => true,
	      	// ...
	    ],
        'urlManager'=>[
            'class'=>'source\core\base\UrlManager',
            "enablePrettyUrl" => false,
            // 为路由指定了一个别名，以 post 的复数形式来表示 post/index 路由
            'rules' => [
//                // 为路由指定了一个别名，以 post 的复数形式来表示 post/index 路由
//                'posts' => 'post/default/list',
//                'fjyy' => 'post/default/list&taxonomy=20',
//                'admin.php' =>'admin.php',

                // id 是命名参数，post/100 形式的URL，其实是 post/view&id=100
                'post/<taxonomy:\d+>' => 'post/default/list',


                // controller action 和 id 以命名参数形式出现
//                '<controller:(post|comment)>/<id:\d+>/<action:(create|update|delete)>' => '<controller>/<action>',

                // 包含了 HTTP 方法限定，仅限于DELETE方法
//                'DELETE <controller:\w+>/<id:\d+>' => '<controller>/delete',

                // 需要将 Web Server 配置成可以接收 *.digpage.com 域名的请求
//                'http://<user:\w+>.digpage.com/<lang:\w+>/profile' => 'user/profile',
            ]
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.sina.com',			//使用163邮箱
                'username' => 'xxx@sina.com',	//你的163的帐号
                'password' => "xxx",				//你的163的密码
                'port' => '25',
                //'port'=>'465',
                //'encryption' => 'ssl',
            ],
            	
            'useFileTransport' => false,
            'messageConfig' => [
                'from' => ['xxx@sina.com' => 'Admin'],
                'charset' => 'UTF-8',
            ],
        ],
        'modularityService' => [
            'class' => 'source\modules\modularity\ModularityService',
        ],
    ],
];
