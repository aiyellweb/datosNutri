<?php

namespace App\Http\Controllers;

use App\Http\Requests\usuariosRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios= User::all();
        
        return view('usuarios.index',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
      return view('usuarios.create');
  }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(usuariosRequest $request)
    {
          //dd($request->all());
        $user =  new user();
        if($request->input('rol')=='Seleccione'){
            
           $user->name=$request->input('name');
           $user->email=$request->input('email');
           $user->password=bcrypt($request->get('password'));
           $user->apellidos=$request->input('apellidos');
           $user->cedula=$request->input('cedula');
           $user->rol="user";
           $user->save();
       }   

       $user->name=$request->input('name');
       $user->email=$request->input('email');
       $user->password=bcrypt($request->get('password'));
       $user->apellidos=$request->input('apellidos');
       $user->cedula=$request->input('cedula');
       $user->rol=$request->input('rol');
       $user->save();

       return Redirect::to('/user');






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
        $user= User::find($id);

        return view('usuarios.edit',compact('user'));
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
        $user = User::find($id);
        $user->password=bcrypt($request->get('password'));
        $user->update($request->all());
        return Redirect::to('/user');

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
