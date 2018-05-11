<?php


use App\User;
//use  App\regional\Municipio;
use App\parametrizacion\empresa;
use App\parametrizacion\departamento;
use App\parametrizacion\municipio;


Route::get('/', function () {
  return view('auth.login');
});



 /* 
DB::listen(function($query){
  echo "<pre>{$query->sql}</pre>";
});*/


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('index',function(){
  return view('prueba');
});

//rutas empresa

Route::get('/empresa',function(){
  
  return view('user.index');

});




/// fin ruta empresa




//  ruta test 

Route::get('/test',function(){

  $user = new User();
  $user->id=1;
  $user->name="Klan1";
  $user->email="klan1@klan1.com";
  $user->password=bcrypt('12345678');
  $user->save();

});


Route::get('/truncate',function(){
 DB::statement('SET FOREIGN_KEY_CHECKS = 0');
 municipio::truncate();

});


///// fin ruta test


///combo dinamico///

Route::get('/ciudades/{id}',function($id){
 
  
  $ciudades=DB::select('SELECT m.municipio_id, d.departamento_nombre,m.municipio_nombre
   from municipio as m
   inner JOIN departamento as d
   on m.fk_departamento_id= d.departamento_id
   where  d.departamento_id='.$id.'');
  return $ciudades; 

});


Route::get('/empresaGranjas/{id}',function($id){

 $galpones=DB::select('SELECT em.empresa_id,em.nombre_empresa,gra.granja_nombre,gra.granja_id
  from empresa as em
  inner JOIN empresa_granjas as gra
  on gra.fk_empresa_id=em.empresa_id
  where em.empresa_id='.$id.'
  ');

 return $galpones;


});

Route::get('/editcombo/{id}','parametrizacion\empresaController@EditCombo');

Route::get('/testdata/{id}','parametrizacion\empresaController@galpon');


// frin combo dinamico 



////  Rutas modulo parametrizacion   tipo Resources//

Route::resource('empresa','parametrizacion\empresaController');
Route::get('/updateEmpresa/{id}/{nombre}','parametrizacion\empresaController@edit');
Route::resource('granja','parametrizacion\granjaController');
Route::resource('galpon','parametrizacion\galponController');
Route::resource('animal','parametrizacion\animalController');

Route::resource('gruposAnimal','Animales\AnimalesController');
Route::resource('animallineas','Animales\AnimalLineasController');
Route::resource('animalGrupovariable','Animales\AnimalVariableController');
Route::resource('user','UserController');
Route::resource('variable','VariableController');
Route::resource('lineapeso','lineapesoController');
//// 
Route::resource('varialesgrupos','VariablesGruposVarialesController');
Route::resource('gruposVariables','GrupoVariablesController');

Route::resource('estudio','Estudios\EstudiosController');

Route::get('estudio-galpon-individuos/{id}', [
  'as' => 'estudio-galpon-individuos', 
  'uses' => 'Estudios\EstudioIndividuoVariableController@ListGalponesIndividuos'
]);

Route::post('store/individuo', [
  'as' => 'store/individuo', 
  'uses' => 'Estudios\EstudioIndividuoVariableController@UpdateIndividuo'
]);

Route::put('updateGranja/{$id}',[
 'as'=>'updateGranja',
 'uses'=>'parametrizacion\granjaController@granjaIdit'
]);






/// Fin rutas parametrizacion



Route::get('logout','Auth\LoginController@logout');