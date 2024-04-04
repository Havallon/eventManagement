<?php

namespace App\Providers;

use App\Repositories\Eloquent\BatchEloquent;
use App\Repositories\Eloquent\EventEloquent;
use App\Repositories\Eloquent\SectionEloquent;
use App\Repositories\Eloquent\UserEloquent;
use App\Repositories\Interfaces\BatchRepositoryInterface;
use App\Repositories\Interfaces\EventRepositoryInterface;
use App\Repositories\Interfaces\SectionRepositoryInterface;
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
        $this->app->bind(SectionRepositoryInterface::class, SectionEloquent::class);
        $this->app->bind(BatchRepositoryInterface::class, BatchEloquent::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
