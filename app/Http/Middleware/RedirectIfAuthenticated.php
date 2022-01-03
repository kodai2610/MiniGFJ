<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{   
    // private const GUARD_USER = 'users';
    // private const GUARD_COMPANY = 'companies';
    // private const GUARD_ADMIN = 'users';
    /**
     * Handle an incoming request.ログイン済みユーザーがアクセスしてきたら
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // if (Auth::guard($guard)->check()) {
        //     return redirect(RouteServiceProvider::HOME);
        // }
        if(Auth::guard($guard)->check() && $guard === 'users' ) {
            return redirect(RouteServiceProvider::HOME);
        }

        if(Auth::guard($guard)->check() && $guard === 'companies') {
            return redirect(RouteServiceProvider::COMPANY_HOME);
        }
        if(Auth::guard($guard)->check() && $guard === 'admin') {
            return redirect(RouteServiceProvider::ADMIN_HOME);
        }

        return $next($request);
    }
}
