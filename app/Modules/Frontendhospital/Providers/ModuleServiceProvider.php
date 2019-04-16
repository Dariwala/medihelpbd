<?php

namespace App\Modules\Frontendhospital\Providers;

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
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'frontendhospital');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'frontendhospital');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'frontendhospital');
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
