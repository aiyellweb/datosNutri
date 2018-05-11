<?php

namespace App\Animales;

use Illuminate\Database\Eloquent\Model;

class animalLinea extends Model
{
	protected $table="animal_linea";
    protected $primaryKey="linea_id";
    public $timestamps=false;
    protected $fillable=['linea_id','fk_animal_grupo_id','fk_animal_id','linea_nombre','linea_descripcion'];



    public function animal(){
    return $this->belongsTo('App\parametrizacion\animal','fk_animal_id');   
    }


     public function animalGrupos() {

     	return $this->belongsTo('App\Animales\animalGrupos','fk_animal_grupo_id');
     }  


    public  function lineapeso(){
        return $this->hasMany('App\lineapeso');
    } 

      public function estudioGalponEndividuos(){

        return $this->hasMany('App\Estudios\estudioGalponEndividuos');
    }

     
}
