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

    public function index(){
        $registros = $this->repository->paginate(15);
        return ([
            "registros"=>$registros
        ]);
    }
    
    //salvar
    public function store(Request $request){
        #validar o campo antes de efetivamente criar
        $request ->validate([
            $this->repository->rules(),
        ]);

        $this->repository->create($request->all());
    }

    public function show($id){
        $registro = $this->repository->find($id);
        return (["registro"=>$registro]);
    }


    public function update(Request $request, string $id){
        // $request ->validate([
        //     $this->repository->rules(),
        // ]);
        
        $autor = $request ->all();
        $autorCadastrado = $this->repository->find($id);
        $autorCadastrado->update($autor);
    }

    public function destroy($id){
        $autorCadastrado = $this->repository->find($id);
        $autorCadastrado->delete();
    }


}