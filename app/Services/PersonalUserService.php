<?php

namespace App\Services;

use App\Models\PersonalUser;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

use App\Services\Base\AbstractService;

class PersonalUserService extends AbstractService
{
    protected $repository;
    public function __construct(PersonalUser $personalUser)
    {
        $this->repository = $personalUser;
        parent::__construct($personalUser);
    }

}
