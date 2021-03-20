<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;
    //Asigancion masiva utilizamos la propiedad guarded y evitamos campos a ingresar por asignacion masiva
    protected $guarded = ['id'];

    //Relacion UNO a MUCHOS
    public function courses(){
        return $this->hasMany('App\Models\Course');
    }
}
