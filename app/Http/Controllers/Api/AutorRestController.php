<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AutorFormRequest;
use App\Models\Autor;
use App\Services\AutorServiceInterface;
use Illuminate\Http\Request;

class AutorRestController extends Controller
{
    private $service;

    public function __construct(AutorServiceInterface $service)
    {
        $this->service = $service;
    }
    
    public function index(Request $request)
    {

        $pesquisar = $request->pesquisar ?? "";
        $page = $request->qtdPorPag ?? 5;
        //essa variavel service eu criei no construtor e atribui o valor do model
        // dd($request->all());
        $registros = $this->service->index($pesquisar, $page);
        //$registros = Autor::paginate(10);
        return response()->json([
            'registro'=> $registros,
            'status'=>200,
            ],200
        );
    }
    
    public function store(AutorFormRequest $request)
    {
        $registro = $request->all();
        try{
            $this->service->store($registro);
            return response()->json([
                'message' => 'Registro salvo com sucesso',
                'status' => 200,
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Erro ao salvar o registro',
                'status' => 500,
            ], 500);
        }
    }

    public function show(Request $request, AutorServiceInterface $service)
    {
        
    }
    
    public function update(Request $request, AutorServiceInterface $service)
    {
        $registro = $request->all();
        try{
            $this->service->update($registro, $request->id);
            return response()->json([
                'message'=> 'Registro atualizado com sucesso',
                'status'=> 200,
                ], 200);
        }catch(\Exception $e){
            return response()->json([
                'message'=> 'Erro ao atualizar o registro',
                'status'=> 500,
                ], 500);
        }

    }
    
    public function destroy(Request $request, AutorServiceInterface $service)
    {
        
    }

}
