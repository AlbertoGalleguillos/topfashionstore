<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Added to avoid this error ->
        // SQLSTATE[42000]: Syntax error or access violation: 1071 Specified key was too long; max key
        // length is 767 bytes (SQL: alter table `users` add unique `users_email_unique`(`email`)) 
        Schema::defaultStringLength(191);
        Carbon::setlocale(config('app.locale'));
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
