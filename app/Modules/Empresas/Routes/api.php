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
    
	//Se muestran todas las empresas
    Route::post('/', 'EmpresaController@index');

    //Se muestran todas las empresas asociadas al empleado logueado
    Route::post('/usuario/{id}', 'EmpresaController@EmpresasDeUsuario')
    	->where(['id' => '[0-9]+']);
    
    //Se guardan las empresas
    Route::post('/guardar', 'EmpresaController@guardar');

    //Se muestra una empresa en especifico
    Route::post('/ver/{id}', 'EmpresaController@ver')->where(['id' => '[0-9]+']);

    //Se actualiza una empresa
    Route::post('/update/{id}', 'EmpresaController@update')
    	->where(['id' => '[0-9]+']);

    //se elimina una empres
    Route::post('/eliminar/{id}', 'EmpresaController@eliminar')
    	->where(['id' => '[0-9]+']);
});

