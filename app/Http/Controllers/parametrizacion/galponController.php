<?php

namespace App\Http\Controllers\parametrizacion;

use App\Http\Controllers\Controller;
use App\parametrizacion\empresa;
use App\parametrizacion\galpon;
use App\parametrizacion\granja;
use App\Animales\animalLinea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\parametrizacion\animal;
use App\grupoVariables;

class galponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $galpones= new galpon();
        $galpon=$galpones->getGalpones();  
        return view('parametrizacion.galpon.index',compact('galpon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        //dd($request->all());

        $idempresa= $request->get('idEmpresa');
        $idgranja=$request->get('idGranja');

        $empresa= DB::select('SELECT em.empresa_id,em.nombre_empresa,gra.granja_nombre,gra.granja_id
                 from empresas as em
                 inner JOIN empresa_granjas as gra
                 on gra.fk_empresa_id=em.empresa_id
                group by em.empresa_id 
                   ');

        $empresasListado=empresa::find($idempresa);
        $granjaListado=granja::find($idgranja);
        $galponGranjaID= granja::find($idgranja);
         //dd($galponGranjaID);    
        $animal= animal::all();
        $galponIndividuos=galpon::where('fk_granja_id','=',$idgranja)->get();
        $animalLinea=animalLinea::all();
        $grupoVariable = grupoVariables::pluck('grupo_nombre','grupo_variable_id');
        //dd($galponIndividuos); 

        $listadoGalpon= galpon::with(['empresa','granja'])->where('fk_granja_id','=',$idgranja)
             ->where('fk_empresa_id','=',$idempresa)
             ->get(); 
        //$granja= granja::select('granja_id','granja_nombre')->get();
        
        return view('parametrizacion.galpon.create',compact('empresa','empresasListado',
            'granjaListado','listadoGalpon','animal','galponIndividuos','animalLinea','grupoVariable','galponGranjaID'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        $idEmpresa=$request->input('fk_empresa_id');
        $granjaId=$request->input('fk_granja_id');

        DB::table('empresa_granja_galpones')->insert([
         'tipo_ambiente'=>$request->input('tipo_ambiente'),
         'sistema_produccion'=>$request->input('sistema_produccion'),
         'fk_granja_id'=>$request->input('fk_granja_id'),
         'fk_empresa_id'=>$request->input('fk_empresa_id'),
          'estado'=>0 
        ]);
        flash()->success('creado exitosamente');
        return Redirect::to('/galpon/create?idEmpresa='.$idEmpresa.'&idGranja='.$granjaId);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        $ids=explode('-',$id);
        $empresa= empresa::find($ids[1]);
        $idDepartamento=$empresa->fk_departamento_id;
   
        $dataGranjas= galpon::find($id);
        $galpones = new galpon();
        $dataShow= $galpones->getEmpresaItem($ids[0],$idDepartamento);
        //dd($dataShow);
        return view('parametrizacion.galpon.show',compact('dataShow','dataGranjas'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $galpon= galpon::find($id);
       //dd($galpon->sistema_produccion);
         $empresa= DB::select('SELECT em.empresa_id,em.nombre_empresa,gra.granja_nombre,gra.granja_id
                 from empresa as em
                 inner JOIN empresa_granjas as gra
                 on gra.fk_empresa_id=em.empresa_id
                group by em.empresa_id 
                   ');
         
        return view('parametrizacion.galpon.edit',compact('galpon','empresa'));
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
        $galpones = galpon::find($id);
        $galpones->tipo_ambiente=$request->input('tipo_ambiente');
        $galpones->sistema_produccion=$request->input('sistema_produccion');
        $galpones->fk_empresa_id=$request->input('fk_empresa_id');
        $galpones->fk_granja_id=$request->input('fk_granja_id');
        $galpones->update(); 
        
        flash()->success('Editado exitosamente');
        return Redirect::to('/galpon');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $galpon=galpon::find($id);
         $galpon->estado=1;
         $galpon->update();
         flash()->error('eliminado exitosamente');
         return Redirect::to('/galpon');

    }
}
