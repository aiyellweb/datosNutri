<?php

namespace App\Animales;

use Illuminate\Database\Eloquent\Model;

class animalGrupos extends Model
{
    
    protected $table="animal_grupos";
    protected $primaryKey="animal_grupo_id";
    public $timestamps=false;
    protected $fillable=['animal_grupo_id','grupo_nombre','fk_animal_id'];


    public function animal(){
    return $this->belongsTo('App\parametrizacion\animal','fk_animal_id');	
    }

    public  function animalLinea (){

    	return $this->hasMany('App\Animales\animalLinea');

    }

   

    




}
