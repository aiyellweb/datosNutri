<?php

namespace App\parametrizacion;

use Illuminate\Database\Eloquent\Model;

class departamento extends Model
{
    protected $table="departamento";
    protected $primaryKey="departamento_id";
    protected $fillable=['departamento_id','fk_pais_id','departamento_nombre'];


    public function municipio(){
    	return $this->hasMany('App\parametrizacion\municipio');
    }
   
   public function empresa(){
   	return $this->hasMany('App\parametrizacion\empresa');
   }


}
