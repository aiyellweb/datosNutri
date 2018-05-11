<?php

namespace App\Http\Controllers\parametrizacion;

use App\Http\Controllers\Controller;
use App\Http\Controllers\parametrizacion\galpon;
use App\parametrizacion\departamento;
use App\parametrizacion\empresa;
use Illuminate\Http\Request;
use App\parametrizacion\granja;
use Illuminate\Support\Facades\DB;
use Redirect;
use Session;


class empresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


       $parametro = 13;// departamentos  // bolivar
       $muni=1; // cartagena
       $id=1; // empresa 
       /*
       $valores= empresa::with(['departamento'=>function($query) use ($parametro){       
         if($subconsulta=$parametro){    
            $query->where('departamento_id','=',$subconsulta);
        }        
       },
       'municipio'=>function($query) use ($muni){           
          if($conMun=$muni){
             $parametro=13;
            $query->where('municipio_id','=',$muni)->where('fk_departamento_id','=',$parametro);
          }
       },
        ])->where('empresa_id','=',$id)->orderBy('empresa_id')->get();
       */
       //dd($valores);

        $empresa= new empresa();
        $dataEmpresa= $empresa->getEmpresas();
        //dd($dataEmpresa);
        return view('parametrizacion.empresa.index',compact('dataEmpresa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


     

    public function create(Request $request)
    {
      //dd($request->all());

      $empresaId=$request->get('idAnimal');
      $granListado=granja::with('empresa')->where('fk_empresa_id',$empresaId);
     


      $departamento = DB::select('select departamento_id,departamento_nombre  from  departamento');
      //dd($departamento);
       return view('parametrizacion.empresa.create',compact("departamento" ,"granListado"));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


     public function galpon($id){

        $galpon= new empresa();

        return $galpon->dataPrueba($id);

     }


    public function store(Request $request)
    {

       $idEmpresa=$request->input();


        DB::table('empresas')->insert([
           'fk_pais_id'=>1,
           'fk_departamento_id'=>$request->input('deparamento_id'),
           'fk_municipio_id'=>$request->input('municipio_id'),
           'nit'=>$request->input('nit'),
           'nombre_empresa'=>$request->input('nombre_empresa'),
           'razon_social'=>$request->input('razon_social')
        ]);
        flash()->success('creado exitosamente');
        return Redirect::to('/empresa');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       //eloquent
        $data2= empresa::find($id);

        $departamento = DB::select('select departamento_id,departamento_nombre  from  departamento');
      
        $departamento2= departamento::select('departamento_nombre','departamento_id')->get();
        //dd($departamento2);
        

        //dd($data2);

        /// select
        
         $var= DB::select("SELECT em.empresa_id, em.nombre_empresa,m.municipio_nombre,de.departamento_nombre
                      from empresas as em
                      INNER JOIN departamento as de
                      on de.departamento_id=em.fk_departamento_id
                      inner JOIN municipio as m
                       on de.departamento_id= m.fk_departamento_id
                     where em.empresa_id=$id
                      GROUP by em.empresa_id");
         ///query builder
        $empresa=DB::table('empresas as em')
                ->join('departamento as di','em.fk_departamento_id','=','di.departamento_id')
                ->join('municipio as m','em.fk_municipio_id','=','m.municipio_id')
                ->select('em.empresa_id','em.nombre_empresa','di.departamento_id','di.departamento_nombre',
                    'm.municipio_id as empresa_id','m.municipio_nombre')
                ->where('em.empresa_id','=',$id)
                ->groupBy('em.empresa_id')
                ->get();

            //dd($empresa);    
        
        return view('parametrizacion.empresa.edit',compact('var','empresa','data2','departamento','departamento2','base'));
    }


  public function EditCombo($i){
    
   $ciudades=DB::select('SELECT m.municipio_id, d.departamento_nombre,m.municipio_nombre
   from municipio as m
   inner JOIN departamento as d
   on m.fk_departamento_id= d.departamento_id
   where  d.departamento_id='.$id.'');
    return $ciudades; 

  }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          
     //dd($request->all());

         $reglas=[
           'deparamento_id'=>'required',
           'municipio_id'=>'required'
         ];

         $this->validate($request,$reglas);

        $departamento_id= $request->input('deparamento_id');
        $municipio_id= $request->input('municipio_id');
        $idDepartamento= empresa::where('fk_departamento_id',$departamento_id)->where('fk_municipio_id',$municipio_id)->exists(); 
       


          $empresa=  empresa::find($id);
          $empresa->nit= $request->input('nit');
          $empresa->nombre_empresa=$request->input('nombre_empresa');
          $empresa->razon_social=$request->input('razon_social');
          $empresa->fk_departamento_id=$request->input('deparamento_id');
          $empresa->fk_municipio_id=$request->input('municipio_id');

          $empresa->update();
         
         flash()->success('editado exitosamente');
         return  Redirect::to('/empresa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $empresa= empresa::find($id);
         $empresa->estado=1;
         $empresa->update();
         flash()->warning('elmininado exitosamente');
         return  Redirect::to('/empresa');        
    }
}
