<?php

namespace App\Modules\Usuarios\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Modules\Usuarios\Models\Usuario;

use App\Modules\Usuarios\Http\Requests\RegisterUsuarioRequest;

use JWTAuth;

use Tymon\JWTAuth\Exceptions\JWTException;


class UsuarioController extends Controller
{
    public $loginAfterSignUp = true;
 
    public function register(RegisterUsuarioRequest $request)
    {
        $Usuario = new Usuario();
            $Usuario->primer_nombre = $request->primer_nombre;
            $Usuario->segundo_nombre = $request->segundo_nombre;
            $Usuario->primer_apellido = $request->primer_apellido;
            $Usuario->segundo_apellido = $request->segundo_apellido;
            $Usuario->email = $request->email;
            $Usuario->password = bcrypt($request->password);
        $Usuario->save();
 
        if ($this->loginAfterSignUp) {
            return $this->login($request);
        }
 
        return response()->json([
            'success' => true,
            'data' => $Usuario
        ], 200);
    }
 
    public function login(Request $request)
    {
        $input = $request->only('email', 'password');
        $jwt_token = null;
 
        if (!$jwt_token = JWTAuth::attempt($input)) {
            return response()->json([
                'success' => false,
                'message' => 'Correo Invalido o Contraseña',
            ], 401);
        }
 
        return response()->json([
            'success' => true,
            'token' => $jwt_token,
        ]);
    }
 
    public function logout(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);
 
        try {
            JWTAuth::invalidate($request->token);
 
            return response()->json([
                'success' => true,
                'message' => 'Usuario ha cerrado sesión correctamente'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Lo siento, el usuario no ha podido cerrar sesión the Usuario cannot be logged out'
            ], 500);
        }
    }
 
    public function getAuthUsuario(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);
 
        $Usuario = JWTAuth::authenticate($request->token);
 
        return response()->json(['Usuario' => $Usuario]);
    }
}