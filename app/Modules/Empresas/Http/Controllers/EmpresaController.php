<?php

namespace App\Modules\Empresas\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Modules\Empresas\Models\Empresa;

use App\Modules\Empresas\Http\Requests\EmpresaRequest;

use JWTAuth;

class EmpresaController extends Controller
{
    protected $Usuario;
 
    public function __construct()
    {
        $this->Usuario = JWTAuth::parseToken()->authenticate();        
    }

    /**
     * Consulto todas las empresas
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Empresas = Empresa::all();

        if($Empresas)
        {
            return response()->json([
                'success' => true,
                'data' => $Empresas
            ], 200);
        }
        else
        {
            return response()->json([
                'success' => false,
                'message' => 'Lo siento, no se han encontrado empresas'
            ], 500);
        }
    }

    /**
     * Consulto las empresas la cual tiene asociado un usuario
     * @param  int  $Usuario_id
     * @return \Illuminate\Http\Response
     */
    public function EmpresasDeUsuario($Usuario_id)
    {
        $Empresas = Empresa::where('usuario_id',  $Usuario_id)->get();

        if($Empresas)
        {
            return response()->json([
                'success' => true,
                'data' => $Empresas
            ], 200);
        }
        else
        {
            return response()->json([
                'success' => false,
                'message' => 'Lo siento, no se han encontrado empresas'
            ], 500);
        }
    }

    /**
     * Guardado de las empresas
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(EmpresaRequest $request)
    {
         $Empresa = new Empresa;
            $Empresa->usuario_id = $this->Usuario->id; //Si se almacena, se guarda con el id del usuario que se encuentre logueado
            $Empresa->nombre = $request->nombre;
            $Empresa->descripcion = $request->descripcion;
            $Empresa->sede = $request->sede;
            $Empresa->activa = $request->activa;
        
        if($Empresa->save())
        {
            return response()->json([
                'success' => true,
                'data' => $Empresa
            ], 200);
        }
        else
        {
            return response()->json([
                'success' => false,
                'message' => 'Lo siento, no se ha podido guardar la empresa'
            ], 500);
        }  
    }

    /**
     * Muestra una empresa en especifico
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ver($id)
    {
        $Empresa = Empresa::where('id',  $id)->get();

        if($Empresa)
        {
            return response()->json([
                'success' => true,
                'data' => $Empresa
            ], 200);
        }
        else
        {
            return response()->json([
                'success' => false,
                'message' => 'Lo siento, no se han encontrado la empresa'
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
    public function update(EmpresaRequest $request, $id)
    {
        $Empresa = Empresa::find($id);
            $Empresa->usuario_id = $this->Usuario->id;
            $Empresa->nombre = $request->nombre;
            $Empresa->descripcion = $request->descripcion;
            $Empresa->sede = $request->sede;
            $Empresa->activa = $request->activa;
        
        if($Empresa->save())
        {
            return response()->json([
                'success' => true,
                'data' => $Empresa
            ], 200);
        }
        else
        {
            return response()->json([
                'success' => false,
                'message' => 'Lo siento, no se ha podido actualiza la empresa'
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
        $Empresa = Empresa::destroy($id);

        if($Empresa)
        {
            return response()->json([
                'success' => true,
                'data' => $Empresa
            ], 200);
        }
        else
        {
            return response()->json([
                'success' => false,
                'message' => 'Lo siento, no se ha podido eliminar la empresa'
            ], 500);
        }
        
    }
}
