<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


use App\Interfaces\UserInterface;
use App\Repositories\UserRepository;

use App\Interfaces\OrderRepositoryInterface;
use App\Repositories\OrderRepository;
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(UserInterface::class, UserRepository::class);
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
