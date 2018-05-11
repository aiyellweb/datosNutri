<?php

namespace App\Estudios;

use Illuminate\Database\Eloquent\Model;

class estudioGalpones extends Model
{
       protected $table="estudio_galpones";
       protected $primaryKey="estudio_galpon_id";
       public   $timestamps=false;
       protected $fillable=['estudio_galpon_id','fk_estudio_id','fk_empresa_id','fk_animal_id','fk_granja_id',
                           'fk_linea_id','fk_galpone_id','individuos_semanas','individios_genero','estudio_galpon_lote'];



          /// relaciones            

      public  function estudios(){
        
        return $this->belongsTo('App\Estudios\estudios','fk_estudio_id');
      }

      public function animal(){
        
        return $this->belongsTo('App\parametrizacion\animal','fk_animal_id');
      }


      public function empresa(){
        return $this->belongsTo('App\parametrizacion\empresa','fk_empresa_id');
      }

      public  function granja(){
       return $this->belongsTo('App\parametrizacion\granja','fk_granja_id');
      }


      public function galpon(){
         return $this->belongsTo('App\parametrizacion\galpon','fk_galpone_id');
      }


  public function estudioGalponEndividuos(){

      return $this->hasMany('App\Estudios\estudioGalponEndividuos');
    }

      
}
