<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ActiveActivityProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view)
        {
          $current_route_name = Route::currentRouteName();
          $view->with('routename', $current_route_name);
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
