<?php

namespace App\parametrizacion;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class galpon extends Model
{
     protected $table="empresa_granja_galpones";
     protected $primaryKey='galpone_id';
     public $timestamps=false;
     protected $fillable=['galpone_id','fk_granja_id','fk_empresa_id','tipo_ambiente','sistema_produccion',
                          'nombre_golpen','estado'];


    public function getGalpones(){
       
       $galpones = DB::select('SELECT  emp.galpone_id, emp.sistema_produccion,em.empresa_id,
                                       em.nombre_empresa,gran.granja_nombre
                            from empresa_granja_galpones as emp
                            INNER JOIN empresa as em
                            on em.empresa_id= emp.fk_empresa_id
                            inner JOIN empresa_granjas as gran
                            on gran.fk_empresa_id= em.empresa_id
                            where emp.estado="0"
                            GROUP by emp.galpone_id');

      return $galpones;
    }


    public function getEmpresaItem($id,$idDepartamento){
      
      $galpones=DB::select("SELECT  emp.galpone_id,emp.tipo_ambiente,emp.sistema_produccion,emp.nombre_golpen,
      	                            em.nombre_empresa,gran.granja_nombre,mu.municipio_nombre,de.departamento_nombre
                            from empresa_granja_galpones as emp
                            INNER JOIN empresa as em
                            on em.empresa_id= emp.fk_empresa_id
                            inner JOIN empresa_granjas as gran
                            on gran.fk_empresa_id= em.empresa_id
                            inner JOIN municipio as mu
                             on em.fk_municipio_id=mu.municipio_id
                             inner JOIN departamento as de
                             on mu.fk_departamento_id=de.departamento_id
                            where emp.galpone_id='".$id."' and de.departamento_id='".$idDepartamento."'
                            GROUP by emp.galpone_id ");

      return $galpones;

    }



  public function empresa(){
  	return $this->belongsTo('App\parametrizacion\empresa','fk_empresa_id');
  } 

  public function granja(){
  	return $this->belongsTo('App\parametrizacion\granja','fk_granja_id');
  }

   public  function estudioGalpones(){

      return $this->hasMany('App\Estudios\estudioGalpones');
  }


  public function estudioGalponEndividuos(){

      return $this->hasMany('App\Estudios\estudioGalponEndividuos');
    }



    
     
}
