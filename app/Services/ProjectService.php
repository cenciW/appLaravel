<?php

namespace App\Services;

use App\Models\Project;
use App\Services\Base\AbstractService;

class ProjectService extends AbstractService
{
    protected $repository;
    public function __construct(Project $project)
    {
        $this->repository = $project;
        parent::__construct($project);
    }


    public function getCards ($id) 
    {
        $this->repository->find($id);

        return ;
    }
    //Talvez fazer um filtro para buscar por projetos: 
    /*
        - Finalizados
        - Em Andamento    
    */ 
    
}
