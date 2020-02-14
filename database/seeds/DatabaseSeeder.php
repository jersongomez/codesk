<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(App\Modules\Usuarios\Database\Seeds\UsuariosTableSeeder::class);
    	$this->call(App\Modules\Empresas\Database\Seeds\EmpresasTableSeeder::class);
    }
}
