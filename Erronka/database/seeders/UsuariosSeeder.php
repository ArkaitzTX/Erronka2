<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuarios;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = new Usuarios();
        $usuario->nombre = 'Admin';
        $usuario->apellido = 'Admin';
        $usuario->usuario = 'admin';
        $usuario->pass = 'admin';
        $usuario->foto = 'default.png';
        $usuario->type = 'png';
        $usuario->rol = 1;
        // $usuario->grupo = 0;
        // $usuario->grupoV = 0;
        $usuario->save();


        $usuario1 = new Usuarios();
        $usuario1->nombre = 'Rick';
        $usuario1->apellido = 'Fritz';
        $usuario1->usuario = 'Rick Fritz';
        $usuario1->pass = 'Inf041';
        $usuario1->foto = 'default.png';
        $usuario1->type = 'png';
        $usuario1->rol = 0;
        // $usuario1->grupo = 0;
        // $usuario1->grupoV = 0;
        $usuario1->save();
    }
}
