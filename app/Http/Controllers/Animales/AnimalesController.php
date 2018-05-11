<?php

namespace App\Http\Controllers\Animales;

use App\Animales\AnimalVariable;
use App\Animales\animalGrupos;
use App\Animales\animalLinea;
use App\Http\Controllers\Controller;
use App\parametrizacion\animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\variablesAnimal;

class AnimalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('animales.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $idAnimal= $request->get('id');
        $animal = animal::find($idAnimal);
        $animalConsulta= animalGrupos::where('fk_animal_id','=',$idAnimal)->get();

        //$animaVariable=AnimalVariable::where('fk_animal_id','=', $idAnimal)->get();
        $variables=variablesAnimal::with('animal')->where('fk_animal_id','=',$idAnimal)->get();
        

        
        
        return  view('animales.create',compact('animal','animalConsulta','animaVariable','variables'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $idAnimal= $request->input('idanimalCreateGrupo');
        $grupos_animales= new animalGrupos();
        $grupos_animales->grupo_nombre=$request->input('grupo_nombre');
        $grupos_animales->fk_animal_id=$idAnimal;
        $grupos_animales->save();
        flash()->success('creado exitosamente');

        return Redirect::to('/gruposAnimal/create'.'?id='.$idAnimal);


        //dd($request->all());

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
       $linea=  animalLinea::find($id);  
       
       return  view('animaleseditLineas.edit',compact('linea'));
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
       $idLinea=$request->input('linea_id'); 
       $idAnimal=$request->input('animal_id');
       $idgrupo=$request->input('fk_animal_grupo_id');
       $linea=  animalLinea::find($idLinea);
       $linea->linea_nombre=$request->input('linea_nombre');
       $linea->linea_descripcion=$request->input('linea_descripcion');
       $linea->update();

       return Redirect::to('/animallineas/create?idAnimal='.$idAnimal.'&idGrupoAnimal='.$idgrupo);




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
