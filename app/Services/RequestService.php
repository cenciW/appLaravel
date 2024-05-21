<?php

namespace App\Services;

use App\Models\Request;
use App\Services\RequestServiceInterface;
use App\Services\Base\AbstractService;

class RequestService extends AbstractService implements RequestServiceInterface
{
    protected $repository;
    
    public function __construct(Request $request)
    {
        $this->repository = $request;
        parent::__construct($request);
    }
}