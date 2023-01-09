<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mvc\PropietarioController;
use App\Http\Controllers\Mvc\MascotaController;
use App\Http\Controllers\Mvc\FotoMascotaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::controller(FotoMascotaController::class)->group(function () {
        Route::post('/foto/{mascota}/create', 'crear')->name("crear.foto");
        Route::get('/foto/delete/{fotomascota}', 'borrar')->name("borrar.foto");
    });

    Route::resource('mascotas', MascotaController::class);
    Route::resource('propietarios', PropietarioController::class);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
