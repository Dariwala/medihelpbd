<?php

namespace App\Modules\Frontendvaccinepoint\Providers;

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
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'frontendvaccinepoint');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'frontendvaccinepoint');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'frontendvaccinepoint');
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
