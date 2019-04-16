<?php

namespace App\Modules\Frontendairambulance\Providers;

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
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'frontendairambulance');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'frontendairambulance');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'frontendairambulance');
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
