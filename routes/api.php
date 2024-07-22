<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\PersonalUserRestController;
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

Route::prefix('user')->group(function () { 

    //Chamando rota para usar o controller.
    //Listar geral
    Route::any('/index', [PersonalUserRestController::class, 'index']);
    //Listar com id
    Route::get('/show/{id}', [PersonalUserRestController::class, 'show']);

    //url esquerda ----- urn na direita
    //Salvar
    Route::post('/save', [PersonalUserRestController::class, 'save']);
    //update
    Route::put('/update/{id}', [PersonalUserRestController::class, 'update']);
    //Deletar
    Route::delete('/destroy/{id}', [PersonalUserRestController::class, 'destroy']);
});