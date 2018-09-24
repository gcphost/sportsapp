<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->group(function () {
    Route::get('/teams', 'TeamController@index');
    Route::post('/team', 'TeamController@store');
    Route::get('/team/{team}', 'TeamController@get');

    Route::get('/player/{player}', 'PlayerController@index');
    Route::put('/player/{player}', 'PlayerController@update');
    Route::post('/player', 'PlayerController@store');
});
