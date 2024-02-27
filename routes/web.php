<?php

use App\Http\Controllers\config\PermisosController;
use App\Http\Controllers\payments\StripePaymentController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\config\SkinsController;
use Illuminate\Support\Facades\Auth;
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
// rutas para clientes y usuarios
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/shop',[ShopController::class,'index'])->name('shop');

Route::get('/prueba', function () {
    return view('Pruebas.pruebas');
});

//rutas de configuraciones
Route::middleware(['auth'])->group(function () {
    Route::resource('/permisos', PermisosController::class)->names('permisos');
    Route::resource('/skins', SkinsController::class)->names('skins');
});

//rutas de pagos
Route::middleware(['auth'])->group(function () {
    Route::get('/payment',[StripePaymentController::class,'index'])->name('payment');
    Route::post('/payment',[StripePaymentController::class,'makePayment'])->name('makePayment');
});




