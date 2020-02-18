<?php

namespace App\Modules\Empresas\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Modules\Empresas\Models\Servicio;

use App\Modules\Empresas\Http\Requests\ServicioRequest;

use JWTAuth;

class ServicioController extends Controller
{
    protected $Usuario;
 
    public function __construct()
    {
        $this->Usuario = JWTAuth::parseToken()->authenticate();        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Servicios = Servicio::all();

        if($Servicios)
        {
            return response()->json([
                'success' => true,
                'data' => $Servicios
            ], 200);
        }
        else
        {
            return response()->json([
                'success' => false,
                'message' => 'Lo siento, no se han encontrado servicios'
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ServicioRequest $request)
    {
        $Servicio = new Servicio;
            $Servicio->empresa_id   = $request->empresa_id;
            $Servicio->nombre       = $request->nombre;
            $Servicio->descripcion  = $request->descripcion;
            $Servicio->activo       = $request->activo;

        if($Servicio->save())
        {
            return response()->json([
                'success' => true,
                'data' => $Servicio
            ], 200);
        }
        else
        {
            return response()->json([
                'success' => false,
                'message' => 'Lo siento, no se ha podido guardar el servicio'
            ], 500);
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ver($id)
    {
        $Servicios = Servicio::find($id);

        if($Servicios)
        {
            return response()->json([
                'success' => true,
                'data' => $Servicios
            ], 200);
        }
        else
        {
            return response()->json([
                'success' => false,
                'message' => 'Lo siento, no se han encontrado el servicio'
            ], 500);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ServicioRequest $request, $id)
    {
        $Servicio = Servicio::find($id);
            $Servicio->empresa_id   = $request->empresa_id;
            $Servicio->nombre       = $request->nombre;
            $Servicio->descripcion  = $request->descripcion;
            $Servicio->activo       = $request->activo;

        if($Servicio->save())
        {
            return response()->json([
                'success' => true,
                'data' => $Servicio
            ], 200);
        }
        else
        {
            return response()->json([
                'success' => false,
                'message' => 'Lo siento, no se ha podido actualizar el servicio'
            ], 500);
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id)
    {
        $Servicio = Servicio::destroy($id);

        if($Servicio)
        {
            return response()->json([
                'success' => true,
                'data' => $Servicio
            ], 200);
        }
        else
        {
            return response()->json([
                'success' => false,
                'message' => 'Lo siento, no se ha podido eliminar el servicio'
            ], 500);
        }
    }
}
