<?php

namespace App\Http\Controllers;

use App\Animal\animalGrupos;
use App\Variable;
use App\parametrizacion\animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Storage;

class VariableController extends Controller
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
          //dd($request->all());  // ok
      $grupo_id= $request->input('grupo_variable_id');
      $animal_id= $request->input('idAnimal');
      $animaNombre=DB::select('SELECT va.variables_id,av.grupo_nombre,an.animal_nombre,av.grupo_variable_id,an.animal_id
         FROM variables as va
         inner JOIN animal_variable as av
         on av.grupo_variable_id=va.fk_grupo_variable_id
         inner JOIN animales as an
         on an.animal_id=va.fk_animal_id
         where va.fk_animal_id='.$animal_id.'  LIMIT 0,1 ');

      $variables_macro= Variable::select('variables_macro')->get();

      
      $listadoVariables= Variable::with(['AnimalVariable','animal'])->where('fk_grupo_variable_id','=',$grupo_id)
      ->where('fk_animal_id','=',$animal_id)
      ->get();
          //dd($listadoVariables);
           //dd($variables_macro);



      return view('variables.create',compact('listadoVariables','animaNombre','variables_macro','grupo_id','animal_id','animal_id'));



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


        $idgrupo=$request->input('idgrupo_variable_id');
        $idanimal=$request->input('id_animal_id');

        $variable=  new Variable();
        $variable->variables_macro= $request->input('variable_macro');
        $variable->variable_nombre= $request->input('variable_nombre');
        $variable->variable_descripcion= $request->input('variable_descripcion');
        $variable->variable_min= $request->input('variable_min');
        $variable->variable_max= $request->input('variable_max');

        $variable->variables_base= $request->input('variable_base');
        $variable->variables_base_sentido= $request->input('variable_base_sentido');
        $variable->fk_grupo_variable_id= $idgrupo;
        $variable->fk_animal_id=$idanimal;
        
        if(Input::hasFile('imagen')){
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/guias/',$file->getClientOriginalName());
            $variable->variables_apoyo_visual=$file->getClientOriginalName();

        }


        $variable->save();
        return Redirect::to('/variable/create?grupo_variable_id='.$idgrupo.'&idAnimal='.$idanimal);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data= explode('-', $id);
        $idvariables=$data[0];
        $idgrupovariable=$data[1];
        $idanimal=$data[2];

        $variable= Variable::find($idvariables);

        return view('variables.edit',compact('variable'));

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
      $idgrupo= $request->input('variable_grupo_id');
      $idanimal=$request->input('animal_id');

      $variable=  Variable::find($id);
      $variable->variables_macro= $request->input('variable_macro');
      $variable->variable_nombre= $request->input('variable_nombre');
      $variable->variable_descripcion= $request->input('variable_descripcion');
      $variable->variable_min= $request->input('variable_min');
      $variable->variable_max= $request->input('variable_max');
      $variable->fk_grupo_variable_id= $idgrupo;
      $variable->fk_animal_id=$idanimal;
      $variable->update();

      return Redirect::to('/variable/create?grupo_variable_id='.$idgrupo.'&idAnimal='.$idanimal);
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

