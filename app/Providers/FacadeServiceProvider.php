<?php

namespace App\Providers;

use App\Services\SearchAvatar;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class FacadeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('avatar.search.service',fn() => new SearchAvatar());
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
