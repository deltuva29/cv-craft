<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
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
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        if (Filament::getCurrentPanel()) {
            Config::set('livewire.inject_assets', true);
        }

        view()->composer('*', function ($view) {
            if (auth()->check()) {
                $user = auth()->user()->load('profile');
                $view->with('user', $user);
                $view->with('profile', $user->profile);
            }
        });

        Blade::component('layouts.app', 'app-layout');
    }
}
