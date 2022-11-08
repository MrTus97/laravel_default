<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


use App\Repositories\UserInterface;
use App\Repositories\UserRepository;

use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\Order\OrderRepository;

use App\Repositories\Address\AddressInterface;
use App\Repositories\Address\AddressRepository;


use App\Repositories\CommentInterface;
use App\Repositories\CommentRepository;

use App\Repositories\MenuInterface;
use App\Repositories\MenuRepository;

use App\Repositories\PostRepository;
use App\Repositories\PostInterface;

use App\Repositories\ProductInterface;
use App\Repositories\ProductRepository;

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
        $this->app->bind(AddressInterface::class, AddressRepository::class);
        $this->app->bind(CommentInterface::class, CommentRepository::class);
        $this->app->bind(MenuInterface::class, MenuRepository::class);
        $this->app->bind(PostInterface::class, PostRepository::class);
        $this->app->bind(ProductInterface::class, ProductRepository::class);
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
