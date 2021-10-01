<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::pattern('number', '[0-9]');

Route::post('/cliente', 'App\Http\Controllers\Client\ClientController@store');

Route::get('/cliente/{id}', 'App\Http\Controllers\Client\ClientController@show');

Route::delete('/cliente/{id}', 'App\Http\Controllers\Client\ClientController@delete');

Route::put('/cliente/{id}', 'App\Http\Controllers\Client\ClientController@update');

Route::get('/consulta/final-placa/{number}', 'App\Http\Controllers\Client\ClientController@license');
