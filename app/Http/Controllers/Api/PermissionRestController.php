<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionFormRequest;
use App\Services\PermissionServiceInterface;
use App\Services\PermissionService;
use Illuminate\Http\Request;

class PermissionRestController extends Controller
{
    private $service;

    public function __construct(PermissionServiceInterface $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissionFormRequest $request)
    {
        
        $registro = $request->all();
        // Log para depuração
        try{
            //registro aqui ta ok, chegando certo, mas o método store nao está persistindo
            //estranho é que no autor está funcionando
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
    public function show(string $id)
    {
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
