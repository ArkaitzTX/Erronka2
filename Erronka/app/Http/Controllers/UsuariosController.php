<?php

namespace App\Http\Controllers;
use App\Models\Usuarios;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Partidas;
<<<<<<< HEAD
=======
// use App;
>>>>>>> origin/development

class UsuariosController extends Controller
{
    //VER
    public function index()
    {
<<<<<<< HEAD
        $miUsu = session()->get('usuario');
        $usu = Usuarios::all();
        return view('Comercio.admin', compact('usu', 'miUsu'));
=======
        // IDIOMA **********************************
        $this->cambioIdioma();
        // IDIOMA **********************************

        $miUsu = session()->get('usuario');
        $usu = Usuarios::all();
        $par = Partidas::all();

        return view('Comercio.admin', compact('usu', 'miUsu', 'par'));
>>>>>>> origin/development
    }
    //VER ID
    // public function ver($id)
    // {
    //     $usu = Usuarios::findOrFail($id);
    //     return view('Comercio.x', ['usu' => $usu]);
    // }
    //VER CREAR
    public function create()
    {
        // IDIOMA **********************************
        $this->cambioIdioma();
        // IDIOMA **********************************

        return view('Comercio.log-reg');
    }

    //CREAR
    public function store(Request $request)
    {
<<<<<<< HEAD
=======
        // IDIOMA **********************************
        $this->cambioIdioma();
        // IDIOMA **********************************

>>>>>>> origin/development
        if(Usuarios::where('usuario', $request->usuario)->exists()){
            return redirect()->action([UsuariosController::class, 'create'])->with('error', 'Erabiltzailea existitzen da.');
        }
        
        $request->validate([
            'nombre' => 'required|between:3,50',
            'apellido' => 'required|between:3,50',
            'usuario' => 'required|between:6,50', // unique:posts|
            'pass' => 'required|between:8,50',
            'passB' => 'required|between:8,50',
        ]);

        $usu = new Usuarios();

        if ($request->pass == $request->passB) {

            $usu->nombre = $request->nombre;
            $usu->apellido = $request->apellido;
            $usu->usuario = $request->usuario;
            $usu->pass = $request->pass;
            $usu->rol = 0;
            $usu->foto = "default.png";
            $usu->type = "png";
            $usu->save();
    
            $partidas = new Partidas();
            $partidas->juego1 = 0;
            $partidas->juego2 = 0;
            $partidas->usuario = Usuarios::where('usuario','=', $request->usuario)->get()[0]->id;
            $partidas->save();
            
            return redirect()->action([UsuariosController::class, 'create'])->with('bien', 'Erabiltzailea sortu egin da.');
        } else {
            return redirect()->action([UsuariosController::class, 'create'])->with('error', 'Pasahitza ez da berdina.');
        }
    }
    //LOGIN
    public function logSes(Request $request){

        // IDIOMA **********************************
        $this->cambioIdioma();
        // IDIOMA **********************************

        
        
        // $usuarios = Usuarios::all();
        $usuarios = Usuarios::where('usuario','=',$request->usuario)->get();
        
        foreach($usuarios as $usu){
            if($request->pass == $usu->pass){
                session(['usuario' => $usu]);

<<<<<<< HEAD
                // Route::post('/juegos',  [PartidasController::class, 'store'])->name('Comercio.parCrear');
                return view('Comercio.index');
=======
                return redirect()->action([PartidasController::class, 'index']);
>>>>>>> origin/development
            }   
        }

        $error = 'El usuario: ' . $request->usuario . ', es incorrecto o la contraseña no coincide';
        return view('Comercio.log-reg', compact('error'));
    }

     //CERRAR SESION
     public function cerrarSes(){

        // IDIOMA **********************************
        $this->cambioIdioma();
        // IDIOMA **********************************

        session()->forget('usuario');
        return view('Comercio.index');
    }
    
    // MEJORAR ROL
    public function rol(Request $request, $id)
    {
<<<<<<< HEAD
=======

        // IDIOMA **********************************
        $this->cambioIdioma();
        // IDIOMA **********************************
>>>>>>> origin/development
        $codigoAdmin = 'ADMIN123';

        if ($request->rol == $codigoAdmin) {
            $usu = Usuarios::findOrFail($id);
            $usu->rol = 1;
            $usu->save();

            session(['usuario' => $usu]);
        }

        return redirect()->action([UsuariosController::class, 'index']);
    }
    
    //UPDATE
    public function update(Request $request, $id)
    {
<<<<<<< HEAD
=======

        // IDIOMA **********************************
        $this->cambioIdioma();
        // IDIOMA **********************************

>>>>>>> origin/development
        $request->validate([
            'nombre' => 'required|max:50',
            'apellido' => 'required|max:50',
            'usuario' => 'required|max:50', // unique:posts|
            'pass' => 'required|max:50',
        ]);
        
        $usu = Usuarios::findOrFail($id);
        $usu->nombre = $request->nombre;
        $usu->apellido = $request->apellido;
        $usu->usuario = $request->usuario;

        if ($request->hasFile("img")){
            if($usu->foto != 'default.png') unlink(public_path('img/profile/'.$usu->foto));
            $img = $request->file("img");
            
            $nomImg = Str::slug($request->usuario).".".$img->guessExtension();
            $ruta = public_path("img/profile/");

            copy($img->getRealPath(),$ruta.$nomImg);

            $usu->foto = $nomImg;
            $usu->type = $img->guessExtension();
        } 

        $usu->save();

        session(['usuario' => $usu]);
        return redirect()->action([UsuariosController::class, 'index']);
    }

    //BORRAR
    public function destroy(Request $request)
    {
<<<<<<< HEAD
=======
        // IDIOMA **********************************
        $this->cambioIdioma();
        // IDIOMA **********************************

>>>>>>> origin/development
        $usu = Usuarios::findOrFail($request->usuario);
        $part = Partidas::where('usuario',$request->usuario)->get()[0];

        if($usu->foto != 'default.png') unlink(public_path('img/profile/'.$usu->foto));
        $part->delete();
        $usu->delete();
        
        return redirect()->route('Comercio.admin')->with('mensaje', 'Erabiltzailea ezabatu da.');
<<<<<<< HEAD
=======
    }

    public function idioma(){
        if(session()->get('idioma') == "es"){
            session(['idioma' => "eu"]);
        }
        else{
            session(['idioma' => "es"]);
        }
        return redirect()->route('Comercio.admin');
    }

    function cambioIdioma(){
        if(session()->has('idioma')){
            app()->setLocale(session()->get('idioma'));
        }
>>>>>>> origin/development
    }
}
