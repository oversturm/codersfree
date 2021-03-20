<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    //Asigancion masiva utilizamos la propiedad guarded y evitamos campos a ingresar por asignacion masiva
    protected $guarded = ['id'];

    //Relacion UNO a MUCHOS
    public function lessons(){
        return $this->hasMany('App\Models\Lesson');
    }


    //Relacion de UNO a MUCHOS INVERSA
    public function course(){
        return $this->belongsTo('App\Models\Course');
    }

}
