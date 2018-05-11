<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lineapeso extends Model
{
	
	protected $table="animal_grupo_linea_peso";
	protected $primaryKey="peso_id";
	public   $timestamps=false;

	protected $fillable=['peso_id','peso_genero','peso_semana','peso_min','peso_max','peso_prom','fk_linea_id'];

	public function animalLinea(){

		return $this->belongsTo('App\Animales\animalLinea','fk_linea_id');
	}
}
