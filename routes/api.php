<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\PersonalUserRestController;
use App\Http\Controllers\Api\TaskRestController;
use App\Http\Controllers\Api\CardRestController;
use App\Http\Controllers\Api\ProjectLogRestController;
use App\Http\Controllers\Api\ProjectRestController;
use App\Http\Controllers\Api\UserProjectRestController;
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

#region USER ROUTES

Route::prefix('user')->group(function () { 

    //Chamando rota para usar o controller.
    //Listar geral
    Route::any('/get', [PersonalUserRestController::class, 'get']);
    //Listar com id
    Route::get('/getById/{id}', [PersonalUserRestController::class, 'getById']);

    //url esquerda ----- urn na direita
    //Salvar
    Route::post('/post', [PersonalUserRestController::class, 'post']);
    //update
    Route::put('/put/{id}', [PersonalUserRestController::class, 'put']);
    //Deletar
    Route::delete('/delete/{id}', [PersonalUserRestController::class, 'delete']);

    Route::get('/confirm/{id}', [PersonalUserRestController::class, 'confirmMail'])->name('confirm-user');
});

#endregion

#region TASK ROUTES

Route::prefix('task')->group(function () { 

    //Chamando rota para usar o controller.
    //Listar geral
    Route::any('/get', [TaskRestController::class, 'get']);
    //Listar com id
    Route::get('/getById/{id}', [TaskRestController::class, 'getById']);

    //url esquerda ----- urn na direita
    //Salvar
    Route::post('/post', [TaskRestController::class, 'post']);
    //update
    Route::put('/put/{id}', [TaskRestController::class, 'put']);
    //Deletar
    Route::delete('/delete/{id}', [TaskRestController::class, 'delete']);
});

#endregion

#region CARD ROUTES

Route::prefix('card')->group(function () { 

    //Chamando rota para usar o controller.
    //Listar geral
    Route::any('/get', [CardRestController::class, 'get']);
    //Listar com id
    Route::get('/getById/{id}', [CardRestController::class, 'getById']);

    //url esquerda ----- urn na direita
    //Salvar
    Route::post('/post', [CardRestController::class, 'post']);
    //update
    Route::put('/put/{id}', [CardRestController::class, 'put']);
    //Deletar
    Route::delete('/delete/{id}', [CardRestController::class, 'delete']);
});

#endregion

#region PROJECT ROUTES

Route::prefix('project')->group(function () { 

    //Chamando rota para usar o controller.
    //Listar geral
    Route::any('/get', [ProjectRestController::class, 'get']);
    //Listar com id
    Route::get('/getById/{id}', [ProjectRestController::class, 'getById']);

    //url esquerda ----- urn na direita
    //Salvar
    Route::post('/post', [ProjectRestController::class, 'post']);
    //update
    Route::put('/put/{id}', [ProjectRestController::class, 'put']);
    //Deletar
    Route::delete('/delete/{id}', [ProjectRestController::class, 'delete']);
});

#endregion

#region USERPROJECT ROUTES

Route::prefix('user_project')->group(function () { 

    //Chamando rota para usar o controller.
    //Listar geral
    Route::any('/get', [UserProjectRestController::class, 'get']);
    //Listar com id
    Route::get('/getById/{id}', [UserProjectRestController::class, 'getById']);

    //url esquerda ----- urn na direita
    //Salvar
    Route::post('/post', [UserProjectRestController::class, 'post']);
    //update
    Route::put('/put/{id}', [UserProjectRestController::class, 'put']);
    //Deletar
    Route::delete('/delete/{id}', [UserProjectRestController::class, 'delete']);

    //Teste de rota
    Route::get('/{id}/project/{project_id}', [UserProjectRestController::class,'getProjectById']);

    Route::get('/{id}/projects', [UserProjectRestController::class,'getUserProjects']);

});

#endregion

#region PROJECTLOG ROUTES

Route::prefix('project_log')->group(function () { 

    //Chamando rota para usar o controller.
    //Listar geral
    Route::any('/get', [ProjectLogRestController::class, 'get']);
    //Listar com id
    Route::get('/getById/{id}', [ProjectLogRestController::class, 'getById']);

    //url esquerda ----- urn na direita
    //Salvar
    Route::post('/post', [ProjectLogRestController::class, 'post']);
    //update
    Route::put('/put/{id}', [ProjectLogRestController::class, 'put']);
    //Deletar
    Route::delete('/delete/{id}', [ProjectLogRestController::class, 'delete']);
});

#endregion