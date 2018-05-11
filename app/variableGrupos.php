<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class variableGrupos extends Model
{
    
    protected $table="variables_grupo_variables";
    public   $timestamps=false;
    protected $fillable=['fk_animal_id','fk_variable_id','fk_grupo_variable_id'];


    public function animal(){
    	return $this->belongsTo('App\parametrizacion\animal','fk_animal_id');
    } 


    public function variablesAnimal(){

        return $this->belongsTo('App\variablesAnimal','fk_variable_id');
    } 

    public function grupoVariables(){
    	return $this->belongsTo('App\grupoVariables','fk_grupo_variable_id');
    }

}


