<?php

namespace App\Animales;

use Illuminate\Database\Eloquent\Model;

class Animales extends Model
{
     protected $table="animales";
     protected $primaryKey="animal_id";
     public $timestamps=false;
     protected $fillable=['animales_nombre','animales_descripcion'];




     public function animalesGrupo() {

     	return $this->hasMany('App\Animales\animalesGrupos');
     }   
}
