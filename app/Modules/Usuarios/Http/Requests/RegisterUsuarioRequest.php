<?php

namespace App\Modules\Usuarios\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'primer_nombre' => 'required|string',
            'segundo_nombre' => 'string',
            'primer_apellido' => 'required|string',
            'segundo_apellido' => 'required|string',
            'email' => 'required|email|unique:usuarios',
            'password' => 'required|string|min:6|max:10'
        ];
    }
}
