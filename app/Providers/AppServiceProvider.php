<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\ForumRepositoryInterface;
use App\Repositories\ForumEloquentORM;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            ForumRepositoryInterface::class, 
            ForumEloquentORM::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        
    }
}
