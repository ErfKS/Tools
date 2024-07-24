# StrTools
This class include specific static functions to make easily string editing
## List of content
- [StrTools](#strtools)
  - [List of content](#list_of_content)
  - [Static Function](#static_function)
    - [ConvertPersianNumbers](#convertpersiannumbers)
    - [ParsCurrentUrl](#parscurrenturl)
    - [GetGuardName](#getguardname)
    - [GetLangAttribute](#getlangattribute)
    - [RemoveEmptyExplode](#eemoveemptyexplode)
    - [IsEmptyString](#isemptystring)
    - [RandomInt](#randomint)
    - [GetFirst](#getfirst)
    - [AutoChangeWord](#autochangeword)
    - [JustNumber](#justnumber)
    - [JustPhoneNumber](#justphonenumber)
    - [GetFileFormat](#getfileformat)
    - [DetectCssProps](#detectcssprops)
    - [RepairNumber](#repairnumber)
    - [RemoveLast](#removelast)
    - [RemoveFirst](#removefirst)
    - [ConvertToUrlParams](#converttourlparams)
    - [RepairPhoneNumber](#repairphonenumber)
    - [GetPhoneCode](#getphonecode)
    - [HaveInFirst](#haveinfirst)
    - [StrContainsArray](#strcontainsarray)
    - [StrEqualArray](#strequalarray)
## Static Function
### ConvertPersianNumbers
converts persian numbers into english numbers
example:
```php
StrTools::ConvertPersianNumbers('۰۱۲۳۴۵۶۷۸۹');
```
result:
```
0123456789
```
### ParsCurrentUrl
converts persian numbers into english numbers
example:
```php
dd(
    StrTools::ParsCurrentUrl(),
    StrTools::ParsCurrentUrl('www.'),
)
```
result:
```php
[
    "scheme" => "http",
    "host" => "localhost",
]
```
```php
[
    "scheme" => "http",
    "host" => "www.localhost",
]
```
### GetGuardName
Returns user guard name by guard type ([see config](README.md#auth_guard_name)).

example:
```php
StrTools::GetGuardName('web');
```
result:
```
user
```
### GetLangAttribute
Returns translated word by attribute part of `validation.php` language file.

example in `validation.php`:
```php

'attributes' => [
    // other attribute 
    'username' => 'user name'
],
```
example `GetLangAttribute` function:
```php
StrTools::GetLangAttribute('username');
```
result:
```
user name
```
### RemoveEmptyExplode
Removes empty string between separator.

example:
```php
StrTools::RemoveEmptyExplode(',','val1, val2, val3,,,');
```
result:
```
val1, val2, val3
```
### IsEmptyString
Detect empty chars ([see config](README.md#empty_chars))

example:
```php
$isEmptyStr1 = StrTools::IsEmptyString('');
$isEmptyStr2 = StrTools::IsEmptyString('‌'); // half space
$isEmptyStr3 = StrTools::IsEmptyString('value');
$isEmptyStr3 = StrTools::IsEmptyString('‌value'); // with half space
dd($isEmptyStr1,$isEmptyStr2,$isEmptyStr3);
```
result:
```
true
true
false
```
### RandomInt
Returns random integer.

example:
```php
$isEmptyStr1 = StrTools::RandomInt(16);
```
result:
```
2246770845368407
```
### GetFirst
Returns first char of string.

example:
```php
dd(
    StrTools::GetFirst('value'),
    StrTools::GetFirst('value',2),
)
```
result:
```
v
va
```
### AutoChangeWord
Replace same words. ([see config](README.md#words_to_change))

example:
```php
StrTools::AutoChangeWord('درود خوبي');
```
result:
```
StrTools::AutoChangeWord('درود خوبی');
```
### JustNumber
Check if value just have number or not. (see config [wrong_numbers](README.md#wrong_numbers) and [persian_numbers](README.md#persian_numbers))

example:
```php
$value = '12345۶۷۸۹';
dd(
    StrTools::JustNumber($value),
    StrTools::JustNumber($value.'value'),
    StrTools::JustNumber($value,false),
);
```
result:
```
true
false
false
```
### JustPhoneNumber
Check if value just have number and 11 chars or not. (see config [wrong_numbers](README.md#wrong_numbers) and [persian_numbers](README.md#persian_numbers))

example:
```php
$value = '09120000۰۰۰';

dd(
    StrTools::JustPhoneNumber($value),
    StrTools::JustPhoneNumber($value,false)
);
```
result:
```
true
false
```
### GetFileFormat
Returns file extension by file name

example:
```php
StrTools::GetFileFormat('directory\file_name.txt');
```
result:
```
txt
```
### DetectCssProps
Returns CSS props from text to array.

example:
```php
StrTools::DetectCssProps('width: 28px; height: 1rem');
```
result:
```php
[
    "width" => "28px",
    "height" => "1rem",
]
```
### RepairNumber
Returns replaced correct number characters.

example:
```php
StrTools::RepairNumber('09120000۰۰۰');
```
result:
```
09120000000
```
### RemoveLast
Returns value without last character(s).

example:
```php
dd(
    StrTools::RemoveLast('value'),
    StrTools::RemoveLast('value',2)
);
```
result:
```
valu
val
```
### RemoveFirst
Returns value without first character(s).

example:
```php
dd(
    StrTools::RemoveFirst('value'),
    StrTools::RemoveFirst('value',2)
);
```
result:
```
alue
lue
```
### ConvertToUrlParams
Returns url query params from array.

example:
```php
$params = [
    'key1' => 'value1',
    'key2' => 'value2',
];
StrTools::ConvertToUrlParams($params);
```
result:
```
?key1=value1&key2=value2
```
### RepairPhoneNumber
Returns value without any space and country code and replaces persian numbers.

example:
```php
StrTools::RepairPhoneNumber('+989120000000');
```
result:
```
09120000000
```
### GetPhoneCode
Returns code of phone number

example:
```php
StrTools::GetPhoneCode('+989120000000');
```
result:
```php
[
    "name" => "Iran (+98)",
    "code" => "98",
]
```
### HaveInFirst
Returns code of phone number.

example:
```php
StrTools::HaveInFirst('value 1', 'val');
```
result:
```
true
```
### StrContainsArray
Check if string contain in array or not

example:
```php
dd(
    StrTools::StrContainsArray('test 1',['test']),
    StrTools::StrContainsArray('test 1',['test 2'])
)
```
result:
```
true
false
```
### StrEqualArray
Check if string contain in array or not

example:
```php
dd(
    StrTools::StrEqualArray('test 1',['test 1']),
    StrTools::StrEqualArray('test 1',['test'])
)
```
result:
```
true
false
```
