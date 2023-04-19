<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\General;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->share('general', General::first());
    }
}
