<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Animales\animalLinea;
use App\lineapeso;

class lineapesoController extends Controller
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
        $idLinea=$request->get('lineaId');
        $linea=animalLinea::find($idLinea);
        $peso=lineapeso::with('animalLinea')->where('fk_linea_id','=',$idLinea)->get();

        return view('pesolineas.create',compact('linea','peso'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idLinea=$request->input('idAnimalLinea');
        //dd($request->all());
        $peso=  new lineapeso();
        $peso->peso_genero=$request->input('peso_genero');
        $peso->peso_semana=$request->input('peso_semana');
        $peso->peso_min=$request->input('peso_min');
        $peso->peso_max=$request->input('peso_max');
        $peso->peso_prom=$request->input('peso_prom');
        $peso->fk_linea_id=$request->input('idAnimalLinea');
        $peso->save();
        return Redirect::to('/lineapeso/create?lineaId='.$idLinea);
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
