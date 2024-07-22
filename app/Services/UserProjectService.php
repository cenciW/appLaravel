<?php

namespace App\Services;

use App\Models\UserProject;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

use App\Services\Base\AbstractService;

class UserProjectService extends AbstractService
{
    protected $repository;
    public function __construct(UserProject $userProject)
    {
        $this->repository = $userProject;
        parent::__construct($userProject);
    }

}
