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
        $appPath = __DIR__.'/TenantIgnore.php';

        $this->publishes([
            $appPath => app_path('Traits/TenantIgnore.php'),
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
