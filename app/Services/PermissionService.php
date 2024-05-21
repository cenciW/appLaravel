<?php

namespace App\Services;

use App\Models\Permission;
use App\Services\PermissionServiceInterface;
use App\Services\Base\AbstractService;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermissionService extends AbstractService implements PermissionServiceInterface{

    protected $repository;
    public function __construct(Permission $permission) {
        $this->repository = $permission;
        parent::__construct($permission);
    }
}
