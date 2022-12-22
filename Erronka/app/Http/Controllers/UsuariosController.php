<?php

namespace App\Http\Controllers;
use App\Models\Usuarios;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    //VER
    public function index()
    {
        $miUsu = session()->get('usuario');
        $usu = Usuarios::all();
        return view('Comercio.admin', compact('usu', 'miUsu'));
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
        return view('Comercio.log-reg');
    }

    //CREAR
    public function store(Request $request)
    {
        // $request->validate([
        //     'modelo' => 'required|max:40',
        //     'nacionalidad' => 'required|max:40',
        //     'anyo' => 'required|integer',
        // ]);

        $usu = new Usuarios();
        $usu->nombre = $request->nombre;
        $usu->apellido = $request->apellido;
        $usu->usuario = $request->usuario;
        $usu->pass = $request->pass;
        $usu->rol = 0;
        $usu->foto = "default.png";
        $usu->type = "png";


        // if ($request->hasFile("img")){
        //     $img = $request->file("img");
        //     $nomImg = Str::slug($request->usuario).".".$img->guessExtension();
        //     $ruta = public_path("img/profile/");

        //     copy($img->getRealPath(),$ruta.$nomImg);

        //     $usu->foto = $nomImg;
        //     $usu->type = $img->guessExtension();
        // }
        $usu->save();
        return redirect()->action([UsuariosController::class, 'create']);
    }
    //LOGIN
    public function logSes(Request $request){

        // $usuarios = Usuarios::all();

        // foreach($usuarios as $usu){
        //     if($request->usuario != $usu->usuario && $request->pass != $usu->pass){
        //         return view('Comercio.log-reg', 'El usuario es incorrecto');
        //     }   
        // }

        
        
        // $usuarios = Usuarios::all();
        $usuarios = Usuarios::where('usuario','=',$request->usuario)->get();
        
        foreach($usuarios as $usu){
            if($request->usuario == $usu->usuario && $request->pass == $usu->pass){
                session(['usuario' => $usu]);
                return view('Comercio.index');
            }   
        }

        $error = 'El usuario: ' . $request->usuario . ', es incorrecto o la contraseña no coincide';
        return view('Comercio.log-reg', compact('error'));
    }

     //CERRAR SESION
     public function cerrarSes(){

        session()->forget('usuario');
        return view('Comercio.index');
    }
    
    // MEJORAR ROL
    public function rol(Request $request, $id)
    {
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
        $usu = Usuarios::findOrFail($id);
        $usu->nombre = $request->nombre;
        $usu->apellido = $request->apellido;
        $usu->usuario = $request->usuario;

        if ($request->hasFile("img")){
            unlink(public_path('img/profile/'.$usu->foto));
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
        $usu = Usuarios::findOrFail($request->usuario);
        if($usu->foto != 'default.png') unlink(public_path('img/profile/'.$usu->foto));
        $usu->delete();
        return redirect()->route('Comercio.admin')->with('mensaje', 'Erabiltzailea ezabatu da.');
    }
}
