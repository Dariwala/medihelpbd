<?php

namespace App\Modules\Parlour\Providers;

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
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'parlour');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'parlour');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'parlour');
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
