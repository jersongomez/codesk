<?php

namespace App\Modules\Empresas\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Modules\Empresas\Models\Empresa;

use JWTAuth;

class EmpresaController extends Controller
{
    protected $Usuario;
 
    public function __construct()
    {
        $this->Usuario = JWTAuth::parseToken()->authenticate();        
    }

    /**
     * Consulto las empresas la cual tiene asociado el usuario logueado
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Empresas = Empresa::where('usuario_id',  $this->Usuario->id)->get();

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
