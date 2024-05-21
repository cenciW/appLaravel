<?php

namespace App\Services;

use App\Models\TypeLog;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

use App\Services\Base\AbstractService;

class TypeLogService extends AbstractService implements TypeLogServiceInterface
{
    protected $repository;
    public function __construct(TypeLog $typeLog)
    {
        $this->repository = $typeLog;
        parent::__construct($typeLog);
    }

}
