<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\PropietarioController;
use App\Http\Controllers\Api\MascotaController;
use App\Http\Controllers\Api\FotoMascotaController;
use App\Http\Controllers\Api\AcogidaController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(FotoMascotaController::class)->group(function () {
        Route::post('/foto/{mascota}/create', 'crear');
        Route::get('/foto/delete/{fotomascota}', 'borrar');
    });

    Route::resource('mascotas', MascotaController::class);
    Route::resource('propietarios', PropietarioController::class);
});

Route::post('/login', [LoginController::class, 'login']);

