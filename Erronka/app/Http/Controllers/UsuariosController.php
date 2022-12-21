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
        // $miUsu = Usuarios::where('usuario','=',session()->get('usuario'))->get();
        $miUsu = Usuarios::where('id','=',1)->get();
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

        $usuarios = Usuarios::where('usuario','=',$request->usuario)->get();
        foreach($usuarios as $usu){
            if($request->usuario != $usu->usuario && $request->pass != $usu->pass){
                return view('Comercio.log-reg', 'El usuario es incorrecto');
            }   
        }

        session(['usuario' => $usu]);
        return view('Comercio.index');
    }

     //CERRAR SESION
     public function cerrarSes(){

        session()->forget('usuario');
        return view('Comercio.index');
    }
    
    
    //UPDATE
    public function update(Request $request, $id)
    {
        $usu = Usuarios::findOrFail($id);
        $usu->nombre = $request->nombre;
        $usu->apellido = $request->apellido;
        $usu->usuario = $request->usuario;
        $usu->rol = $request->rol;

        if ($request->hasFile("img")){
            unlink(public_path('img/profile/'.$usu->foto));
            $img = $request->file("img");
            $nomImg = Str::slug($request->usuario).".".$img->guessExtension();
            $ruta = public_path("img/profile/");

            copy($img->getRealPath(),$ruta.$nomImg);

            $usu->foto = $nomImg;
            $usu->type = $img->guessExtension();
        } elseif ($request->usuario == $usu->usuario) {
            
            $img = public_path('img/profile/'.$usu->foto);
            
            $nomImg = Str::slug($request->usuario).".".$usu->type;
            $ruta = public_path("img/profile/");

            copy($img,$ruta.$nomImg);
            unlink(public_path('img/profile/'.$usu->foto));
            $usu->foto = $nomImg;
        };

        $usu->save();
        return redirect()->action([UsuariosController::class, 'index']);
    }

    //BORRAR
    public function destroy(Request $request)
    {
        $usu = Usuarios::findOrFail($request->usuario);
        unlink(public_path('img/profile/'.$usu->foto));
        $usu->delete();
        return redirect()->route('Comercio.index')->with('success', 'Erabiltzailea ezabatu da.');
    }
}
