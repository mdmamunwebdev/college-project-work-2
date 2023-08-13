<?php

namespace App\Providers;

use App\Models\rioAdmin\AppSettings;
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
        // Using view composer to set following variables globally
        view()->composer('*',function($view) {
            $view->with('total', 0);
            $view->with('sub_total', 0);
            $view->with('app_settings', AppSettings::find(1));
        });
    }
}
