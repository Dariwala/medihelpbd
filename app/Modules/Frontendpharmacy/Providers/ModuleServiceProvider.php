<?php

namespace App\Modules\Frontendpharmacy\Providers;

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
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'frontendpharmacy');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'frontendpharmacy');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'frontendpharmacy');
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
