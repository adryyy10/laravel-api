<?php

namespace App\Providers;

use App\Interfaces\Resource\GetRepositoryInterface as ResourceGetRepositoryInterface;
use App\Interfaces\Resource\GetCollectionRepositoryInterface as ResourceGetCollectionRepositoryInterface;
use App\Interfaces\User\DeleteRepositoryInterface;
use App\Interfaces\User\GetRepositoryInterface;
use App\Interfaces\User\GetCollectionRepositoryInterface;
use App\Interfaces\User\PostRepositoryInterface;
use App\Interfaces\User\PutRepositoryInterface;
use App\Repositories\Resource\GetRepository as ResourceGetRepository;
use App\Repositories\Resource\GetCollectionRepository as ResourceGetCollectionRepository;
use App\Repositories\User\DeleteRepository;
use App\Repositories\User\GetCollectionRepository;
use App\Repositories\User\GetRepository;
use App\Repositories\User\PostRepository;
use App\Repositories\User\PutRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        /** Get information */
        $this->app->bind(GetRepositoryInterface::class, GetRepository::class);
        $this->app->bind(GetCollectionRepositoryInterface::class, GetCollectionRepository::class);
        $this->app->bind(ResourceGetRepositoryInterface::class, ResourceGetRepository::class); // Use a different name for the binding.
        $this->app->bind(ResourceGetCollectionRepositoryInterface::class, ResourceGetCollectionRepository::class);
    
        /** Create data */
        $this->app->bind(PostRepositoryInterface::class, PostRepository::class);
    
        /** Update data */
        $this->app->bind(PutRepositoryInterface::class, PutRepository::class);
    
        /** Delete data */
        $this->app->bind(DeleteRepositoryInterface::class, DeleteRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
