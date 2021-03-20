<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    use HasFactory;

    //Asigancion masiva utilizamos la propiedad guarded y evitamos campos a ingresar por asignacion masiva
    protected $guarded = ['id'];

    //Relacion de UNO a UNO INVERSA
    public function lesson(){
        return $this->belongsTo('App\Models\Lesson');
    }
}
