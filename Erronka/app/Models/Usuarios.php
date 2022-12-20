<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuarios;

class Usuarios extends Model
{
    use HasFactory;

    protected $table = "usuarios";
    protected $primaryKey = "id";
    protected $fillable = ['nombre', 'apellido', 'usuario', 'pass', 'rol', 'foto', 'type'];
    protected $hidden = ['id'];

    public function partidas(){
        return $this->hasMany(Partidas::class);
    }


    
    // //No se si esta bien :) {
    // public function miembros(){
    //     return $this->hasMany(Usuario::class);
    // }

    // public function grupos(){
    //     return $this->belongsTo(Usuarios::class);
    // }
    // //  }
}
