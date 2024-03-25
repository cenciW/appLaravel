<?php

//deve inserir a referencia aqui para conseguir usar o controller
use App\Http\Controllers\AutorController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('autor')->group(function(){

    //Chamando rota para usar o controller.
    //Listar geral
    Route::get('/index',[AutorController::class,'index'])->name('autor.index');

    //Criar
    Route::get('/create',[AutorController::class,'create'])->name('autor.create');

    //Editar
    Route::get('/edit/{id}',[AutorController::class,'edit'])->name('autor.edit');

    //Listar com id
    Route::get('/show/{id}',[AutorController::class,'show'])->name('autor.show');

    //criando o get para o delete
    Route::get('/delete/{id}',[AutorController::class,'delete'])->name('autor.delete');

    //url esquerda ----- urn na direita
    //Salvar
    Route::post('/store',[AutorController::class,'store'])->name('autor.store');
    //Deletar
    Route::post('/destroy/{id}',[AutorController::class,'destroy'])->name('autor.destroy');


    //update
    Route::put('/update/{id}',[AutorController::class,'update'])->name('autor.update');
});