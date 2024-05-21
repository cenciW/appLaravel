<?php

namespace App\Services;

use App\Models\Autor;
use App\Services\AutorServiceInterface;
use App\Services\Base\AbstractService;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AutorService extends AbstractService implements AutorServiceInterface{

    protected $repository;
    public function __construct(Autor $autor) {
        $this->repository = $autor;
        parent::__construct($autor);
    }
//     private $repository;
//     public function __construct(Autor $autor){
//         $this->repository = $autor;
//     }
//     public function index($pesquisar, $page){

//         $registro = $this->repository->where(function($query) use($pesquisar){
//         if($pesquisar){
//             $query->where('nome', 'like', "%{$pesquisar}%");
//             $query->orWhere("email", "like", "%{$pesquisar}%");
//             $query->orWhere("telefone", "like", "%{$pesquisar}%");
//         }})->paginate($page);

//         #dd($registro);

            
//         return $registro;
//     }
//       //salvar
//     public function store($request){
//       DB::beginTransaction();
//         try{
//             $registro = $this->repository->create($request);
//             DB::commit();
//             return $registro;
//         }catch(\Exception $e){
//             DB::rollBack();
//             return new Exception('Erro ao criar o registro: '. $e->getMessage());
//         }
//     }
//   public function show($id){
//         try{
//             $registro = $this->repository->find($id);
//             return $registro;
//         }catch(ModelNotFoundException $e){
//             throw new Exception('Registro não encontrado.');
//         }
//     }
//   public function update($request, $id){
    
        
//     $autorCadastrado = $this->repository->find($id);
//     DB::beginTransaction();
//     try{
//         $registro = $autorCadastrado->update($request);
//         DB::commit();
//         return $registro;
//     }catch(\Exception $e){
//         DB::rollBack();
//         return new Exception('Erro ao criar o registro: '. $e->getMessage());
//         }
//     }
// public function destroy($id){
//     $autorCadastrado = $this->show($id);
//     DB::beginTransaction();
//         try{
//             $autorCadastrado->delete();
//             DB::commit();
//         }catch(\Exception $e){
//             DB::rollBack();
//             return new Exception('Erro ao excluir o registro: '. $e->getMessage());
//         }
//     }
}
