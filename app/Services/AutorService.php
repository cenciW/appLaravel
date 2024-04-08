<?php

namespace App\Services;

use App\Models\Autor;
use App\Services\AutorServiceInterface;
use Illuminate\Http\Request;


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

        $this->repository->create($request->all());
    }

    public function show($id){
        $registro = $this->repository->find($id);
        return (["registro"=>$registro]);
    }


    public function update($request, $id){
            
        $registro = $request->all();
        $autor = $this->repository->find($id);
        $autor ->update($registro);
    }

    public function destroy($id){
        $autorCadastrado = $this->repository->find($id);
        $autorCadastrado->delete();
    }


}
