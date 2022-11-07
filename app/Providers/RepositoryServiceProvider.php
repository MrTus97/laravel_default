<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\New\NewReposiory;
use App\Repositories\New\NewReposityInterface; 

use App\Repositories\Menu\MenuReposiory;
use App\Repositories\Menu\MenuReposityInterface;

use App\Repositories\Comment\CommentRepository;
use App\Repositories\Comment\CommentReposityInterface;

use App\Repositories\Role\RoleRepository;
use App\Repositories\Role\RoleReposityInterface; 

use App\Repositories\Tag\TagRepository;
use App\Repositories\Tag\TagReposityInterface; 

use App\Repositories\User\UserRepository;
use App\Repositories\User\UserReposityInterface; 


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(NewReposityInterface::class,NewReposiory::class,);
        $this->app->bind(MenuReposityInterface::class,MenuReposiory::class);
        $this->app->bind(CommentReposityInterface::class,CommentRepository::class);
        $this->app->bind(RoleReposityInterface::class,RoleRepository::class);
        $this->app->bind(TagReposityInterface::class,TagRepository::class);
        $this->app->bind(UserReposityInterface::class,UserRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
