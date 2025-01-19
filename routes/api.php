<?php

use App\Http\Controllers\DepMarcheController;
use App\Http\Controllers\LigneBudgetaireController;
use App\Http\Controllers\LigneBudgetairePlafondController;
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

    Route::post('/lignes-budgetaires/{id}/plafonds', [LigneBudgetairePlafondController::class, 'store']);
    Route::put('/ligne-budgetaires/{id}/plafonds', [LigneBudgetairePlafondController::class, 'update']);
    Route::get('/ligne-budgetaires/{id}/plafonds', [LigneBudgetairePlafondController::class, 'index']);
//    Route::get('/ligne-budgetaires', [LigneBudgetaireController::class, 'index']);
//    Route::get('/ligne-budgetaires/{id}', [LigneBudgetaireController::class, 'show']);

//    Route::get('/ligne-budgetaire', [LigneBudgetaireController::class, 'index']);
//    Route::get('/ligne-budgetaire/{id}', [LigneBudgetaireController::class, 'show']);
    Route::post ('/ligne-budgetaire', [LigneBudgetaireController::class,'store'] );
    Route::put ('/ligne-budgetaire/{id}', [LigneBudgetaireController::class,'update'] );
    Route::delete ('/ligne-budgetaire/{id}', [LigneBudgetaireController::class,'destroy'] );



// Routes for DepMarche
    Route::get('/dep-marches', [DepMarcheController::class, 'index']);
    Route::post('/dep-marches', [DepMarcheController::class, 'store']);
    Route::get('/dep-marches/{id}', [DepMarcheController::class, 'show']);
    Route::post('/dep-marches/filter', [DepMarcheController::class, 'filter']);


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
