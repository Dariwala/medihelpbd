<?php

namespace App\Modules\Pharmacynew\Providers;

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
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'pharmacynew');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'pharmacynew');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'pharmacynew');
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
