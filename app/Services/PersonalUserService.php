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

    public function confirmMail($id) {

        $user = $this->repository->find($id);

        if (!$user) {
            throw new ModelNotFoundException('Usuário não encontrado');
        }

        if ($user->email_verified_at) {
            throw new \App\Exceptions\EmailConfirmedException('Email já confirmado');
        }

        $user->email_verified_at = now();
        $user->save();

        return $user;

    }

}
