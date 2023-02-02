<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\PartidasController;



Route::group(['middleware' => 'idiomas'], function(){

//Index con #
Route::get('/#juegos', function () {
    return view('Comercio.index');
})->name('Comercio.juegos');
Route::get('/#cofre', function () {
    return view('Comercio.index');
})->name('Comercio.cofre');


//Ventana Log-reg
Route::get('/log-reg', [UsuariosController::class, 'create'])->name('Comercio.login');
    //Create
    Route::post('/log-reg',  [UsuariosController::class, 'store'])->name('Comercio.usuNuevo');
    //Login
    Route::post('/',  [UsuariosController::class, 'logSes'])->name('Comercio.logSes');
    //Cerrar Sesion
    Route::get('/cerrarSes',  [UsuariosController::class, 'cerrarSes'])->name('Comercio.cerrarSes');

//Juegos
    //Ventana Index 2
    Route::get('/', [PartidasController::class, 'index'])->name('Comercio.index');
    //VER JUEGO
    Route::get('/{candado}/juegos', [PartidasController::class, 'ver'])->name('Comercio.juego');


// MIDELWARE EVITAR A LOS INVITADOS
Route::group(['middleware' => 'seguridad'], function(){
    //Admin
    Route::get('/admin', [UsuariosController::class, 'index'])->name('Comercio.admin');
        //Eliminar
        Route::delete('/', [UsuariosController::class, 'destroy'])->name('Comercio.usuEliminar');
        //Editar
        Route::put('/admin/{id}', [UsuariosController::class, 'update'])->name('Comercio.usuUpdate');
        //Rol mejora
        Route::post('/admin/{id}', [UsuariosController::class, 'rol'])->name('Comercio.rol');
});
// IDIOMA
Route::get('/idioma', [UsuariosController::class, 'idioma'])->name('Comercio.idioma');

});
