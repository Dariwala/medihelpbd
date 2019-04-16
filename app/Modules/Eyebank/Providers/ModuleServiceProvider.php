<?php

namespace App\Modules\Eyebank\Providers;

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
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'eyebank');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'eyebank');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'eyebank');
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
