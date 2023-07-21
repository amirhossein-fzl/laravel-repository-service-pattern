<?php

namespace App\Providers;

use App\Repositories\Interfaces\IPostRepository;
use App\Repositories\PostRepository;
use Illuminate\Support\ServiceProvider;

class PostServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Repositories
        $this->app->bind(IPostRepository::class, PostRepository::class);

        // Services
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
