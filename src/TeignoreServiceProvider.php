<?php

namespace Taokens\Teignore;

use Illuminate\Support\ServiceProvider;

class TeignoreServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $appPath = __DIR__.'/TenantProcess.php';

        $this->publishes([
            $appPath => app_path('Traits/TenantProcess.php'),
        ]);
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
