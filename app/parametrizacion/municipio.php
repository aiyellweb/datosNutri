<?php

namespace App\parametrizacion;

use Illuminate\Database\Eloquent\Model;

class municipio extends Model
{
    
    protected $table="municipio";
    protected $primaryKey="municipio_id";
    protected $fillable=['municipio_id','fk_departamento_id','fk_pais_id','municipio_nombre'];

    public function departamento(){
    	return $this->belongsTo('App\parametrizacion\departamento','fk_departamento_id');
    }


    public function empresa(){
   	return $this->hasMany('App\parametrizacion\empresa');
   }

   
}
