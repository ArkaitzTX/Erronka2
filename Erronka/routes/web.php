<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\PartidasController;

//Ventana Index
Route::get('/', function () {
    return view('Comercio.index');
})->name('Comercio.index');

//Ventana Log-reg
Route::get('/log-reg', [UsuariosController::class, 'create'])->name('Comercio.create');
    //Create
    Route::post('/',  [UsuariosController::class, 'store'])->name('Comercio.store');

//Admin
Route::get('/admin', [UsuariosController::class, 'index'])->name('Comercio.index');
    //Eliminar
    Route::delete('/{id}', [UsuariosController::class, 'destroy'])->name('Comercio.destroy');
    //Editar
    Route::put('/{id}', [UsuariosController::class, 'update'])->name('Comercio.update');

//Juegos
Route::get('/{id}/juegos', [UsuariosController::class, 'ver'])->name('Comercio.ver');
    //Editar
    Route::put('{id}/juegos', [UsuariosController::class, 'update'])->name('Comercio.update');
    //Crear Juego
    Route::post('/juegos',  [PartidasController::class, 'store'])->name('Comercio.store');
