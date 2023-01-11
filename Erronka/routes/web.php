<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\PartidasController;

//Ventana Index
Route::get('/', function () {
    return view('Comercio.index');
})->name('Comercio.index');
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
    //Cerrar Secion
    Route::get('/cerrarSes',  [UsuariosController::class, 'cerrarSes'])->name('Comercio.cerrarSes');

//Juegos
Route::get('/{candado}/juegos', [PartidasController::class, 'ver'])->name('Comercio.juego');
    //Editar
    Route::put('{id}/juegos', [PartidasController::class, 'update'])->name('Comercio.parUptade');
    //Crear Juego
    // Route::post('/juegos',  [PartidasController::class, 'store'])->name('Comercio.parCrear'); //Esta con el usuario


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

