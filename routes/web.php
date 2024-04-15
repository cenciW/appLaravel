<?php

//deve inserir a referencia aqui para conseguir usar o controller
use App\Http\Controllers\Web\AutorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Dashboard;
use App\Http\Controllers\ProjectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/dashboard', [Dashboard::class, 'dashboard'])->name('dashboard');

Route::prefix('autor')->group(function () {

    //Chamando rota para usar o controller.
    //Listar geral
    Route::any('/index', [AutorController::class, 'index'])->name('autor.index');

    //Criar
    Route::get('/create', [AutorController::class, 'create'])->name('autor.create');

    //Editar
    Route::get('/edit/{id}', [AutorController::class, 'edit'])->name('autor.edit');

    //Listar com id
    Route::get('/show/{id}', [AutorController::class, 'show'])->name('autor.show');

    //criando o get para o delete
    Route::get('/delete/{id}', [AutorController::class, 'delete'])->name('autor.delete');

    //url esquerda ----- urn na direita
    //Salvar
    Route::post('/store', [AutorController::class, 'store'])->name('autor.store');

    //Deletar
    Route::delete('/destroy/{id}', [AutorController::class, 'destroy'])->name('autor.destroy');
    //update
    Route::put('/update/{id}', [AutorController::class, 'update'])->name('autor.update');

});

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

});
