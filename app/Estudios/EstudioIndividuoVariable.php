<?php

namespace App\Estudios;

use Illuminate\Database\Eloquent\Model;

class EstudioIndividuoVariable extends Model{
    
  protected $table = "estudio_individio_variable";
	protected $fillable = [
		'fk_variables_id','fk_individio_id','fk_estudio_galpon_id','fk_animal_id','fk_empresa_id','fk_granja_id','fk_linea_id','fk_galpone_id',
		'fecha_estudio_individuo','variable_valor','individuo_imagen','fk_grupo_variable_id'
	];

	public $timestamps = false;


	public function  estudioGalpon (){
    	return $this->belongsTo('App\Estudios\estudioGalpones','fk_estudio_galpon_id');
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

    public function GrupoVariable(){
      return $this->belongsTo('App\grupoVariables','fk_grupo_variable_id');
    }

    public function Variable(){
      return $this->belongsTo('App\variablesAnimal','fk_variables_id');
    }
}
