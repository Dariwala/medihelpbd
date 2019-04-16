<?php

namespace App\Modules\Homeopathic\Providers;

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
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'homeopathic');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'homeopathic');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'homeopathic');
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
