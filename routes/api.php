<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\API\DoencaController;
use App\Http\Controllers\API\PacienteController;
use App\Http\Controllers\API\PesquisadorController;
use App\Http\Controllers\API\LocalidadeController;
use App\Http\Controllers\API\TransparenciaController;
use App\Http\Controllers\API\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::post('/acesso', [AuthController::class, 'login'])->name('login.api');
Route::post('/cadastro', [AuthController::class, 'register'])->name('register.api');

// Módulo Gestão
Route::middleware('auth:api')->group(function () {
    Route::post('/sair', [AuthController::class, 'logout'])->name('logout.api');

    Route::apiResources([
        'doencas' => DoencaController::class,
        'pacientes' => PacienteController::class,
        'pesquisadores' => PesquisadorController::class,
    ]);

    Route::post('pacientes/{id}/doenca', [PacienteController::class, 'associar_doenca']);
    Route::post('pacientes/{id}/desassociar_doenca', [PacienteController::class, 'desassociar_doenca']);

    Route::post('localidade/uf', [LocalidadeController::class, 'store_uf']);
    Route::put('localidade/uf/{id}', [LocalidadeController::class, 'update_uf']);
    Route::post('localidade/municipio', [LocalidadeController::class, 'store_municipio']);
    Route::put('localidade/municipio/{id}', [LocalidadeController::class, 'update_municipio']);
});

// Módulo Transparencia
Route::get('localidade/{id?}', [LocalidadeController::class, 'index']);
Route::get('listar', [TransparenciaController::class, 'listar']);
Route::get('filtro', [TransparenciaController::class, 'filtro']);
