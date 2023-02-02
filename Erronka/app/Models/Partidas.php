<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partidas extends Model
{
    use HasFactory;

    protected $table = "partidas";
    protected $primaryKey = "id";
    protected $fillable = ['juego1', 'juego2', 'dificultad', 'usuario'];
    protected $hidden = ['id'];

    public function usuarios(){
        return $this->belongsTo(Usuarios::class);
    }
}
