<?php


use App\Modules\Empresas\Models\Empresa;

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


//Rutas que requieren proteccion
Route::group(['prefix' => 'empresas', 'middleware' => ['auth.jwt']], function() {
    Route::post('/', 'EmpresaController@index');
    
    Route::post('/store', 'EmpresaController@store');
});

