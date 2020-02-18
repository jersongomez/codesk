<?php

namespace App\Modules\Empresas\Database\Seeds;

use Illuminate\Database\Seeder;

use App\Modules\Empresas\Models\Servicio;

class ServiciosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<=10; $i++){
        	$Servicio = new Servicio();
	        	$Servicio->empresa_id = '1';
				$Servicio->nombre = 'Servicio '.$i;
				$Servicio->descripcion = 'descripcion '.$i;
				$Servicio->activo = true;
			$Servicio->save();
        }
    }
}
