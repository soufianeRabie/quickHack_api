<?php

use App\Models\LigneBudgetaire;
use Illuminate\Support\Facades\Http;
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

Route::get('/', function () {

    $response = Http::withToken(config('services.openai.secret'))
        ->withoutVerifying() // Disable SSL verification
        ->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'tts-1', // Make sure to use a correct model
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You are a helpful assistant.'
                ],
                [
                    'role' => 'user',
                    'content' => 'Write a haiku that explains the concept of recursion.'
                ]
            ]
        ]);



// To view the response
    dd($response->json());
//    return view('welcome');
});
