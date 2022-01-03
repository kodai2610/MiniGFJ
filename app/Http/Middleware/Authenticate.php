<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate as Middleware;


class Authenticate extends Middleware
{   
    protected $user_route = 'user.login';
    protected $company_route = 'company.login';
    protected $admin_route = 'admin.login';//別名にあたる
    /**
     * Get the path the user should be redirected to when they are not authenticated. ユーザーが未認証の場合のリダイレクト処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if(Route::is('user.*')) {
                return route($this->user_route);
            } elseif(Route::is('company.*')) {
                return route($this->company_route);
            } else {
                return route($this->admin_route);
            }
        }
    }
}
