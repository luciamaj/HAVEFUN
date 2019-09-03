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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Mostra fumetti
Route::get('comics', 'ComicsAPIController@index');

// Mostra un singolo fumetto
Route::get('comic/{id}', 'ComicsAPIController@show');

// Crea un nuovo fumetto
Route::post('comic', 'ComicsAPIController@store');

// Aggiorna un fumetto
Route::put('comic/{id}', 'ComicsAPIController@update');

// Cancella un fumetto
Route::delete('comic/{id}', 'ComicsAPIController@destroy');


Route::get('action_figures', 'ActionFiguresAPIController@index');

Route::get('action_figure/{id}', 'ActionFiguresAPIController@show');

Route::post('action_figure', 'ActionFiguresAPIController@store');

Route::put('action_figure/{id}', 'ActionFiguresAPIController@update');

Route::delete('action_figure/{id}', 'ActionFiguresAPIController@destroy');


// Mostra tutti gli utenti
Route::get('users', 'UsersAPIController@index');

// Mostra un utente
Route::get('user/{id}', 'UsersAPIController@show');

// Crea nuovo utente
Route::post('user', 'UsersAPIController@store');

// Aggiorna utente
Route::put('user', 'UsersAPIController@store');

// Cancella utente
Route::delete('user/{id}', 'UsersAPIController@destroy');


// Per login su iOS con oauth
Route::post('login', 'LoginAPIController@store');

// Per register su iOS
// Route::post('register', 'LoginAPIController@register');
