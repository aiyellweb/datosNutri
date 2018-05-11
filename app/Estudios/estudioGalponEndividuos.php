<?php

namespace App\Estudios;

use Illuminate\Database\Eloquent\Model;

class estudioGalponEndividuos extends Model
{
     protected $table="estudio_galpon_individios";
     protected $primaryKey="individio_id";
     public   $timestamps=false;
     protected $fillable=['individio_id','fk_estudio_galpon_id',
                          'fk_estudio_id','fk_animal_id','fk_empresa_id',
                           'fk_granja_id','fk_linea_id','fk_galpone_id'];

    

    //// relaciones
    public function  estudioGalpon (){
    	return $this->belongsTo('App\Estudios\estudioGalpones','fk_estudio_galpon_id');
    }

    public function estudio(){
        return $this->belongsTo('App\Estudios\estudios','fk_estudio_id');
    }   

    public  function animal(){
        return $this->belongsTo('App\parametrizacion\animal','fk_animal_id');
    }   

    public function empresa(){
       return $this->belongsTo('App\parametrizacion\empresa','fk_empresa_id');
    }  

    public  function granja(){
      return $this->belongsTo('App\parametrizacion\granja', 'fk_granja_id');
    } 

    public  function animalLinea(){
       return $this->belongsTo('App\Animales\animalLinea','fk_linea_id');
    }

    public function galpon(){
      return $this->belongsTo('App\parametrizacion\galpon','fk_galpone_id');
    }

    ////

    public function estudioGalponEndividuos(){

    	return $this->hasMany('App\Estudios\estudioGalponEndividuos');
    }


}
