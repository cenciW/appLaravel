<?php

namespace App\Services;

use App\Models\StatusTask;
use App\Services\Base\AbstractService;

class StatusTaskService extends AbstractService implements StatusTaskServiceInterface
{
    protected $repository;
    public function __construct(StatusTask $statusTask)
    {
        $this->repository = $statusTask;
        parent::__construct($statusTask);
    }


}
