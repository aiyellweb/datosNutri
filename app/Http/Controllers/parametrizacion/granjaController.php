<?php

namespace App\Http\Controllers\parametrizacion;

use App\Http\Controllers\Controller;
use App\parametrizacion\empresa;
use App\parametrizacion\granja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect;


class granjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        $granja = granja::where('estado','=',"0")->get();
        return view('parametrizacion.granja.index',compact('granja'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       //dd($request->all());
       $empresaId=$request->get('idempresa');
       
        $granListado=granja::with('empresa')->where('fk_empresa_id',$empresaId)->get(); 
        $empresa = empresa::find($empresaId);
        //dd($empresa);
        //dd($empresa);  
        return view('parametrizacion.granja.create',compact('empresa','granListado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //dd($request->all());
        $granja =   new granja();
        $idempresa=$request->input('fk_empresa_id');
        $granja->fk_empresa_id=$request->input('fk_empresa_id');
        $granja->granja_nombre=$request->input('granja_nombre');
        $granja->save();
        
        flash()->success('creado exitosamente');
        return Redirect::to('/granja/create?idempresa='.$idempresa);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $dataGranja= granja::find($id);  
        $granja = DB::select("SELECT  gran.granja_id,gran.granja_nombre,em.nombre_empresa,de.departamento_nombre,mu.municipio_nombre
           from empresa_granjas as gran
           inner JOIN empresas as em
           on  em.empresa_id= gran.fk_empresa_id
           inner JOIN departamento as de
           on em.fk_departamento_id= de.departamento_id
           inner JOIN municipio as mu
           on de.departamento_id= mu.fk_departamento_id
           where gran.granja_id='".$id."'
          GROUP by gran.granja_id");
        //dd($granja);
        return view('parametrizacion.granja.show',compact('granja','dataGranja'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $granja= granja::find($id);
         $empresa = empresa::select('empresa_id','nombre_empresa')->get();   
        return view('parametrizacion.granja.edit',compact('granja','empresa'));
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
        //
          //dd($request->all()); 

         $idEmpresa=$request->fk_empresa_id;      
        $granja= granja::find($id);
        $granja->update($request->all());
        flash()->success('editado exitosamente');
         return Redirect::to('/granja/create?idempresa='.$idEmpresa);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $granja= granja::find($id);
         $granja->estado=1;
         $granja->update();

         flash()->error('eliminado exitosamente');
         return Redirect::to('/granja');


    }



    public  function granjaIdit(Request $request){
        dd($request->all());

    }
}
