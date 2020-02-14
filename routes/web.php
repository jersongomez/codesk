<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/{any}', function () {
    return response()->json([
        'success' => false,
        'message' => 'Ruta invalida o el token no es valido',
    ], 401);
})->where('any', '.*');
