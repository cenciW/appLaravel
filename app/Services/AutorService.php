<?php

namespace App\Services;

use App\Models\Autor;
use App\Services\AutorServiceInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AutorService implements AutorServiceInterface{
    private $repository;
    public function __construct(Autor $autor){
        $this->repository = $autor;
    }

    public function index($pesquisar, $page){
            $registro = $this->repository->where(function($query) use($pesquisar){
            if($pesquisar){
                $query->where('nome', 'like', "%{$pesquisar}%");
                $query->orWhere("email", "like", "%{$pesquisar}%");
                $query->orWhere("telefone", "like", "%{$pesquisar}%");
            }
        })->paginate($page);

        return $registro;


    }
    
    //salvar
    public function store($request){

        DB::beginTransaction();
        try{
            $registro = $this->repository->create($request);
            DB::commit();
            return $registro;
        }catch(\Exception $e){
            DB::rollBack();
            return new Exception('Erro ao criar o registro: '. $e->getMessage());
        }
    }

    public function show($id){
        $registro = $this->repository->find($id);
        return (["registro"=>$registro]);
    }


    public function update($request, $id){
           
        $autorCadastrado = $this->repository->find($id);

        DB::beginTransaction();
        try{
            $registro = $autorCadastrado->update($request);
            DB::commit();
            return $registro;
        }catch(\Exception $e){
            DB::rollBack();
            return new Exception('Erro ao criar o registro: '. $e->getMessage());
        }
    }

    public function destroy($id){
        $autorCadastrado = $this->repository->find($id);
        $autorCadastrado->delete();
    }


}
