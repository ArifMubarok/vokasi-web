<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Laravel view path has already been registered for you.
    |
    */
    'menu' => [
        [
            'icon' => 'fa fa-th-large',
            'title' => 'Dashboard',
            'url' => '/admin/dashboard',
            'caret' => false
        ],
        [
            'icon' => 'fa fa-users',
            'title' => 'Pengguna',
            'url' => '/admin/users',
            'caret' => false,
        ],
        [
            'icon' => 'fa fa-cogs',
            'title' => 'Settings',
            'url' => 'javascript:;',
            'caret' => true,
            'sub_menu' => [
                [
                    'url' => '/admin/settings',
                    'title' => 'App'
                ],
                [
                    'url' => '/admin/asdw',
                    'title' => 'test',
                    'sub_menu1' => [
                        'url' => '/ads',
                        'title' => 'test'
                    ]
                ],
            ]
        ]
    ],
];