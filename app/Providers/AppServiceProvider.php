<?php

namespace App\Providers;

use App\Services\AutorService;
use App\Services\AutorServiceInterface;

use App\Services\PermissionService;
use App\Services\PermissionServiceInterface;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            PermissionServiceInterface::class,
            PermissionService::class,
        );

        // $this->app->bind(
        //     AutorServiceInterface::class,
        //     AutorService::class,
        // );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
