<?php

return [

    'auth'=>[
        'login_routes' => [
            /**
             * guard name => route name
             */
            'web' => 'login',

            /**
             * if not found guard route, we redirect the user after logout to this route name
             */
            'default' => 'login',
        ],
        'auth_guard_name' => [
            'web' => 'user'
        ]
    ],
    'str' => [
        'persian_numbers' => [
            '۰' => '0',
            '۱' => '1',
            '۲' => '2',
            '۳' => '3',
            '۴' => '4',
            '۵' => '5',
            '۶' => '6',
            '۷' => '7',
            '۸' => '8',
            '۹' => '9',
        ],
        'wrong_numbers' => [
            'º' => '0',
            '¹' => '1',
            '²' => '2',
            '³' => '3',
            '⁴' => '4',
            '⁵' => '5',
            '⁶' => '6',
            '⁷' => '7',
            '⁸' => '8',
            '⁹' => '9'
        ],
        'empty_chars' => [
            '‌',
        ],
        'words_to_change' => [
            // from => to
            'ي' => 'ی',
            'ة' => 'ه',
            'ك' => 'ک',
        ]
    ]

];
