<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class variablesAnimal extends Model
{
    
    protected $table="variables";
    protected $primaryKey="variable_id";
    public   $timestamps=false;

    protected $fillable=[
        'variable_id','fk_animal_id','variables_macro',
        'variable_nombre','variable_descripcion','variable_min',
        'variable_max','index_g','ir_operador','calificacion_operador','ir_tolerancia','calificacion_tolerncia',
        'variable_max_prog','calificacion_texto_pos','calificacion_texto_neg','operacion_resultado','variables_apoyo_visual'
    ];
    
    public function animal(){
    	return $this->belongsTo('App\parametrizacion\animal','fk_animal_id');
    } 


    public function variableGrupos(){
        return $this->hasMany('App\variableGrupos');
    }                         
}
