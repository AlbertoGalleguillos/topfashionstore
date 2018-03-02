<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
use App\Area;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(){
        // Added to avoid this error ->
        // SQLSTATE[42000]: Syntax error or access violation: 1071 Specified key was too long; max key
        // length is 767 bytes (SQL: alter table `users` add unique `users_email_unique`(`email`)) 
        Schema::defaultStringLength(191);

        Carbon::setlocale(config('app.locale'));

        view()->composer('layouts.master', function($view){
            $view->with('unread_notifications', auth()->user()->unread());
        });

        view()->composer('tickets.create', function($view){
            $view->with('areas', Area::all());
        });

        view()->composer('tickets.edit', function($view){
            $view->with('areas', Area::all());
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
