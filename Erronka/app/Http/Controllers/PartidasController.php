<?php

namespace App\Http\Controllers;
use App\Models\Partidas;

use Illuminate\Http\Request;

class PartidasController extends Controller
{
    //VER
    public function index()
    {
        $partidas = Partidas::all();
        return view('Comercio.juegos', compact('partidas'));
    }
    //VER ID
    public function ver($candado)
    {
        if(null === session()->get('usuario')){
            return view('Comercio.log-reg');
        }

        $candado = 'juego'.$candado;
        $partidas = Partidas::where('usuario','=',session()->get('usuario')->id)->get()[0];
        return view('Comercio.juegos', compact('partidas', 'candado'));
    }
    //CREAR
    // public function store(Request $request)
    // {
    //     $partidas = new Partidas($request->all());
    //     $partidas->save();
    //     return redirect()->action([PartidasController::class, 'index']);
    // }

    //Editar
    public function update(Request $request, $id)
    {
        $partidas = Partidas::findOrFail($id);
        $partidas->juego1 = $request->juego1;
        $partidas->juego2 = $request->juego2;
        $partidas->usuario = $request->usuario;
        $partidas->save();

        return redirect()->action([PartidasController::class, 'index']);
    }
}
