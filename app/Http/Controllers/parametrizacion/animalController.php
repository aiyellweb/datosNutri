<?php

namespace App\Http\Controllers\parametrizacion;

use App\Http\Controllers\Controller;
use App\parametrizacion\animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class animalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animal= animal::where('estado','=',0)->get();  
        return view('parametrizacion.animal.index',compact('animal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('parametrizacion.animal.create');
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
      $animal = new animal();
      $animal->animal_nombre=$request->input('animal_nombre');
      $animal->animal_descripcion=$request->input('animal_descripcion');
      $animal->estado=0;
      $animal->save();
      flash()->success('creado exitosamente');
      return Redirect::to('/animal');

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
        $animal= animal::find($id);

        return view('parametrizacion.animal.edit',compact('animal'));
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
       $animal= animal::find($id);
       $animal->update($request->all());

       flash()->success('modificado exitosamente');
       return Redirect::to('/animal');

   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $animal= animal::find($id);
        $animal->estado=1;
        $animal->update();
        return Redirect::to('/animal');
    }
}
