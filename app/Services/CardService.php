<?php

namespace App\Services;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Services\Base\AbstractService;


class CardService extends AbstractService implements CardServiceInterface {
    protected $repository;

    public function __construct(Card $card) {
        $this->repository = $card;
        parent::__construct($card);
    }

    // public function index(){
    //     $registros = $this->repository->paginate(15);
    //     return ([
    //         "registros"=>$registros
    //     ]);
    // }
    
    // //salvar
    // public function store($request){

    //     $this->repository->create($request->all());
    // }

    // public function show($id){
    //     $registro = $this->repository->find($id);
    //     return (["registro"=>$registro]);
    // }


    // public function update($request, $id){   
    //     $registro = $request->all();
    //     $autor = $this->repository->find($id);
    //     $autor ->update($registro);
    // }

    // public function destroy($id){
    //     $autorCadastrado = $this->repository->find($id);
    //     $autorCadastrado->delete();
    // }


}