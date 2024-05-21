<?php

namespace App\Services;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Services\Base\AbstractService;


class PermissionService extends AbstractService implements PermissionServiceInterface {
    protected $repository;
    public function __construct(Permission $permission) {
        $this->repository = $permission;
        parent::__construct($permission);
    }


}