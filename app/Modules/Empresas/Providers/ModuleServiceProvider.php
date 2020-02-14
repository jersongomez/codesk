<?php

namespace App\Modules\Empresas\Providers;

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
        $this->loadTranslationsFrom(module_path('empresas', 'Resources/Lang', 'app'), 'empresas');
        $this->loadViewsFrom(module_path('empresas', 'Resources/Views', 'app'), 'empresas');
        $this->loadMigrationsFrom(module_path('empresas', 'Database/Migrations', 'app'));
        if(!$this->app->configurationIsCached()) {
            $this->loadConfigsFrom(module_path('empresas', 'Config', 'app'));
        }
        $this->loadFactoriesFrom(module_path('empresas', 'Database/Factories', 'app'));
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
