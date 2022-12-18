<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        
        app()->singleton('myservice','App\MyClasses\PowerMyService');
        // app()->singleton('App\MyClasses\MyServiceInterface','App\MyClasses\PowerMyService');
        // echo 'MyServiceProvider/register</br>';
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // echo 'MyServiceProvider/boot';
    }
}
