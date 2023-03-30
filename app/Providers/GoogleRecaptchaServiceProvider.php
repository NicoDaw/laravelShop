<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class GoogleRecaptchaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(\Anhskohbo\NoCaptcha\NoCaptchaServiceProvider::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/app.php' => config_path('nocaptcha.php'),
        ]);
    }
}
