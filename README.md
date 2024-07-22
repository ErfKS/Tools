
# Tools
This package include library classes with specific static function tools.
## List of content


- [Install](#install)
- [Classes](#classes)
- [Config](#config)
- [Licence](#licence)

## Install
run this command:
```shell
composer require kateberfan/tools
```
After that, run this command to create config file:
```shell
php artisan vendor:publish --tag=tools
```
## Classes

- [StrTools][link-str]: This class include specific static functions to make easly string editing.
- [AuthTools][link-auth]: This class include specific static functions to make easily use laravel auth.

## Config
After installing this package, the config file created into this path:
```
config/tools.php
```
This file content like this:
```php
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
            '‌', // half space
        ],
        'words_to_change' => [
            // from => to
            'ي' => 'ی',
            'ة' => 'ه',
            'ك' => 'ک',
        ]
    ]

];

```
### Parts Descriptions
#### auth
##### login_routes
You can define specific route for each guard type to redirect after logout by `AuthTools::Logout()`.
##### auth_guard_name
You can define name for each guard type to display this via `StrTools::GetGuardName('YOUR_GUARD_NAME')`.

In default config option, the result of this `StrTools::GetGuardName('web')`, is `user`.
#### str
##### persian_numbers
Persian numbers to replace by `StrTools::ConvertPersianNumbers` or `StrTools::RepairNumber` functions.

Also, the `StrTools::JustNumber` function use this config.
##### wrong_numbers
Replace wrong numbers by `StrTools::RepairNumber` function.

Also, the `StrTools::JustNumber` function use this config.
##### empty_chars
Detect empty chars by `StrTools::IsEmptyString` function. One of uses of this function is to prevent deception by users (like username by uesr).
##### words_to_change
Replace words by `StrTools::AutoChangeWord` function. One of uses of this function is prevent confusing users by store or show chars that have same appearance.
## Licence
Tis package is open-sourced library licensed under the [MIT license][link-mit].

[link-mit]: https://opensource.org/licenses/MIT

[link-str]: README-STR.md
[link-auth]: README-AUTH.md
