<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('post.stats', function () {
            return [
                'posts' => Post::count(),
                'comments' => Comment::count(),
            ];
        });
    }
}