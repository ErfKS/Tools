<?php

namespace ErfanKatebSaber\tools;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Foundation\Auth\User as Authenticatable;
use function PHPUnit\Framework\isNull;

class AuthTools
{
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
     * @throws AuthenticationException
     */
    public static function GetGuardName(?string $guard_type): ?string{
        $guard_type = self::AnalyseCurrentGuard($guard_type)??null;
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
        $model = self::GetModel($guard_name);
        return $model::where('id','=',$guard_id)->get()->first();
    }

    /**
     * get guard model
     * @throws AuthenticationException
     * @return ?Authenticatable
     */
    public static function GetModel($guard): ?Authenticatable
    {
        $guard = self::AnalyseCurrentGuard($guard);
        $provider_props = self::GetProvider($guard);
        return App::make($provider_props['model'])??null;
    }

    /**
     * @throws AuthenticationException
     * @return ?Authenticatable
     */
    public static function GetCurrentModel(): ?Authenticatable
    {
        $guard = self::GetCurrentGuard();
        return self::GetModel($guard);
    }

    public static function ExistGuard(string $guard):bool{
        foreach (self::GetAllGuards() as $guard_item){
            if($guard_item === $guard){
                return true;
            }
        }
        return false;
    }

    public static function GetCurrentGuard():?string{
        foreach (self::GetAllGuards() as $guard){
            if(Auth::guard($guard)->check()){
                return $guard;
            }
        }
        return null;
    }

    public static function FindNearGuard(string $guard):?string{
        $words = '';
        $contain_guards = [];
        foreach (str_split($guard) as $word){
            $words .= strtolower($word);
            $contain_guards = [];
            foreach (self::GetAllGuards() as $guard_item){
                echo $words . "\t".$guard_item."\n";
                if(str_contains(strtolower($guard_item),$words)){
                    $contain_guards[] = $guard_item;
                }
            }
            if(count($contain_guards)===1){
                return $contain_guards[0];
            }
        }
        return count($contain_guards)>0?$contain_guards[0]:null;
    }

    /**
     * @return Authenticatable|null
     */
    public static function GetCurrentUser(): ?Authenticatable
    {
        return Auth::guard(self::GetCurrentGuard())->user();
    }

    public static function Logout():void
    {
        Auth::guard(self::GetCurrentGuard())->logout();
    }

    public static function LogoutRedirect(): ?\Illuminate\Http\RedirectResponse
    {
        $guard_name = self::GetCurrentGuard();
        Auth::guard($guard_name)->logout();
        return redirect()->route(config('tools.login_routes')[$guard_name]??(config('tools.login_routes.default')??'login'));
    }

    /**
     * @throws AuthenticationException
     */
    public static function Attemp(string $guard, array $credentials = [], $remember = false): bool
    {
        return Auth::guard(self::AnalyseCurrentGuard($guard))->attempt($credentials, $remember);
    }

    /**
     * check is current guard is exist or not.
     * if this guard is not exist, so we search this guard, if we not found, so use throw.
     * @param string $guard
     * @return string guard
     * @throws AuthenticationException
     */
    public static function AnalyseCurrentGuard(string $guard): string
    {
        if(self::ExistGuard($guard)) {
            return $guard;
        }
        $find = self::FindNearGuard($guard);
        if (isset($find)){
            report(new AuthenticationException("this guard ($guard) doese not exist, but we detect same guard: $find"));
            return $find;
        }
        throw new AuthenticationException("can't find guard $guard");
    }

    public static function Check(): bool
    {
        return self::GetCurrentGuard()!==null;
    }
}
