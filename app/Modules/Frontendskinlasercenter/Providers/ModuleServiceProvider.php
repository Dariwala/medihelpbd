<?php

namespace App\Modules\Frontendskinlasercenter\Providers;

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
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'frontendskinlasercenter');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'frontendskinlasercenter');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'frontendskinlasercenter');
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
