<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\contact;
use App\Models\config;

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
        view()->share('contacts',Contact::all());
        view()->share('count',Contact::count());
    }
}
