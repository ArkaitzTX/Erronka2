<?php

namespace App\Http\Controllers;
use App\Models\Partidas;

use Illuminate\Http\Request;

class PartidasController extends Controller
{
    //VER
    public function index()
    {
        // IDIOMA **********************************
        $this->cambioIdioma();
        // IDIOMA **********************************

        if(isset(session()->get('usuario')->id)){
            $partidas = Partidas::where('usuario','=',session()->get('usuario')->id)->get()[0];
            return view('Comercio.index', compact('partidas'));
        }
        return view('Comercio.index');

    }
    //VER ID
    public function ver($candado)
    {
        // IDIOMA **********************************
        $this->cambioIdioma();
        // IDIOMA **********************************

        if(null === session()->get('usuario')){
            return view('Comercio.log-reg');
        }

        $candado = 'juego'.$candado;
        $partidas = Partidas::where('usuario','=',session()->get('usuario')->id)->get()[0];
        $usuario = Partidas::where('usuario','=',session()->get('usuario')->id)->get()[0]->id;
        return view('Comercio.juegos', compact('partidas', 'candado', 'usuario'));
    }

    function cambioIdioma(){
        if(session()->has('idioma')){
            app()->setLocale(session()->get('idioma'));
        }
    }






    //CREAR
    // public function store(Request $request)
    // {
    //     $partidas = new Partidas($request->all());
    //     $partidas->save();
    //     return redirect()->action([PartidasController::class, 'index']);
    // }

    //Editar
    // public function update(Request $request, $id)
    // {
    //     $partidas = Partidas::findOrFail($id);
    //     $partidas->juego1 = $request->juego1;
    //     $partidas->juego2 = $request->juego2;
    //     // $partidas->usuario = $request->usuario;
    //     $partidas->save();

    //     return redirect()->action([PartidasController::class, 'index']);
    // }

    // public function update()
    // {
    //     if($_SERVER['REQUEST_METHOD'] == 'POST')
    //     {
    //         $data = json_decode(file_get_contents('php://input')); 

    //         $partidas = Partidas::findOrFail($data->id);
    //         if ($data->juego == "juego1") {
    //             $partidas->juego1 = 1;
    //         }
    //         if ($data->juego == "juego2") {
    //             $partidas->juego2 = 1;
    //         }
    //         $partidas->save();
    //     }

    //     return redirect()->action([PartidasController::class, 'index']);
    // }
}
