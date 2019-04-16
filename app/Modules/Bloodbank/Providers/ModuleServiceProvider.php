<?php

namespace App\Modules\Bloodbank\Providers;

use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'bloodbank');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'bloodbank');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'bloodbank');
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}
