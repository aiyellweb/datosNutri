<?php

namespace App\Estudios;

use Illuminate\Database\Eloquent\Model;

class estudios extends Model
{
       protected $table="estudios";
       protected $primaryKey="estudio_id";
       public   $timestamps=false;
       protected $fillable=['estudio_id','fk_animal_id','fk_empresa_id','fk_granja_id','users_user_id',
                           'estudio_num_animales','estudios','fecha_estudio'];



   /// relaciones 
    public  function empresa(){
    
      return $this->belongsTo('App\parametrizacion\empresa','fk_empresa_id');
   
    }


     public function granjas(){
       return $this->belongsTo('App\parametrizacion\granja');
    }


    public function animal(){
      return $this->belongsTo('App\parametrizacion\animal','fk_animal_id');
    }

 public  function estudioGalpones(){

          return $this->hasMany('App\Estudios\estudioGalpones');
      }
   

     public function estudioGalponEndividuos(){

      return $this->hasMany('App\Estudios\estudioGalponEndividuos');
    }



}
