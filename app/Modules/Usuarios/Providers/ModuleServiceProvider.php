<?php

namespace App\Modules\Usuarios\Providers;

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
        $this->loadTranslationsFrom(module_path('usuarios', 'Resources/Lang', 'app'), 'usuarios');
        $this->loadViewsFrom(module_path('usuarios', 'Resources/Views', 'app'), 'usuarios');
        $this->loadMigrationsFrom(module_path('usuarios', 'Database/Migrations', 'app'));
        if(!$this->app->configurationIsCached()) {
            $this->loadConfigsFrom(module_path('usuarios', 'Config', 'app'));
        }
        $this->loadFactoriesFrom(module_path('usuarios', 'Database/Factories', 'app'));
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
