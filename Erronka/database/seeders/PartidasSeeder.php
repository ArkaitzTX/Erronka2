<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Partidas;

class PartidasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $partida = new Partidas();
        $partida->juego1 = 1;
        $partida->juego2 = 1;
        $partida->usuario = 1;
        $partida->save();
        // $partida->usuarios()->attach(1);  
    }
}
