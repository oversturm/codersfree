<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    //Asigancion masiva utilizamos la propiedad guarded y evitamos campos a ingresar por asignacion masiva
    protected $guarded = ['id'];

    //Creando un ATRIBUTO para saber si ha terminado una leccion o no (retornara true o false si ha culmina la leccion)
    //Recuperamos la RELACION users nos trae el registros todos los usuarios que la han culimando->pregunta si dentro de esa coleccion esta el usuario autentificado y le pasamos el ide el usuario autentificado
    public function getCompletedAttribute(){
        return $this->users->contains(auth()->user()->id);
    }

    //Relacion UNO a UNO
    public function description(){
        return $this->hasOne('App\Models\description');
    }

    //Relacion UNO a MUCHOS INVERSA
    public function section(){
        return $this->belongsTo('App\Models\Section');
    }
    public function platform(){
        return $this->belongsTo('App\Models\Platform');
    }

    //Relacion de MUCHOS a MUCHOS
    public function  users(){
        return $this->belongsToMany('App\Models\User');
    }

    //Relacion UNO a UNO POLIMORFICA
    public function resource(){
        return $this->morphOne('App\Models\Resource', 'resourceable');
    }

    //Relacion UNO a MUCHOS POLIMORFICA
    public function comments(){
        return $this->morphMany('App\Models\Comment', 'commeenteable');
    }

    public function reactions(){
        return $this->morphMany('App\Models\Reaction', 'reactionable');
    }

}
