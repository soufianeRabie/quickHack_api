<?php

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

Route::middleware('auth:sanctum')->group( function () {
  Route::get('/me' , [\App\Http\Controllers\UserController::class , 'init']);
    Route::get('initialize' , [\App\Http\Controllers\InitializeController::class , 'init']);
    Route::resources([
        'users'=>\App\Http\Controllers\UserController::class,
        'table1s'=>\App\Http\Controllers\Table1Controller::class,
        'medicaments'=>\App\Http\Controllers\MedicamentController::class
    ]);
});

Route::post('/login' , [\App\Http\Controllers\AuthController::class , 'login']);
