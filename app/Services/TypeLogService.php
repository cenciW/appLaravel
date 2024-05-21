<?php

namespace App\Services;

use App\Models\TypeLog;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

use App\Services\Base\AbstractService;

class TypeLogService extends AbstractService implements TypeLogServiceInterface
{
    private $repository;
    public function __construct(TypeLog $typeLog)
    {
        $this->repository = $typeLog;
        parent::__construct($typeLog);
    }

    // public function index($pesquisar, $page)
    // {
    //     $registro = $this->repository->where(function ($query) use ($pesquisar) {
    //         if ($pesquisar) {
    //             $query->where('nome', 'like', "%{$pesquisar}%");
    //             $query->orWhere("email", "like", "%{$pesquisar}%");
    //             $query->orWhere("telefone", "like", "%{$pesquisar}%");
    //         }
    //     })->paginate($page);

    //     return $registro;

    // }

    // //salvar
    // public function store($request)
    // {

    //     DB::beginTransaction();
    //     try {
    //         $registro = $this->repository->create($request);
    //         DB::commit();
    //         return $registro;
    //     } catch (Exception $e) {
    //         DB::rollBack();
    //         return new Exception('Erro ao criar o registro: ' . $e->getMessage());
    //     }
    // }

    // public function show($id)
    // {
    //     try {
    //         $registro = $this->repository->find($id);
    //         return $registro;
    //     } catch (ModelNotFoundException $e) {
    //         throw new Exception('Registro não encontrado.');
    //     }
    // }

    // public function update($request, $id)
    // {

    //     $typeLog = $this->repository->find($id);

    //     DB::beginTransaction();
    //     try {
    //         $registro = $typeLog->update($request);
    //         DB::commit();
    //         return $registro;
    //     } catch (Exception $e) {
    //         DB::rollBack();
    //         return new Exception('Erro ao criar o registro: ' . $e->getMessage());
    //     }
    // }

    // public function destroy($id)
    // {
    //     $typeLogCadastrado = $this->show($id);

    //     DB::beginTransaction();
    //     try {
    //         $typeLogCadastrado->delete();
    //         DB::commit();
    //     } catch (Exception $e) {
    //         DB::rollBack();
    //         return new Exception('Erro ao excluir o registro: ' . $e->getMessage());
    //     }
    // }

}
