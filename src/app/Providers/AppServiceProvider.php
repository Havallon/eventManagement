<?php

namespace App\Providers;

use App\Repositories\Eloquent\EventEloquent;
use App\Repositories\Eloquent\UserEloquent;
use App\Repositories\Interfaces\EventRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserEloquent::class);
        $this->app->bind(EventRepositoryInterface::class, EventEloquent::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
