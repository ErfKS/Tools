<?php

namespace ErfanKatebSaber\tools;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AuthTools
{
    /**
     * return all defined guards in `auth.php` config.
     * @link https://github.com/ErfKS/Tools/blob/master/README-AUTH.md#getallguards
     * @return array
     */
    public static function GetAllGuards():array{
        $guards = [];
        foreach (Config::get('auth.guards') as $guard => $value){
            if($guard !== 'sanctum') {
                $guards[] = $guard;
            }

        }
        return $guards;
    }


    /**
     * Returns user guard name by guard type ([see config](https://github.com/ErfKS/Tools/blob/master/README.md#auth_guard_name)).
     * @link https://github.com/ErfKS/Tools/blob/master/README-AUTH.md#getguardname
     * @throws AuthenticationException
     */
    public static function GetGuardName(?string $guard_type): ?string{
        $guard_type = static::AnalyseCurrentGuard($guard_type)??null;
        return Config::get('tools.auth.auth_guard_name')[$guard_type]??$guard_type;
    }

    /**
     * get provider properties of guard
     * @param string $guard
     * @return ?array
     */
    private static function GetProvider(string $guard):?array{
        $provider = null;
        $config = Config::get('auth');
        foreach ($config['guards'] as $guard_key => $value){
            if($guard_key === $guard) {
                $provider = $value['provider'];
            }
        }
        return $config['providers'][$provider]??null;
    }

    /**
     * Returns user model with info
     * @link https://github.com/ErfKS/Tools/blob/master/README-AUTH.md#getuser
     * @param ?string $guard_name
     * @param ?int $guard_id
     * @return ?Authenticatable
     * @throws AuthenticationException
     */
    public static function GetUser(?string $guard_name, ?int $guard_id): ?Authenticatable
    {
        if(!isset($guard_name)) {
            return null;
        }
        $model = static::GetModel($guard_name);
        return $model::where('id','=',$guard_id)->get()->first();
    }

    /**
     * Returns guard model from guard type
     * @link https://github.com/ErfKS/Tools/blob/master/README-AUTH.md#getmodel
     * @throws AuthenticationException
     * @return ?Authenticatable
     */
    public static function GetModel($guard): ?Authenticatable
    {
        $guard = static::AnalyseCurrentGuard($guard);
        $provider_props = self::GetProvider($guard);
        return App::make($provider_props['model'])??null;
    }

    /**
     * Returns guard model from logged in guard type.
     * @link https://github.com/ErfKS/Tools/blob/master/README-AUTH.md#getcurrentmodel
     * @throws AuthenticationException
     * @return ?Authenticatable
     */
    public static function GetCurrentModel(): ?Authenticatable
    {
        $guard = static::GetCurrentGuard();
        return static::GetModel($guard);
    }

    /**
     * Check is guard type exist or not.
     * @link https://github.com/ErfKS/Tools/blob/master/README-AUTH.md#existguard
     * @param string $guard
     * @return bool
     */
    public static function ExistGuard(string $guard):bool{
        foreach (static::GetAllGuards() as $guard_item){
            if($guard_item === $guard){
                return true;
            }
        }
        return false;
    }

    /**
     * Returns logged in gurad type.
     * @link https://github.com/ErfKS/Tools/blob/master/README-AUTH.md#getcurrentguard
     * @return string|null
     */
    public static function GetCurrentGuard():?string{
        foreach (static::GetAllGuards() as $guard){
            if(Auth::guard($guard)->check()){
                return $guard;
            }
        }
        return null;
    }

    /**
     * Return founded near guard type.
     * @link https://github.com/ErfKS/Tools/blob/master/README-AUTH.md#findnearguard
     * @param string $guard
     * @return string|null
     */
    public static function FindNearGuard(string $guard):?string{
        $words = $guard;
        $foundedGuard = null;
        $allGuards = static::GetAllGuards();
        while (strlen($words)>0 && !isset($foundedGuard)){
            foreach ($allGuards as $guard_item){
                if(str_contains(strtolower($guard_item),$words)){
                    $foundedGuard = $guard_item;
                    break;
                }
            }
            $words = StrTools::RemoveLast($words);
        }

        return $foundedGuard;
    }

    /**
     * Return logged in user model.
     * @link https://github.com/ErfKS/Tools/blob/master/README-AUTH.md#getcurrentuser
     * @return Authenticatable|\Illuminate\Contracts\Auth\Authenticatable|null
     */
    public static function GetCurrentUser()
    {
        return Auth::guard(static::GetCurrentGuard())->user();
    }

    /**
     * Logout for logged in user.
     * @link https://github.com/ErfKS/Tools/blob/master/README-AUTH.md#logout
     * @return void
     */
    public static function Logout():void
    {
        Auth::guard(static::GetCurrentGuard())->logout();
    }

    /**
     * Logout for logged in user and redirect to specific route ([see config](https://github.com/ErfKS/Tools/blob/master/README.md#login_routes)).
     * @link https://github.com/ErfKS/Tools/blob/master/README-AUTH.md#logoutredirect
     * @return \Illuminate\Http\RedirectResponse|null
     */
    public static function LogoutRedirect(): ?\Illuminate\Http\RedirectResponse
    {
        $guard_name = static::GetCurrentGuard();
        Auth::guard($guard_name)->logout();
        return redirect()->route(config('tools.login_routes')[$guard_name]??(config('tools.login_routes.default')??'login'));
    }

    /**
     * uses `Auth::attempt` function. if the result is `true`, so login out other guard type.
     * @link https://github.com/ErfKS/Tools/blob/master/README-AUTH.md#attemp
     * @throws AuthenticationException
     */
    public static function Attemp(string $guard, array $credentials = [], $remember = false): bool
    {
        $guard = static::AnalyseCurrentGuard($guard);

        try {
            // Attempt to log in with the given guard and credentials
            $attempt = Auth::guard($guard)->attempt($credentials, $remember);
        } catch (\RuntimeException $ex) {
            // If the exception indicates a non-Bcrypt password prefix
            if (str_contains($ex->getMessage(), 'does not use the Bcrypt algorithm')) {
                // Retrieve the user model for this guard
                $model = static::GetModel($guard);
                $user  = $model::where('email', $credentials['email'])->first();

                // If the password starts with the old "$2a$" prefix
                if ($user && str_starts_with($user->password, '$2a$')) {
                    // Replace the first 4 characters ("$2a$") with the correct "$2y$"
                    $user->password = '$2y$' . substr($user->password, 4);
                    $user->save();

                    // Retry the login attempt after prefix correction
                    $attempt = Auth::guard($guard)->attempt($credentials, $remember);
                } else {
                    // Rethrow if it's not the specific prefix issue
                    throw $ex;
                }
            } else {
                // Rethrow any other RuntimeException
                throw $ex;
            }
        }

        if ($attempt) {
            // If login was successful, log out all other guards
            foreach (static::GetAllGuards() as $otherGuard) {
                if ($otherGuard !== $guard) {
                    try {
                        Auth::guard($otherGuard)->logout();
                    } catch (\Throwable $ignore) {}
                }
            }
        }

        return $attempt;
    }

    /**
     * check is current guard is exist or not.
     *
     * if this guard is not exist, so we search this guard, if we not found, so use throw.
     * @link https://github.com/ErfKS/Tools/blob/master/README-AUTH.md#analysecurrentguard
     * @param string $guard
     * @return string guard
     * @throws AuthenticationException
     */
    public static function AnalyseCurrentGuard(string $guard): string
    {
        if(static::ExistGuard($guard)) {
            return $guard;
        }
        $find = static::FindNearGuard($guard);
        if (isset($find)){
            report(new AuthenticationException("this guard ($guard) doese not exist, but we detect same guard: $find"));
            return $find;
        }
        throw new AuthenticationException("can't find guard $guard");
    }

    public static function Check(): bool
    {
        return static::GetCurrentGuard()!==null;
    }
}
