<?php

namespace App\Modules\Ambulance\Providers;

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
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'ambulance');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'ambulance');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'ambulance');
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
