<?php

namespace App\parametrizacion;

use Illuminate\Database\Eloquent\Model;

class animal extends Model
{
    protected $table="animales";
    protected $primaryKey="animal_id";
    public $timestamps=false;
    protected $fillable=['animal_id','animal_nombre','animal_descripcion','estado'];


     public function animalesGrupo() {

     	return $this->hasMany('App\Animales\animalesGrupos');
     }  


     public  function AnimalVariable(){

     	return $this->hasMany('App\Animales\AnimalVariable');
     }

     public function Variable(){
        return $this->hasMany('App\Variable');
     }

     public function variablesAnimal(){

        return $this->hasMany('App\parametrizacion\variablesAnimal');
     }

     public function variableGrupos(){
        return $this->hasMany('App\variableGrupos');
     }


      public function estudios(){
        return $this->hasMany('App\Estudios\estudios');
    } 

    public  function estudioGalpones(){

          return $this->hasMany('App\Estudios\estudioGalpones');
      }

        public function estudioGalponEndividuos(){

        return $this->hasMany('App\Estudios\estudioGalponEndividuos');
    }
   
 
}
