<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    //Asigancion masiva utilizamos la propiedad guarded y evitamos campos a ingresar por asignacion masiva
    protected $guarded = ['id'];

    //Relacion UNO a MUCHOS INVERSA
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //Metodo de relacion POLIMORFICA
    public function comentable(){
        return $this->morphTo();
    }

    //Relacion UNO a MUCHOS POLIMORFICA
    public function comments(){
        return $this->morphMany('App\Models\Comment', 'commenteable');
    }

    public function reactions(){
        return $this->morphMany('App\Models\Reaction', 'reactionable');
    }

}
