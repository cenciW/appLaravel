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


    public function getUserProjects($id) {
        try {
            $results = $this->repository
            ->join('project', 'project.id', '=', 'user_project.project_id')
            ->join('personal_user', 'personal_user.id', '=', 'user_project.personal_user_id')
            ->where('user_project.personal_user_id', $id)
            ->select('personal_user.id as user_id', 'personal_user.name', 'personal_user.email', 'project.*', 'user_project.confirmed')
            ->get();

            // Extraia os dados do usuário
            $user = [
                'id' => $results[0]->user_id,
                'name' => $results[0]->name,
                'email' => $results[0]->email,
            ];

            // Extraia os projetos
            $projects = $results->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->name,
                    'description' => $item->description,
                    'confirmed' => $item->confirmed,
                    // Adicione outros campos do projeto conforme necessário
                ];
            })->toArray();

            // Retorne os dados formatados
            return [
                'user' => $user,
                'projects' => $projects
            ];
        } catch(\Exception $e) {
        
            return new \Exception('Erro ao buscar os projetos');
        }
    }

    public function getProjectByUserId($id, $project_id) {

        try {
            
            //Depois arrumar para fazer com apenas um select
            $project = $this->repository
                ->join('project', 'project.id', '=', 'user_project.project_id')
                ->join('personal_user', 'personal_user.id', '=', 'user_project.personal_user_id')
                ->where('user_project.personal_user_id', $id)
                ->where('user_project.project_id', $project_id)
                ->select('project.*', 'user_project.confirmed', 'personal_user.*')->get()->first();

            $user = $this->repository
                ->join('personal_user', 'personal_user.id', '=', 'user_project.personal_user_id')
                ->where('user_project.personal_user_id', $id)
                ->where('user_project.project_id', $project_id)
                ->select('personal_user.id', 'personal_user.name', 'personal_user.email')->get()->first();
            
            return [
                'project'=> $project,
                'user'=> $user
            ];

        } catch(\Exception $e) {
        
            throw new \Exception('Erro ao buscar o projeto');
        }
    }

    public function confirmProject($id, $project_id) {

        try {

            $user_project = $this->repository->where('id', $id)->where('project_id', $project_id)->first();

            if (!$user_project) {
                throw new ModelNotFoundException('Usuário não encontrado');
            }

            if ($user_project->confirmed) {
                throw new \App\Exceptions\EmailConfirmedException('Email já confirmado');
            }

            $user_project->confirmed = true;
            $user_project->save();

            return $user_project;

        } catch (\Exception $e) {
            throw new \Exception('Erro ao confirmar o projeto');
        }

    }
}