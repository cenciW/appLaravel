<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    // faça a injeção de dependência do context
    private $repository;
    public function __construct(Autor $autor)
    {
        $this->repository = $autor;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd('acessando o controller autor controller - index');

        //essa variavel repository eu criei no construtor e atribui o valor do model
        $registros =  $this->repository->paginate(10);
        //$registros = Autor::paginate(10);

        return view('autor.index', [
            'registros'=> $registros,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //dd('acessando controller - create');
        return view('autor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $registro = $request->all();

        $autor = $this -> repository -> find($id);

        // $autor['nome'] = $registro['nome'];
        // $autor['apelido'] = $registro['apelido'];
        // $autor['cidade'] = $registro['cidade'];
        // $autor['bairro'] = $registro['bairro'];
        // $autor['cep'] = $registro['cep'];
        // $autor['email'] = $registro['email'];
        // $autor['telefone'] = $registro['telefone'];
        
        $autor->update($registro);


        dd($registro);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //complete a função de editar
        $registro = $this->repository->find($id);

        //Validação para caso o registro não exista
        //if(!$registro){
          //  return redirect()->back();
        //}

        return view('autor.edit', [
            'registro'=> $registro,
        ]);


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
