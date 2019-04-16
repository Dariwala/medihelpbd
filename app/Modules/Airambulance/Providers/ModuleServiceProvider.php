<?php

namespace App\Modules\Airambulance\Providers;

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
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'airambulance');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'airambulance');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'airambulance');
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
