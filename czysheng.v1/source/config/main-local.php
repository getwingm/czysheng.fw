<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=kxtry.com;dbname=czysheng',
            'username' => 'axfcms',
            'password' => 'axf.abc',
            'charset' => 'utf8',
			'tablePrefix' => 'czys_',
            'enableSchemaCache' => true,
            'schemaCache' => 'schemaCache',
        ],
        'mc' => [
            'class' => 'yii\caching\MemCache',
            'servers' => [
                [
                    'host' => '127.0.0.1',
                    'port' => 11211
                ],
            ],
        ],
    ],
];
