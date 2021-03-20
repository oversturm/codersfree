<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    //Asigancion masiva utilizamos la propiedad guarded y evitamos campos a ingresar por asignacion masiva
    protected $guarded = ['id','status'];
    protected $withCount = ['students', 'reviews'];//Cuantos estudiantes existen

    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO =3;

    //Creamos un metodo con atributo, donde utilizamos avg para sacar el promedio y round y al final le decimos los decimales que queremos que me devuelva
    public function getRatingAttribute(){

        if ($this->reviews_count) {
            return round($this->reviews->avg('rating'), 1);
        }else{
            return 5;
        }


    }

    //Query Scopes-->Creandola para category_id queremos mostrar las categorias
    public function scopeCategory($query, $category_id){
        if ($category_id) {
            //Se ejecutara la consulta cuando category_id, coincida con $category_id
            return $query->where('category_id', $category_id);
        }
    }

    public function scopeLevel($query, $level_id){
        if ($level_id) {
            return $query->where('level_id', $level_id);
        }
    }

    //Creamos la funcion para que acceda por URL AMIGABLES
    public function getRouteKeyName()
    {
        return "slug";
    }

    //Relaccion UNO a MUCHOS
    public function reviews(){
        return $this->hasMany('App\Models\Review');
    }

    public function audiences(){
        return $this->hasMany('App\Models\Audience');
    }
    public function requirements(){
        return $this->hasMany('App\Models\Requirement');
    }
    public function goals(){
        return $this->hasMany('App\Models\Goal');
    }
    public function sections(){
        return $this->hasMany('App\Models\Section');
    }

    //Relación UNO a MUCHOS INVERSA
    public function teacher(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
    public function price(){
        return $this->belongsTo('App\Models\Price');
    }
    public function level(){
        return $this->belongsTo('App\Models\Level');
    }

    //Relacion MUCHOS a MUCHOS
    public function students(){
        return $this->belongsToMany('App\Models\User');
    }

    //UNO a UNO POLIMORFICA
    public function image(){
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    public function lessons(){
        return $this->hasManyThrough('App\Models\Lesson', 'App\Models\Section');
    }
}
