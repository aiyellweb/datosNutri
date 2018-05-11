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
class AnimalLineasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   

        
       
        $data= $request->all();
        /// data  lineas animales
        $valores=animalLinea::with(['animal','animalGrupos'])->where('fk_animal_id','=',$data['idAnimal'])->where('fk_animal_grupo_id','=',$data['idGrupoAnimal'])->get();
        //dd($valores);
        //inser de grupo_animales a linea animal
        $grupoAnimales=animalGrupos::find($data['idGrupoAnimal']);

        
        

        return view('animalLineas.create',compact('valores','grupoAnimales'));
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
       $idanimal=$request->input('idanimal');
       $idGrupoAnimal=$request->input('idanimalCreateGrupo');
       

       $lineas =  new animalLinea(); 
       $lineas->fk_animal_grupo_id=$request->input('idanimalCreateGrupo');
       $lineas->fk_animal_id=$request->input('idanimal');
       $lineas->linea_nombre=$request->input('linea_nombre');
       $lineas->linea_descripcion=$request->input('linea_descripcion');
       $lineas->save();

       flash()->success('creado exitosamente');
       return Redirect::to('/animallineas/create?idAnimal='.$idanimal.'&idGrupoAnimal='.$idGrupoAnimal);
       


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
        $dataIDs= explode('-', $id);

        $gruposAnimalesID=animalGrupos::find($dataIDs[0]);

        $grupo=DB::select('SELECT   ag.animal_grupo_id,ag.grupo_nombre,a.animal_nombre
            from animal_grupos as ag
            inner JOIN animales as a
            on a.animal_id=ag.fk_animal_id
            where ag.animal_grupo_id='.$dataIDs[0].'');
            //dd($gruposAnimalesID);
         //dd($grupo);
        $data=array(
          '0'
      );




        
        return view('animallineas.edit',compact('gruposAnimalesID'));
        
        
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
     $idgrupo=$request->input('grupo_animal_id');
     $idanimal=$request->input('grupo_animal_id');
     $grupo= animalGrupos::find($idgrupo);
     $grupo->grupo_nombre=$request->input('grupo_nombre');
     $grupo->update();
     flash()->success('Modificado   exitosamente');
     return Redirect::to('/gruposAnimal/create?id='.$idanimal);
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
