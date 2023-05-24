<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\TestProvider;

class TestServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('TestProvider', function($app){
            return new TestProvider();
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
