<?php

namespace App\Animales;

use Illuminate\Database\Eloquent\Model;

class AnimalVariable extends Model
{
     protected $table="animal_variable";
     protected $primaryKey="grupo_variable_id";
     public $timestamps=false;
     protected $fillable=['grupo_variable_id','fk_animal_id','grupo_nombre'];

     public  function animal(){

     	return $this->belongsTo('App\parametrizacion\animal','fk_animal_id');
     }

    public function Variable(){
        return $this->hasMany('App\Variable');
    }



}
