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
        CardServiceInterface::class => CardService::class,
        PersonalUserServiceInterface::class => PersonalUserService::class,
        PriorityServiceInterface::class => PriorityService::class,
        ProjectLogServiceInterface::class => ProjectLogService::class,
        ProjectServiceInterface::class => ProjectService::class,
        RequestServiceInterface::class => RequestService::class,
        StatusRequestServiceInterface::class => StatusRequestService::class,
        StatusTaskServiceInterface::class => StatusTaskService::class,
        TaskServiceInterface::class => TaskService::class,
        TypeLogServiceInterface::class => TypeLogService::class,
        UserProjectServiceInterface::class => UserProjectService::class,
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
