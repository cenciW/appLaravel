<?php

use App\Models\StatusRequest;
use App\Services\Base\AbstractService;

class StatusRequestService extends AbstractService implements ProjectServiceInterface
{
    protected $repository;
    public function __construct(StatusRequest $statusRequest)
    {
        $this->repository = $statusRequest;
        parent::__construct($statusRequest);
    }
}
