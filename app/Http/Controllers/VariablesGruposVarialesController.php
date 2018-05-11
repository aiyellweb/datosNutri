<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\variableGrupos;
use App\parametrizacion\animal;
use App\variablesAnimal;
use App\grupoVariables;
use Illuminate\Support\Facades\Redirect;

class VariablesGruposVarialesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //dd($request->all());
        $animalId=$request->input('animalId');
        $variablesId=$request->input('variablesId');
        $listadoGrupoVariables=grupoVariables::select('grupo_variable_id','grupo_nombre')->get();
        $animal=animal::find($animalId);
        $variables=variablesAnimal::find($variablesId);
        $variablesGrupos= variableGrupos::with(['animal','variablesAnimal'])
        ->where('fk_animal_id','=',$animalId)
        ->where('fk_variable_id','=',$variablesId)
        ->get();

                 //dd($variablesGrupos);





        return view('VariablesGruposVariables.create',compact('listadoGrupoVariables','animal','variables'));



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

        $idanimal=$request->input('animalId');
        $variablesId=$request->input('variableId');
        $grupoVariables=  new variableGrupos();
        
        $grupoVariables->fk_animal_id=$idanimal;
        $grupoVariables->fk_variable_id=$variablesId;
        $grupoVariables->fk_grupo_variable_id=$request->input('fk_grupo_variable_id');
        $grupoVariables->save();

        return Redirect::to('/varialesgrupos/create?animalId='.$idanimal.'&variablesId='.$variablesId);
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
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
