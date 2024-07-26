<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CardFormRequest;
use App\Models\Card;
use App\Services\CardService;
use App\Services\CardServiceInterface;
use Illuminate\Http\Request;

class CardRestController extends Controller
{
    // this Controller will do the CRUD of the Card model
    
    private $service;

    public function __construct(CardService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
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
    public function store(CardFormRequest $request)
    {

        $registro = $request->all();
        try {
            $user = $this->service->store($registro);

            return response()->json([
                'message' => 'Card criado com sucesso.',
                'status' => 201
            ], 201);
        } catch(\Exception $e){
            throw new \Exception('Ocorreu um erro inesperado' . $e->getMessage());
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->service->destroy($id);

        return response()->json([], 204);
    }

}
