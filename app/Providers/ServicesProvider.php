<?php

namespace App\Providers;

use App\Services\AutorService;
use App\Services\AutorServiceInterface;

use App\Services\CardService;
use App\Services\CardServiceInterface;

use App\Services\PersonalUserService;
use App\Services\PersonalUserServiceInterface;

use App\Services\PriorityService;
use App\Services\PriorityServiceInterface;

use App\Services\ProjectLogService;
use App\Services\ProjectLogServiceInterface;

use App\Services\ProjectService;
use App\Services\ProjectServiceInterface;

use App\Services\RequestService;
use App\Services\RequestServiceInterface; // Add this line

use App\Services\StatusRequestService;
use App\Services\StatusRequestServiceInterface;

use App\Services\StatusTaskService;
use App\Services\StatusTaskServiceInterface;

use App\Services\TaskService;
use App\Services\TaskServiceInterface;

use App\Services\TypeLogService;
use App\Services\TypeLogServiceInterface;

use App\Services\UserProjectService;
use App\Services\UserProjectServiceInterface;

use App\Services\PermissionService;
use App\Services\PermissionServiceInterface;

use Illuminate\Support\ServiceProvider; // Add
class ServicesProvider extends ServiceProvider
{
    //relacionar Interface com Service
    public array $bindings = [
        //do cocao
        AutorServiceInterface::class => AutorService::class,
        
        CardServiceInterface::class => CardService::class,
        PermissionServiceInterface::class => PermissionService::class,
        PersonalUserServiceInterface::class => PersonalUserService::class,
        PriorityServiceInterface::class => PriorityService::class,
        ProjectLogServiceInterface::class => ProjectLogService::class,
        ProjectServiceInterface::class => ProjectService::class,
        StatusRequestServiceInterface::class => StatusRequestService::class,
        StatusTaskServiceInterface::class => StatusTaskService::class,
        TaskServiceInterface::class => TaskService::class,
        TypeLogServiceInterface::class => TypeLogService::class,
        UserProjectServiceInterface::class => UserProjectService::class,
        RequestServiceInterface::class => RequestService::class,
    ];
}
