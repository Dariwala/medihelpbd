<?php

namespace App\Modules\Frontendeyebank\Providers;

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
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'frontendeyebank');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'frontendeyebank');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'frontendeyebank');
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
