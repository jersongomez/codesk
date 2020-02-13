<?php

namespace App\Modules\Usuarios\Database\Seeds;

use Illuminate\Database\Seeder;

use App\Modules\Usuarios\Models\Usuario;

use Illuminate\Support\Facades\Hash;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Usuario = new Usuario;
	        $Usuario->name = 'admin';
	        $Usuario->email = 'admin@admin.com';
	        $Usuario->password = Hash::make('123456789');
        $Usuario->save();
    }
}
