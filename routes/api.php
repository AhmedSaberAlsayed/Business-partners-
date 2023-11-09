<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\parteners\headerController;
use App\Http\Controllers\parteners\partnersController;
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

Route::post('login',[AuthController::class, 'login']);
Route::middleware('auth:api')->group( function (){
    // Auth routes
    // Route::post('register',[AuthController::class, 'register']);
    // Hedear routes
    Route::post('create',[headerController::class, 'create']);
    Route::post('update',[headerController::class, 'update']);
    Route::delete('delete/{id}',[headerController::class, 'delete']);
    Route::get('index',[headerController::class,'index']);
    //  route parteners
    Route::post('create/partener',[partnersController::class, 'create']);
    Route::post('update/partener',[partnersController::class, 'update']);
    Route::delete('delete/{id}',[partnersController::class, 'delete']);
    Route::get('index',[partnersController::class,'index']);

});

