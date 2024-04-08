<?php

namespace App\Http\Controllers;

use App\Http\Requests\AutorFormRequest;
use App\Models\Autor;
use App\Services\AutorService;
use App\Services\AutorServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class AutorController extends Controller
{
    // faça a injeção de dependência do context
    private $service;
    //private $autor;
    public function __construct(AutorServiceInterface $service/*, Autor $autor*/)
    {

        $this->service = $service;
        //$this->autor = $autor;
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //dd('acessando o controller autor controller - index');
        $pesquisar = $request->pesquisar ?? "";
        $page = $request->qtdPorPag ?? 5;
        //essa variavel service eu criei no construtor e atribui o valor do model
        // dd($request->all());
        $registros =  $this->service->index($pesquisar, $page);
        //$registros = Autor::paginate(10);

        return view('autor.index', [
            'registros' => $registros,
            'pages' => [5, 10, 15, 20],
            'item' => $page,
            'filter' => $pesquisar,
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
    public function store(AutorFormRequest $request)
    {
        #validar o campo antes de efetivamente criar
        /*$request ->validate(
            $this->autor->rules(),
            $this->autor->feedback()
        );  removendo isso aqui pra fazer a requisicao de outra maneira*/

        //Treating errors request
        $registro = $request->all();
        try {
            $registro = $this->service->store($registro);
            return redirect()->route('autor.index')->with('success', 'Autor cadastrado com sucesso');
        } catch (\Exception $e) {
            return view('autor.create',[
                'registro' => $registro,
                'fail' => $e->getMessage(),
        ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $registro = $this->service->show($id);
        return view('autor.show', [
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

        return view('autor.edit', [
            'registro' => $registro['registro'],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AutorFormRequest $request, string $id)
    {

        $registro = $request->all();
        try {
            $registro = $this->service->update($registro, $id);
            return redirect()->route('autor.index')->with('success', 'Autor cadastrado com sucesso');
        } catch (\Exception $e) {
            # redirect back with registro and fail
            return Redirect::back()->with('error', $e->getMessage());

            // return view('autor.edit',[
            //     'registro' => $registro,
            //     'fail' => $e->getMessage(),
        //]);
        }
    }

    public function delete(string $id)
    {
        $registro = $this->service->show($id);

        return view('autor.destroy', [
            'registro' => $registro['registro'],
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->service->destroy($id);
        return redirect()->route('autor.index');
    }
}
