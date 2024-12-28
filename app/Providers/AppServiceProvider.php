<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Gate::define('view-motors', function ($user) {
            return $user->role && in_array($user->role->role_name, ['admin', 'user']);
        });

        Gate::define('manage-motors', function ($user) {
            return $user->role && $user->role->role_name === 'admin';
        });

        Gate::define('view-kredit-paket', function ($user) {
            return in_array($user->role->role_name, ['admin', 'user']);
        });

        Gate::define('manage-kredit-paket', function ($user) {
            return $user->role->role_name === 'admin';
        });

        Gate::define('view-bayar-cicilan', function ($user) {
            return in_array($user->role->role_name, ['admin', 'user']);
        });

        Gate::define('manage-bayar-cicilan', function ($user) {
            return $user->role->role_name === 'admin';
        });
    }
}
