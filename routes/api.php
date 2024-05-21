<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AutorRestController;
use App\Http\Controllers\Api\PersonalUserRestController;
use App\Http\Controllers\Api\PermissionRestController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('autor')->group(function () {

    //Chamando rota para usar o controller.
    //Listar geral
    Route::any('/index', [AutorRestController::class, 'index']);
    //Listar com id
    Route::get('/show/{id}', [AutorRestController::class, 'show']);

    //url esquerda ----- urn na direita
    //Salvar
    Route::post('/store', [AutorRestController::class, 'store']);
    //update
    Route::put('/update/{id}', [AutorRestController::class, 'update']);
    //Deletar
    Route::delete('/destroy/{id}', [AutorRestController::class, 'destroy']);
});

Route::prefix('user')->group(function () {

    //Chamando rota para usar o controller.
    //Listar geral
    Route::any('/index', [PersonalUserRestController::class, 'index']);
    //Listar com id
    Route::get('/show/{id}', [PersonalUserRestController::class, 'show']);

    //url esquerda ----- urn na direita
    //Salvar
    Route::post('/store', [PersonalUserRestController::class, 'store']);
    //update
    Route::put('/update/{id}', [PersonalUserRestController::class, 'update']);
    //Deletar
    Route::delete('/destroy/{id}', [PersonalUserRestController::class, 'destroy']);
});

Route::prefix('permission')->group(function(){

    //Chamando rota para usar o controller.
    //Listar geral
    Route::any('/index', [PermissionRestController::class, 'index']);
    //Listar com id
    Route::get('/show/{id}', [PermissionRestController::class, 'show']);

    //url esquerda ----- urn na direita
    //Salvar
    Route::post('/store', [PermissionRestController::class, 'store']);
    //update
    Route::put('/update/{id}', [PermissionRestController::class, 'update']);
    //Deletar
    Route::delete('/destroy/{id}', [PermissionRestController::class, 'destroy']);
});


/*
Route::prefix('project')->group(function () {

    //Chamando rota para usar o controller.
    //Listar geral
    Route::any('/index', [ProjectController::class, 'index'])->name('project.index');
    //Criar
    Route::get('/create', [ProjectController::class, 'create'])->name('project.create');
    //Editar
    Route::get('/edit/{id}', [ProjectController::class, 'edit'])->name('project.edit');
    //Listar com id
    Route::get('/show/{id}', [ProjectController::class, 'show'])->name('project.show');
    //criando o get para o delete
    Route::get('/delete/{id}', [ProjectController::class, 'delete'])->name('project.delete');
    //url esquerda ----- urn na direita
    //Salvar
    Route::post('/store', [ProjectController::class, 'store'])->name('project.store');
    //Deletar
    Route::delete('/destroy/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');
    //update
    Route::put('/update/{id}', [ProjectController::class, 'update'])->name('project.update');

});*/
