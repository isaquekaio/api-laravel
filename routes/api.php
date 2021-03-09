<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\API\DoencaController;
use App\Http\Controllers\API\PacienteController;
use App\Http\Controllers\API\PesquisadorController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/acesso', [AuthController::class, 'login'])->name('login.api');
Route::post('/cadastro', [AuthController::class, 'register'])->name('register.api');

Route::middleware('auth:api')->group(function () {
    Route::post('/sair', [AuthController::class, 'logout'])->name('logout.api');
});


// Módulo Gestão

Route::apiResources([
    'doencas' => DoencaController::class,
    'pacientes' => PacienteController::class,
    'pesquisadores' => PesquisadorController::class,
]);



//->except(['destroy']);