<?php

namespace Taokens\Teignore;

use Illuminate\Support\ServiceProvider;

class TenantServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->publishes([
            $this->appPath() => app_path('Traits/TenantProcess.php'),
        ]);
    }

    /**
     * Add app path
     *
     * @return string
     */
    public function appPath()
    {
        return __DIR__.'/TenantProcess.php';
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
