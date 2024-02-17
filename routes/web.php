<?php

use App\Http\Controllers\config\PermisosController;
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



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/prueba', function () {
    return view('Pruebas.pruebas');
});

//rutas de configuraciones
Route::middleware(['auth'])->group(function () {
    Route::resource('/permisos', PermisosController::class)->names('permisos');
});




