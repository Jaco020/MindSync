<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        View::composer('account.*', function ($view) {
            $user = auth()->user();
            if ($user) {
                $view->with('userName', $user->name);
                $view->with('email', $user->email);
            }
        });
    }
}
