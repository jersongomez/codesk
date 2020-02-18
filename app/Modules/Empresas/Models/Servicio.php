<?php

namespace App\Modules\Empresas\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'servicios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'empresa_id', 'nombre', 'descripcion', 'activo'
    ];

    /**
	 *  Obtengo la empresa a la cual pertenece el servicio
	 */
	public function empresa()
	{
	    return $this->belongsTo('App\Modules\Empresas\Models\Empresa', 'empresa_id', 'id');
	}
}
