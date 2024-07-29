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
            
            $project = $this->repository
                ->join('project', 'project.id', '=', 'user_project.project_id')
                ->where('user_project.personal_user_id', $id)
                ->select('project.*', 'user_project.confirmed')->get();
            
            $user = $this->repository
                ->join('personal_user', 'personal_user.id', '=', 'user_project.personal_user_id')
                ->where('user_project.personal_user_id', $id)
                ->select('personal_user.id', 'personal_user.name', 'personal_user.email')->get()->first();
            
            return [
                'project'=> $project,
                'user'=> $user
            ];
        } catch(\Exception $e) {
        
            return new \Exception();
        }
    }

    public function getProjectById($id, $project_id) {

        try {
            
            
            $project = $this->repository
                ->join('project', 'project.id', '=', 'user_project.project_id')
                ->where('user_project.personal_user_id', $id)
                ->where('user_project.project_id', $project_id)
                ->select('project.*', 'user_project.confirmed')->get()->first();
            
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
        
            return new \Exception();
        }
    }
}
