<?php

return [

    'categories' => [
        'Програмирование',
        'Музыка',
        'Спорт',
    ],

    'admin' => [
        'name' => env('ADMIN_NAME'),
        'email' => env('ADMIN_EMAIL'),
        'avatar' => env('ADMIN_AVATAR'),
        'pass' => env('ADMIN_PASS'),
        'is_admin' => 1,
    ],
];

