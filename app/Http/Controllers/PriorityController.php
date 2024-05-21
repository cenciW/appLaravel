<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use Illuminate\Http\Request;

class PriorityController extends Controller
{
    private $service;
    //private $autor;
    public function __construct(PriorityUserServiceInterface $service)
    {

        $this->service = $service;
        //$this->autor = $autor;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registros = $this->service->index('', 10);
        //$registros = Autor::paginate(10);

        return view('user.index', [
            'registros' => $registros['registros'],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        #validar o campo antes de efetivamente criar
        /*$request ->validate(
        $this->autor->rules(),
        $this->autor->feedback()
        );  removendo isso aqui pra fazer a requisicao de outra maneira*/

        $this->service->store($request);

        //mostrar o registro dentro do request
        //dd("criando um registro");

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Priority $priority)
    {
        //
        $registro = $this->service->show($id);
        return view('user.show', [
            'registro' => $registro['registro'],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Priority $priority)
    {
        //
        $registro = $this->service->show($id);

        //Validação para caso o registro não exista
        //if(!$registro){
        //  return redirect()->back();
        //}

        return view('user.edit', [
            'registro' => $registro['registro'],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Priority $priority)
    {
        //
        $this->service->update($request, $id);
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Priority $priority)
    {
        //
        $this->service->destroy($id);
        return redirect()->route('permission.index');
    }
}
