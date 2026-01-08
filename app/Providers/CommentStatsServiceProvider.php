<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\CommentStatsService;

class CommentStatsServiceProvider extends ServiceProvider
{
     public function provides(): array
    {
        return [CommentStatsService::class];
    }
    /**
     * Register services.
     */
    public function register(): void
    {
        // Bind PostService to the container
        $this->app->singleton(CommentStatsService::class, function ($app) {
            return new CommentStatsService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
