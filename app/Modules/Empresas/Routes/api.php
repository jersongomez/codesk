<?php

//use App\Modules\Empresas\Models\Servicio;

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
    Route::post('/ver/{id}', 'EmpresaController@ver')
    	->where(['id' => '[0-9]+']);

    //Se actualiza una empresa
    Route::post('/actualizar/{id}', 'EmpresaController@actualizar')
    	->where(['id' => '[0-9]+']);

    //se elimina una empres
    Route::post('/eliminar/{id}', 'EmpresaController@eliminar')
    	->where(['id' => '[0-9]+']);
});


//Rutas que requieren proteccion
Route::group(['prefix' => 'empresas/servicios', 'middleware' => ['auth.jwt']], function() {
    
	//Se muestran todos los servicios de todas las empresas
    Route::post('/', 'ServicioController@index');

    //Se guard
    Route::post('/guardar','ServicioController@guardar');

    //Se muestra una empresa en especifico
    Route::post('/ver/{id}', 'ServicioController@ver')
    	->where(['id' => '[0-9]+']);

    //Se actualiza una empresa
    Route::post('/actualizar/{id}', 'ServicioController@actualizar')
    	->where(['id' => '[0-9]+']);

    //se elimina una empres
    Route::post('/eliminar/{id}', 'ServicioController@eliminar')
    	->where(['id' => '[0-9]+']);
});

