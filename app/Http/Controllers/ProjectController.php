<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectFormRequest;
use App\Services\ProjectServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProjectController extends Controller
{
    // faça a injeção de dependência do context
    private $service;
    public function __construct(ProjectServiceInterface $service)
    {

        $this->service = $service;
    }

    public function index(Request $request)
    {

        $pesquisar = $request->pesquisar ?? "";
        $page = $request->qtdPorPag ?? 5;

        $registros = $this->service->index($pesquisar, $page);

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
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectFormRequest $request)
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
            return redirect()->route('project.index')->with('success', 'Projeto cadastrado com sucesso');
        } catch (\Exception $e) {
            return view('project.create', [
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

        try {
            $registro = $this->service->show($id);
            return view('project.show', [
                'registro' => $registro,
            ]);
        } catch (\Exception $e) {
            # redirect back with registro and fail
            return Redirect::back()->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $registro = $this->service->show($id);
            return view('project.edit', [
                'registro' => $registro,
            ]);

            //return redirect()->route('autor.index')->with('success','Autor editado com sucesso');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectFormRequest $request, string $id)
    {

        $registro = $request->all();
        try {
            $registro = $this->service->update($registro, $id);
            return redirect()->route('project.index')->with('success', 'Projeto atualizado com sucesso');
        } catch (\Exception $e) {
            # redirect back with registro and fail
            return Redirect::back()->with('error', $e->getMessage());
        }
    }

    public function delete(string $id)
    {
        try {
            $registro = $this->service->show($id);

            return view('project.destroy', [
                'registro' => $registro,
            ]);
        } catch (\Exception $e) {
            # redirect back with registro and fail
            return Redirect::back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->service->destroy($id);
            return redirect()->route('project.index')->with('success', 'Projeto excluído com sucesso');
        } catch (\Exception $e) {
            return Redirect::back()->with('error', $e->getMessage());
        }
    }
}
