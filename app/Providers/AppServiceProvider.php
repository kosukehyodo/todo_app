<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        // User
        $this->app->bind(
            \App\Repositories\Contract\UserContract::class,
            \App\Repositories\UserRepository::class
        );
        // Board
        $this->app->bind(
            \App\Repositories\Contract\BoardContract::class,
            \App\Repositories\BoardRepository::class
        );
        // CardList
        $this->app->bind(
            \App\Repositories\Contract\CardListContract::class,
            \App\Repositories\CardListRepository::class
        );
    }
}
