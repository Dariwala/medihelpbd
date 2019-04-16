<?php

namespace App\Modules\Vaccinepoint\Providers;

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
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'vaccinepoint');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'vaccinepoint');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'vaccinepoint');
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
