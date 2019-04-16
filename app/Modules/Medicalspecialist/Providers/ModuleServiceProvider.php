<?php

namespace App\Modules\Medicalspecialist\Providers;

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
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'medicalspecialist');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'medicalspecialist');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'medicalspecialist');
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
