<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login',[ApiController::class,'login']);
Route::post('/register', [ApiController::class, 'register']);



//auth routes
Route::post('/auth/register', [AuthController::class,'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);


Route::middleware(['auth:sanctum'])->group(function(){
    Route::get('/auth/logout', [AuthController::class, 'logout']);
});