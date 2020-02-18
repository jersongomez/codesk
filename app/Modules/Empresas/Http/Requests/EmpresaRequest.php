<?php

namespace App\Modules\Empresas\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaRequest extends FormRequest
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
            //'usuario_id' => 'required | integer',
            'nombre' => 'required | string | min:2 | max:100',
            'descripcion' => 'required | string | min:2',
            'sede' => 'required | boolean',
            'activa' => 'required | boolean',
        ];
    }
}
