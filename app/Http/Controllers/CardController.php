<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\CardServiceInterface;
use Illuminate\Http\Request;

class CardController extends Controller
{
    // faça a injeção de dependência do context
    private $service;
    //private $autor;
    public function __construct(CardServiceInterface $service/*, Autor $autor*/)
    {

        $this->service = $service;
        //$this->autor = $autor;
    }

    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     //dd('acessando o controller autor controller - index');

    //     //essa variavel service eu criei no construtor e atribui o valor do model
    //     $registros = $this->service->index(10);
    //     //$registros = Autor::paginate(10);

    //     return view('card.index', [
    //         'registros' => $registros['registros'],
    //     ]);
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //dd('acessando controller - create');
        return view('card.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(CardFormRequest $request)
    // {
    //     #validar o campo antes de efetivamente criar
    //     /*$request ->validate(
    //     $this->autor->rules(),
    //     $this->autor->feedback()
    //     );  removendo isso aqui pra fazer a requisicao de outra maneira*/

    //     $this->service->store($request);

    //     //mostrar o registro dentro do request
    //     //dd("criando um registro");

    //     return redirect()->route('card.index');
    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $registro = $this->service->show($id);
        return view('card.show', [
            'registro' => $registro['registro'],
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //complete a função de editar
        $registro = $this->service->show($id);

        //Validação para caso o registro não exista
        //if(!$registro){
        //  return redirect()->back();
        //}

        return view('card.edit', [
            'registro' => $registro['registro'],
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    /*public function update(CardFormRequest $request, string $id)
    {

        $this->service->update($request, $id);
        return redirect()->route('card.index');

    }*/

    public function delete(string $id)
    {
        $registro = $this->service->show($id);

        return view('card.destroy', [
            'registro' => $registro['registro'],
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->service->destroy($id);
        return redirect()->route('card.index');
    }
}
