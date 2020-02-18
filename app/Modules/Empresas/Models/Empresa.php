<?php

namespace App\Modules\Empresas\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'empresas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'usuario_id', 'nombre', 'descripcion', 'sede', 'activa'
    ];

    /**
	 *  Obtengo el usuario al cual pertenece la empresa
	 */
	public function usuario()
	{
	    return $this->belongsTo('App\Modules\Usuarios\Models\Usuario', 'usuario_id', 'id');
	}

    /**
     * Obtengo los servicios de la empresa
     */
    public function servicios()
    {
        $this->hasMany('App\Modules\Empresas\Models\Servicio', 'empresa_id', 'id');
    }
}
