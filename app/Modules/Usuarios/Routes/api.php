<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your module. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//Rutas que no requiern proteccion
Route::group(['prefix' => 'usuarios'], function() {
    Route::post('login', 'UsuarioController@login');
    Route::post('register', 'UsuarioController@register');
});


//Rutas que requieren proteccion
Route::group(['prefix' => 'usuarios', 'middleware' => ['auth.jwt']], function() {
    Route::get('logout', 'UsuarioController@logout');
 
    Route::get('user', 'UsuarioController@getAuthUsuario');
});
