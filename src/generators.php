<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Generator Config
    |--------------------------------------------------------------------------
    |
    */
    'generator'  => [
        'basePath'      => app()->path(),
        'rootNamespace' => 'App\\',
        'stubsOverridePath' => app()->path(),
        'paths'         => [
            'models'       => 'Entities',
            'controllers'  => 'Http/Controllers/API/v1',
            'resources'     => 'Http/Resources',
        ]
    ]
];
