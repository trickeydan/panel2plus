<?php

namespace Panel\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            if(Auth::check()){
                $view->with('user',Auth::User());
            }
        });

        Blade::directive('breadcrumbs', function($expression) {
            return "<ol class=\"breadcrumb\">
              <li><a href=\"#\">Home</a></li>
              <li><a href=\"#\">Library</a></li>
              <li class=\"active\">Data</li>
            </ol>";
        });

        Validator::extend('pwdcorrect', function($attribute, $value, $parameters, $validator) {
            return Auth::validate(['username' => Auth::User()->username,'password' => $value]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
