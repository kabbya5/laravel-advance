<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\WeatherService;

class WeatherServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('weather', function($app){
            return new WeatherService();
        });
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
