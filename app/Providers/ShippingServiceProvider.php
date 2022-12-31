<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Shipping;
use App\View\Composers\TestComposer;

class ShippingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // app()->bind('getShipping',Shipping::class);

        app()->bind('Shipping', function($app){
            return new Shipping('kabbya','address','phone');
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('welcome', TestComposer::class);
    }
}
