<?php

namespace App\Modules\Empresas\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicioRequest extends FormRequest
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
            'empresa_id' => 'required',
            'nombre' => 'required | string | min:2',
            'descripcion' => 'required | string | min:2',
            'activo' => 'required | boolean',
        ];
    }
}
