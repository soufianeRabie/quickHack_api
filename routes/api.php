<?php

use App\Http\Controllers\DepMarcheController;
use App\Http\Controllers\LigneBudgetaireController;
use App\Http\Controllers\PharmacyController;
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
    Route::get('/ligne-budgetaire', [LigneBudgetaireController::class, 'index']);
    Route::get('/ligne-budgetaire/{id}', [LigneBudgetaireController::class, 'show']);

// Routes for DepMarche
    Route::get('/dep-marche', [DepMarcheController::class, 'index']);
    Route::get('/dep-marche/{id}', [DepMarcheController::class, 'show']);
    Route::post('/dep-marche/filter', [DepMarcheController::class, 'filter']);


  Route::get('/me' , [\App\Http\Controllers\UserController::class , 'init']);
    Route::get('initialize' , [\App\Http\Controllers\InitializeController::class , 'init']);
    Route::put('/event/valid/{event}' , [\App\Http\Controllers\EventController::class , 'validat']);
    Route::resources([
        'users'=>\App\Http\Controllers\UserController::class,
        'pharmacies'=>\App\Http\Controllers\PharmacyController::class,
        'medicaments'=>\App\Http\Controllers\MedicamentController::class,
        'events'=>\App\Http\Controllers\EventController::class
    ]);
});

Route::post('/login' , [\App\Http\Controllers\AuthController::class , 'login']);
