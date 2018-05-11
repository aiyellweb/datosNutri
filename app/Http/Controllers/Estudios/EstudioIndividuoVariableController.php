<?php

namespace App\Http\Controllers\Estudios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Estudios\estudios;
use App\Estudios\estudioGalpones;
use App\Estudios\EstudioGrupoVariable;
use App\Estudios\estudioGalponEndividuos;
use App\Estudios\EstudioIndividuoVariable;
use App\Variable;
use App\parametrizacion\galpon;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Storage;

class EstudioIndividuoVariableController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function ListGalponesIndividuos($id){

        $galponeEstudio = estudioGalpones::where('estudio_galpon_id', $id)->first();
        $galpon = galpon::where('galpone_id', $galponeEstudio->fk_galpone_id)->first();
        $individuos = EstudioIndividuoVariable::with('animal','granja','GrupoVariable','Variable')->where('fk_estudio_galpon_id',$id)->get();

        return view('individuos.index',[
            'name' => $galpon->sistema_produccion,
            'individuos' => $individuos
        ]);
    }

    public function UpdateIndividuo(Request $request){
     
     
        $urlImage = "";

        if (is_numeric($request->fk_individio_id) && is_numeric($request->fk_grupo_variable_id) && $request->individuo_imagen) {

            if(Input::hasFile('individuo_imagen')){

                $file = Input::file('individuo_imagen');
                $name = "individuo-".uniqid().".".$file->getClientOriginalExtension();
                $file->move(public_path().'/imagenes/individuos/',$name);
                $urlImage = $name;
            }
            
            $update = EstudioIndividuoVariable::where('fk_individio_id', $request->fk_individio_id)
            ->where('fk_grupo_variable_id', $request->fk_grupo_variable_id)
            ->update([
                'variable_valor' => $request->variable_valor,
                'individuo_imagen' => $urlImage
            ]
        );

            if ($update) {
                
                return Redirect::to('estudio-galpon-individuos/'.$request->fk_estudio_galpon_id);
            }
        } 
    }
}
