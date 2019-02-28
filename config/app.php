<?php

return [
    'providers' => [
        \App\Providers\ZendDiactorosServiceProvider::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'aliases' => [
        'Request' => \MediSoft\Proxies\Request::class,
        'Emitter' => \MediSoft\Proxies\Emitter::class,
        'Router' => \MediSoft\Proxies\Router::class,
        'Config' => \MediSoft\Proxies\Config::class,
    ]
];