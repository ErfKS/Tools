# AuthTools
This class include specific static functions to make easily use laravel auth.
## List of content

## Static Function
### GetAllGuards
return all defined guards in `auth.php` config.

usage:
```php
AuthTools::GetAllGuards();
```
result:
```php
[
   "web" 
]
```
### GetGuardName
Returns user guard name by guard type ([see config](https://github.com/ErfKS/Tools/blob/master/README.md#auth_guard_name)).
example:
```php
AuthTools::GetGuardName('web');
```
result:
```
user
```
### GetUser
Returns user model with info
example usage:
```php
AuthTools::GetUser('web',1);
```
example result:
```shell
App\Models\User {
    id: 1,
    name: "Elva Nicolas",
    email: "millie03@example.com",
    email_verified_at: "2024-07-20 22:34:40",
    #password: "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
    #remember_token: "ZvwazcSKeR",
    created_at: "2024-07-20 22:34:40",
    updated_at: "2024-07-20 22:34:40",
  }
```
### GetModel
Returns guard model from guard type

#### example 1
usage:
```php
AuthTools::GetModel('web');
```
result:
```shell
App\Models\User
```
#### example 2
usage:
```php
$userModel = AuthTools::GetModel('web');
dd($userModel::all());
```
result:
```shell
Illuminate\Database\Eloquent\Collection {
  #items: array:1 [
    0 => App\Models\User {#5791
      #connection: "mysql"
      #table: "users"
      #primaryKey: "id"
      #keyType: "int"
      +incrementing: true
      #with: []
      #withCount: []
      +preventsLazyLoading: false
      #perPage: 15
      +exists: true
      +wasRecentlyCreated: false
      #escapeWhenCastingToString: false
      #attributes: array:8 [
        "id" => 1
        "name" => "Elva Nicolas"
        "email" => "millie03@example.com"
        "email_verified_at" => "2024-07-20 22:34:40"
        "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi"
        "remember_token" => "ZvwazcSKeR"
        "created_at" => "2024-07-20 22:34:40"
        "updated_at" => "2024-07-20 22:34:40"
      ]
      #original: array:8 [
        "id" => 1
        "name" => "Elva Nicolas"
        "email" => "millie03@example.com"
        "email_verified_at" => "2024-07-20 22:34:40"
        "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi"
        "remember_token" => "ZvwazcSKeR"
        "created_at" => "2024-07-20 22:34:40"
        "updated_at" => "2024-07-20 22:34:40"
      ]
      #changes: []
      #casts: array:1 [
        "email_verified_at" => "datetime"
      ]
      #classCastCache: []
      #attributeCastCache: []
      #dates: []
      #dateFormat: null
      #appends: []
      #dispatchesEvents: []
      #observables: []
      #relations: []
      #touches: []
      +timestamps: true
      #hidden: array:2 [
        0 => "password"
        1 => "remember_token"
      ]
      #visible: []
      #fillable: array:3 [
        0 => "name"
        1 => "email"
        2 => "password"
      ]
      #guarded: array:1 [
        0 => "*"
      ]
      #rememberTokenName: "remember_token"
      #accessToken: null
    }
  ]
  #escapeWhenCastingToString: false
}
```
### GetCurrentModel
Returns guard model from logged in guard type.

example usage (suppose a user logged in via `web` guard):
```php
AuthTools::GetCurrentModel();
```
example result:
```shell
App\Models\User
```
### ExistGuard
Check is guard type exist or not.

example usage:
```php
dd(
    AuthTools::ExistGuard('web'),
    AuthTools::ExistGuard('other_guard'),
);
```
example result:
```php
true // exist guard
false // not exist gurad
```
### GetCurrentGuard
Returns logged in gurad type.

example usage (suppose a user logged in via `web` guard):
```php
AuthTools::GetCurrentGuard();
```
example result:
```shell
web
```
### FindNearGuard
Return founded near guard type.

example usage:
```php
AuthTools::FindNearGuard('wbb');
```
example result:
```shell
web
```
### GetCurrentUser
Return logged in user model.

example usage (suppose a user logged in via `web` guard):
```php
AuthTools::GetCurrentUser();
```
example result:
```shell
App\Models\User {
  #connection: "mysql"
  #table: "users"
  #primaryKey: "id"
  #keyType: "int"
  +incrementing: true
  #with: []
  #withCount: []
  +preventsLazyLoading: false
  #perPage: 15
  +exists: true
  +wasRecentlyCreated: false
  #escapeWhenCastingToString: false
  #attributes: array:8 [
    "id" => 1
    "name" => "Elva Nicolas"
    "email" => "millie03@example.com"
    "email_verified_at" => "2024-07-20 22:34:40"
    "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi"
    "remember_token" => "ZvwazcSKeR"
    "created_at" => "2024-07-20 22:34:40"
    "updated_at" => "2024-07-20 22:34:40"
  ]
  #original: array:8 [
    "id" => 1
    "name" => "Elva Nicolas"
    "email" => "millie03@example.com"
    "email_verified_at" => "2024-07-20 22:34:40"
    "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi"
    "remember_token" => "ZvwazcSKeR"
    "created_at" => "2024-07-20 22:34:40"
    "updated_at" => "2024-07-20 22:34:40"
  ]
  #changes: []
  #casts: array:1 [
    "email_verified_at" => "datetime"
  ]
  #classCastCache: []
  #attributeCastCache: []
  #dates: []
  #dateFormat: null
  #appends: []
  #dispatchesEvents: []
  #observables: []
  #relations: []
  #touches: []
  +timestamps: true
  #hidden: array:2 [
    0 => "password"
    1 => "remember_token"
  ]
  #visible: []
  #fillable: array:3 [
    0 => "name"
    1 => "email"
    2 => "password"
  ]
  #guarded: array:1 [
    0 => "*"
  ]
  #rememberTokenName: "remember_token"
  #accessToken: null
}
```
### Logout
Logout for logged in user.

example usage:
```php
AuthTools::Logout();
```
### LogoutRedirect
Logout for logged in user and redirect to specific route ([see config](README.md#login_routes)).
#### example 1
usage:
```php
dd(AuthTools::LogoutRedirect());
```
result:
```shell
Illuminate\Http\RedirectResponse {...}
```
#### example 2
You can use this function in a controller like this:
```php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function logout(){
        return AuthTools::LogoutRedirect(); // logout and redirect
    }
}
```
### Attemp
uses `Auth::attempt` function. if the result is `true`, so login out other guard type.

example usage:
```php
AuthTools::Attemp('web',['email' => 'millie03@example.com','password'=>'']);
```
example result (if `$credentials` has correct values):
```
true
```
### Attemp
check is current guard is exist or not.

if this guard is not exist, so we search this guard, if we not found, so use throw.

example usage:
```php
AnalyseCurrentGuard('wbb');
```
example result:
```
'web'
```
