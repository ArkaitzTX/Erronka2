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
        $partida->dificultad = 0;
        $partida->usuario = 1;
        $partida->save();

        $partida = new Partidas();
        $partida->juego1 = 1;
        $partida->juego2 = 1;
        $partida->dificultad = 0;
        $partida->usuario = 2;
        $partida->save();

        $partida = new Partidas();
        $partida->juego1 = 0;
        $partida->juego2 = 0;
        $partida->dificultad = 0;
        $partida->usuario = 3;
        $partida->save();

        $partida = new Partidas();
        $partida->juego1 = 0;
        $partida->juego2 = 0;
        $partida->dificultad = 0;
        $partida->usuario = 4;
        $partida->save();

        $partida = new Partidas();
        $partida->juego1 = 0;
        $partida->juego2 = 0;
        $partida->dificultad = 0;
        $partida->usuario = 5;
        $partida->save();

        $partida = new Partidas();
        $partida->juego1 = 0;
        $partida->juego2 = 0;
        $partida->dificultad = 0;
        $partida->usuario = 6;
        $partida->save();

        $partida = new Partidas();
        $partida->juego1 = 0;
        $partida->juego2 = 0;
        $partida->dificultad = 0;
        $partida->usuario = 7;
        $partida->save();
        // $partida->usuarios()->attach(1);  
    }
}
