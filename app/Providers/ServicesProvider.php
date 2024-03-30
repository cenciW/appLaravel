<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\AutorServiceInterface;
use App\Services\AutorService;

class ServicesProvider extends ServiceProvider
{
    //relacionar Interface com Service
    public array $bindings = [
        AutorServiceInterface::class => AutorService::class,
        UserServiceInterface::class => UserService::class,
        ProjectServiceInterface::class => ProjectService::class
    ];


    // /**
    //  * Register services.
    //  */
    // public function register(): void
    // {
    //     //
    // }

    // /**
    //  * Bootstrap services.
    //  */
    // public function boot(): void
    // {
    //     //
    // }
}
