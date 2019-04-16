<?php

namespace App\Modules\Herbalcenter\Providers;

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
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'herbalcenter');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'herbalcenter');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'herbalcenter');
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
