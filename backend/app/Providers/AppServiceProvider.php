<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Interfaces\UserInterface',
            'App\Services\UserService'
        );

        $this->app->bind(
            'App\Interfaces\AuthInterface',
            'App\Services\AuthService'
        );

        $this->app->bind(
            'App\Interfaces\PostInterface',
            'App\Services\PostService'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
