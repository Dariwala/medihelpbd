<?php

namespace App\Modules\Physiotherapy\Providers;

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
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'physiotherapy');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'physiotherapy');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'physiotherapy');
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
