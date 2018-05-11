<?php

namespace App\parametrizacion;

use App\parametrizacion\galpon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class empresa extends Model
{
  
  
    public $empresa;
    public $dataFull;

    protected $table="empresas";
    protected $primaryKey='empresa_id';
     public $timestamps=false;
    protected $fillable=['fk_pais_id','fk_municipio_id','fk_departamento_id','nit',
                         'nombre_empresa','razon_social','estado'];
                         
       

    


///////////// consultas
    public function getEmpresas(){
    	 $this->empresa=DB::select("SELECT  em.empresa_id as empresa_id , em.nombre_empresa,de.departamento_nombre,mu.municipio_nombre,em.razon_social
         from empresas as em
         INNER JOIN departamento as de
         on de.departamento_id= em.fk_departamento_id
         INNER JOIN municipio as mu
         on de.departamento_id=mu.fk_departamento_id
         GROUP by em.empresa_id");

     return $this->empresa;
    }


    public  function dataPrueba($id){
        $galpones= galpon::find($id);
        $galponEmpresaID= $galpones->fk_empresa_id;
        $gaponGranjaId= $galpones->fk_granja_id;


       return  $this->dataFull= galpon::with(['empresa'=>function($query) use ($galponEmpresaID){

                 if($subconulta=$galponEmpresaID){
                   $query->where('empresa_id','=',$subconulta);
                 }    

       }])->where('galpone_id','=',$id)->get();




    }


 /////fin consultas   




  /// relaciones

   public function departamento(){
    return $this->belongsTo('App\parametrizacion\departamento','fk_departamento_id');
   } 

   public function municipio(){
    return $this->belongsTo('App\parametrizacion\municipio','fk_municipio_id');
   }

   public function granja(){
    return $this->hasMany('App\parametrizacion\granja');
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
   


}
