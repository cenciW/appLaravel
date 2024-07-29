<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectFormRequest;
use App\Models\Project;
use App\Services\ProjectService;
use App\Services\ProjectServiceInterface;
use Illuminate\Http\Request;

class ProjectRestController extends Controller
{
    private $service;

    public function __construct(ProjectService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function get(Request $request)
    {
        $pesquisar = $request->pesquisar ?? "";
        $page = $request->qtdPorPag ?? 5;
        $registros = $this->service->index($pesquisar, $page);


        return response()->json([
            'registro'=> $registros,
            'status'=>200,
            ],200
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function post(ProjectFormRequest $request)
    {
        
        $registro = $request->all();
        try{
            $this->service->store($registro);
            return response()->json([
                'message' => 'Registro salvo com sucesso',
                'status' => 201,
            ], 201);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Erro ao salvar o registro',
                'status' => 500,
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function getById(string $id)
    {
        //
        $registro = $this->service->show($id);
        
        try{
            return response()->json([
                'registro' => $registro,
                'status' => 200,
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Erro ao mostrar o registro',
                'status' => 500,
            ], 500);
        }  
    }

    /**
     * Update the specified resource in storage.
     */
    public function put(Request $request, string $id)
    {
        $registro = $request->all();
        try{
            $this->service->update($registro, $request->id);
            return response()->json([
                'message'=> 'Registro atualizado com sucesso',
                'status'=> 200,
                ], 200);
        }catch(\Exception $e){
            throw new \Exception('Erro ao atualizar o registro');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        //
        $this->service->destroy($id);

        return response()->json([], 204);
    }

    public function createCard(Request $request) 
    {
        $registro = $request->all();
        try{
            $this->service->createCard($registro);
            return response()->json([
                'message'=> 'Card criado com sucesso',
                'status'=> 200,
                ], 200);
        }catch(\Exception $e){
            throw new \Exception('Erro ao criar o card');         
        }
    }

    public function card(Request $request, string  $id)
    {
        $this->service->
    }

    public function cardById(Request $request)
    {

    }
}
