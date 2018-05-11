<?php

namespace App\parametrizacion;

use Illuminate\Database\Eloquent\Model;

class granja extends Model
{
    protected $table="empresa_granjas";
    protected $primaryKey='granja_id';
    public $timestamps=false;
    protected $fillable=['granja_id','fk_empresa_id','granja_nombre','estado'];



  public function empresa(){
    
    return $this->belongsTo('App\parametrizacion\empresa','fk_empresa_id');

  }

 


public function galpon(){

    return $this->hasMany('App\parametrizacion\galpon');
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
