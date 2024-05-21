<?php

use App\Models\StatusRequest;
use App\Services\Base\AbstractService;
use App\Services\StatusRequestServiceInterface;

class StatusRequestService extends AbstractService implements StatusRequestServiceInterface
{
    protected $repository;
    public function __construct(StatusRequest $statusRequest)
    {
        $this->repository = $statusRequest;
        parent::__construct($statusRequest);
    }
}
