<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    use HasFactory;

    //Asigancion masiva utilizamos la propiedad guarded y evitamos campos a ingresar por asignacion masiva
    protected $guarded = ['id'];

    const LIKE = 1;
    const DISLIKE = 2;

     //Relacion UNO a MUCHOS INVERSA
     public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //Metodo de relacion POLIMORFICA
    public function reactionable(){
        return $this->morphTo();
    }
}
