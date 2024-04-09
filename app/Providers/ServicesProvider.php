<?php

namespace App\Providers;

use App\Services\AutorService;
use App\Services\AutorServiceInterface;
use App\Services\PriorityServiceInterface;
use Illuminate\Support\ServiceProvider;

class ServicesProvider extends ServiceProvider
{
    //relacionar Interface com Service
    public array $bindings = [
        AutorServiceInterface::class => AutorService::class,
        PersonalUserServiceInterface::class => PersonalUserService::class,
        ProjectServiceInterface::class => ProjectService::class,
        CardServiceInterface::class => CardService::class,
        PriorityServiceInterface::class => PriorityService::class,
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
