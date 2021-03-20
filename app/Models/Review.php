<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    //Asigancion masiva utilizamos la propiedad guarded y evitamos campos a ingresar por asignacion masiva
    protected $guarded = ['id'];

    //Relacion UNO a MUCHOS INVERSA
    public function users(){
        return $this->belongsTo('App\Models\User');
    }
    public function course(){
        return $this->belongsTo('App\Models\Course');
    }

}
