<?php

namespace App\Modules\Blooddonar\Providers;

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
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'blooddonar');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'blooddonar');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'blooddonar');
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
