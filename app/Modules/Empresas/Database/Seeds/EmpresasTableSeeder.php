<?php

namespace App\Modules\Empresas\Database\Seeds;

use Illuminate\Database\Seeder;

use App\Modules\Empresas\Models\Empresa;

class EmpresasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<=10; $i++){
        	$Empresa = new Empresa();
	        	$Empresa->usuario_id = '1';
				$Empresa->nombre = 'Empresa '.$i;
				$Empresa->descripcion = 'descripcion '.$i;
				$Empresa->sede = false;
				$Empresa->activa = true;
			$Empresa->save();
        }
    }
}
