<?php

use Illuminate\Support\Facades\Route;

//Ventana Index
Route::get('/', function () {return view('Comercio.index');})->name('Comercio.index');
    //Crear Juego
    Route::post('/',  [PartidasController::class, 'store'])->name('Comercio.store');

//Ventana Log-reg
Route::get('/log-reg', [UsuariosController::class, 'create'])->name('Comercio.create');
    //Create
    Route::post('/juegos',  [UsuariosController::class, 'store'])->name('Comercio.store');

//Admin
Route::get('/admin', [UsuariosController::class, 'index'])->name('Comercio.index');
    //Eliminar
    Route::delete('/{id}', [UsuariosController::class, 'destroy'])->name('Comercio.destroy');
    //Editar
    Route::put('/{id}', [UsuariosController::class, 'update'])->name('agentes.update');

//Juegos
Route::get('/{id}/juegos', [UsuariosController::class, 'ver'])->name('agentes.ver');
    //Editar
    Route::put('{id}/juegos', [UsuariosController::class, 'update'])->name('agentes.update');

