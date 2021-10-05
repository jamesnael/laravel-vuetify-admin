<?php

return [
    'name' => 'Core',
    'app_version' => '1.0.0',
    'app_timezone' => 'Asia/Jakarta',
    'main_menu' => '',
    'user_menu' => [
        [  
            'icon' => 'mdi-cog-outline',
            'text' => 'Change Password',
            'uri' => 'change-password.form',
        ],
        [  
            'icon' => 'mdi-power',
            'text' => 'Logout',
            'uri' => 'logout',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        base_path('public') => base_path('admin/public'),
        base_path() . '/../fonts' => base_path('fonts'),
    ],
];
