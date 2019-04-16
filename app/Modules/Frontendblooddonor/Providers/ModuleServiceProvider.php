<?php

namespace App\Modules\Frontendblooddonor\Providers;

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
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'frontendblooddonor');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'frontendblooddonor');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'frontendblooddonor');
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
