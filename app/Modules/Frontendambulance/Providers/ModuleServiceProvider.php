<?php

namespace App\Modules\Frontendambulance\Providers;

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
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'frontendambulance');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'frontendambulance');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'frontendambulance');
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
