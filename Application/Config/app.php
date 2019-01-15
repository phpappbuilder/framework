<?php return [
    /**
     * dev - режим разработки
     * prod - боевой режим
     */
    'env'=>'dev',

    /**
     * адресс приложения
     */
    'host'=>'http://127.0.0.1:8000',

    /**
     * конфигурация базы данных
     */
    'db'=>[
        'default'=>[
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'framework',
            'username'  => 'root',
            'password'  => 'acdcv80982965913',
            'charset'   => 'utf8',
            'collation' => 'utf8_general_ci',
            'prefix'    => '',
        ]
    ]
];