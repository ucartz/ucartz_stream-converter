<?php

namespace RadioStream\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; 
use Illuminate\Support\Facades\URL; 

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    /*public function boot()
    {
        view()->composer('layout.app', function($view) {
            $myvar = 'test';
            $view->with('data', array('myvar' => $myvar));
        });
    }*/

    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191); 
        /*view()->composer('layout.app', function($view) {
            $myvar = 'test';
            $view->with('data', Auth::user());
        });*/

        //URL::forceSchema('https');
        //$this->app['request']->server->set('HTTPS','on');

    }
}
