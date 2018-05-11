<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variable extends Model
{
    
    protected $table="variables";
    protected $primaryKey="variables_id";
    public   $timestamps=false;
    protected $fillable=['variables_id','fk_grupo_variable_id','fk_animal_id','variables_macro',
    'variable_nombre','variable_descripcion','variable_min','
    variable_max','variable_base','variable_base_sentido','variable_apoyo_visual'];

    public function animal(){
    	return $this->belongsTo('App\parametrizacion\animal','fk_animal_id');
    }                 

    public  function AnimalVariable(){
    	return $this->belongsTo('App\Animales\AnimalVariable','fk_grupo_variable_id');
    }     
}
