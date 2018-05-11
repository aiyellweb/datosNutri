@extends ('layouts.admin')
@section ('contenido')
<style type="text/css">
#listadoColor1{
border:  solid rgb(255, 153, 204);
background: rgb(230, 255, 230);
}
img {
position: absolute;
right: 200px;
margin: 0;
top: 0px;
width: 300px;
height: 200px;
display: none;
}
a:hover img {
display: block;
}
</style>
<div id="vista">
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <h3> Grupos de: <strong>{{$animal->animal_nombre}}</strong></h3>
      @if (count($errors)>0)
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
      @endif
    </div>
  </div>
  <div  class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
      <h3><a href="#"><button  v-if="listado1" class="btn btn-success" v-on:click="mostrarListado()" >Nuevo</button></a> <a href="" target="_blank"></a></h3>
      <h3><a href="#"><button  v-if="listado2" class="btn btn-warning" v-on:click="CerrarListado()" >Cerrar</button></a> <a href="" target="_blank"></a></h3>
    </div>
  </div>
  <h1 v-if="listado">Crear Grupo </h1>
  <div id="listadoColor1"  v-if="listado" >
    {!!Form::open(array('url'=>'gruposAnimal','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
    {{Form::token()}}
    <input type="hidden" name="idanimalCreateGrupo"  readonly  value="{{$animal->animal_id}}" >
    <div class="row">
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
          <label for="nombre">Animal </label>
          <input type="text"   name="animal_nombre" class="form-control"  readonly  value="{{$animal->animal_nombre}}">
        </div>
      </div>
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
          <label for="descripcion">Grupo Nombre</label>
          <input type="text" id="panimal"  name="grupo_nombre" class="form-control" placeholder="Grupo Nombre">
        </div>
      </div>
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
          <button class="btn btn-primary" type="submit">Guardar</button>
          <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
  {!!Form::close()!!}
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    @include('flash::message')
  </div>
  <div  class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="table-responsive">
        <table id="empresa" class="table table-striped table-bordered table-condensed table-hover">
          <thead>
            <th>Id</th>
            <th>Nombre Animal </th>
            <th>Descripcion Animal</th>
            <th>Accion</th>
          </thead>
          @foreach($animalConsulta as $key)
          
          <tr class="info" >
            <td><a href="{{Route('animallineas.create' ,['idAnimal'=>$animal->animal_id,'idGrupoAnimal'=>$key->animal_grupo_id])}}"> {{$key->animal_grupo_id}}</a></td>
            <td><a href="{{Route('animallineas.create' ,['idAnimal'=>$animal->animal_id,'idGrupoAnimal'=>$key->animal_grupo_id])}}">  {{$key->grupo_nombre}}</a></td>
            <td><a href="{{Route('animallineas.create' ,['idAnimal'=>$animal->animal_id,'idGrupoAnimal'=>$key->animal_grupo_id])}}">{{$key->animal->animal_nombre}}</a></td>
            <td>
              <a href="{{Route('animallineas.edit',$key->animal_grupo_id.'-'.$key->fk_animal_id)}}"><button class="btn btn-info ">Edit</button></a>
              <!-- <a href="" data-target="#modal-delete-idTabien" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>-->
            </td>
          </tr>
          
          @endforeach
          
        </table>
      </div>
      
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <h3>Variables  del :<strong>{{$animal->animal_nombre}}</strong></h3>
      @if (count($errors)>0)
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
      @endif
    </div>
  </div>
  <div  class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
      <h3><a href="#"><button  v-if="var2" class="btn btn-success" v-on:click="mostrarVariables()" >Nuevo</button></a> <a href="" target="_blank"></a></h3>
      <h3><a href="#"><button  v-if="var3" class="btn btn-warning" v-on:click="CerrarVariables()" >Cerrar</button></a> <a href="" target="_blank"></a></h3>
    </div>
  </div>
  <h1 v-if="variables">Crear Variables </h1>
  <div id="listadoColor1"  v-if="variables" >
    {!!Form::open(array('url'=>'animalGrupovariable','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
    {{Form::token()}}
    <input type="hidden" name="animalIDVariable"  readonly  value="{{$animal->animal_id}}" >
    <div class="row">
      <div class="col-lg-6 col-sm-2 col-md-2 col-xs-12">
        <div class="form-group">
          <label for="nombre">Animal </label>
          <input type="text"   name="animal_nombre" class="form-control"  readonly  value="{{$animal->animal_nombre}}">
        </div>
      </div>
      
      
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
          <div class="form-group">
            <label>Macro</label>
            <select name="variable_macro" class="form-control">
              <option value="Condicion Corporal">Condicion Corporal</option>
              <option value="Toxinas">Toxinas</option>
              <option value="Protozoarios">Protozoarios</option>
              <option value="Parasitismos">Parasitismos</option>
              <option value="Clostridium Perfringens">Clostridium Perfringens</option>
              <option value="inmunologia">inmunologia</option>
              
              
            </select>
          </div>
          
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
          <label for="descripcion"> Nombre</label>
          <input type="text" id="panimal"  name="variable_nombre" class="form-control">
        </div>
      </div>
      
      <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
          <label for="descripcion">Descripcion</label>
          <input type="text" id="panimal"  name="variable_descripcion" class="form-control">
        </div>
      </div>
      <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
        <div class="form-group">
          <label for="descripcion">Min</label>
          <input type="number" id="panimal"  name="variable_min" class="form-control">
        </div>
      </div>
      <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
        <div class="form-group">
          <label for="descripcion">Max</label>
          <input type="number" id="panimal"  name="variable_max" class="form-control">
        </div>
      </div>
      
      <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
        <div class="form-group">
          <label for="descripcion"> Base</label>
          <input type="numeric" id="panimal"  name="variables_base" class="form-control">
        </div>
      </div>
      
      <div class="col-lg-2 col-sm-4 col-md-4 col-xs-4">
        <div class="form-group">
          <label for="descripcion">Index G</label>
          <input type="number" id="index_g"  name="index_g" class="form-control">
        </div>
      </div>
      
      <div class="col-lg-2 col-sm-4 col-md-4 col-xs-4">
        <div class="form-group">
          <label for="descripcion">Ir operador</label>
          <select name="ir_operador" class="form-control">
            <option value=">="> >= </option>
            <option value="<="> <= </option>
            
          </select>
        </div>
      </div>
      <div class="col-lg-2 col-sm-4 col-md-4 col-xs-4">
        <div class="form-group">
          <label for="descripcion">calificacion operador </label>
          <select name="calificacion_operador" class="form-control">
            <option value=">="> >= </option>
            <option value="<="> <= </option>
            
          </select>
        </div>
      </div>
      
      <div class="col-lg-2 col-sm-4 col-md-4 col-xs-4">
        <div class="form-group">
          <label for="descripcion">Ir tolerancia</label>
          <input type="text"  name="ir_tolerencia" class="form-control">
        </div>
      </div>
      <div class="col-lg-2 col-sm-4 col-md-4 col-xs-4">
        <div class="form-group">
          <label for="descripcion">Calificacion tolerancia</label>
          <input type="text"  name="calificacion_tolerencia" class="form-control">
        </div>
      </div>
      <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
        <div class="form-group">
          <label for="descripcion">Variable max programacion</label>
          <input type="text"  name="variable_max_pro" class="form-control">
        </div>
      </div>
      <div class="col-lg-2 col-sm-4 col-md-4 col-xs-4">
        <div class="form-group">
          <label for="descripcion">calificacion text pos</label>
          <input type="text"  name="calificacion_texto_pos" class="form-control">
        </div>
      </div>
      <div class="col-lg-2 col-sm-4 col-md-4 col-xs-4">
        <div class="form-group">
          <label for="descripcion">calificacion text neg</label>
          <input type="text"  name="calificacion_texto_neg" class="form-control">
        </div>
      </div>
      <div class="col-lg-2 col-sm-4 col-md-4 col-xs-4">
        <div class="form-group">
          <label for="descripcion">calificacion operador</label>
          <select name="operacion_resultado" class="form-control">
            <option value="sum"> Suma </option>
            <option value="avg"> Promedio </option>
            <option value="none">NA</option>
            
          </select>
        </div>
      </div>
      
      
      <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
        <div class="form-group">
          <label for="descripcion">Adjuntar Apoyo</label>
          <input type="file" name="imagen" class="form-control">
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
          <button class="btn btn-primary" type="submit">Guardar</button>
          <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
  {!!Form::close()!!}
  <br>
  <div  class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="table-responsive">
        <table id="empresa1" class="table table-striped table-bordered table-condensed table-hover">
          <thead>
            
            <th>Nombre Animal </th>
            <th>Macro</th>
            <th>Nombre Variable</th>
            <th>Min</th>
            <th>Mx</th>
            <th>Base</th>
            <th>Sentido</th>
            <th>Apoyo</th>
            <th>Accion</th>
          </thead>
          
          @foreach($variables as $key)
          <tr class="info" >
            <td><a href="{{Route('varialesgrupos.create',['animalId'=>$key->fk_animal_id,'variablesId'=>$key->variable_id])}}">{{$key->animal->animal_nombre}}</td>
            <td><a href="#">{{$key->variables_macro}}</td>
            <td><a href="#">{{$key->variable_nombre}}</td>
            <td><a href="#">{{$key->variable_min}}</td>
            <td><a href="#">{{$key->variable_max}}</td>
            <td><a href="#">{{$key->variables_base}}</td>
            <td><a href="#">{{$key->variables_base_sentido}}</td>
            <td> <a href="#"> <img src="{{asset('imagenes/guias/'. $key->variables_apoyo_visual)}}">Apoyo</a></td>
            <td>
              <a href=""><button class="btn btn-info ">Edit</button></a>
              <!-- <a href="" data-target="#modal-delete-idTabien" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>-->
            </td>
          </tr>
          
          @endforeach
          
        </table>
      </div>
      
    </div>
  </div>
</div>
<script src="{{asset('js/vue.js')}}"></script>
<script src="{{asset('js/axios.min.js')}}"></script>
<script type="text/javascript">
new Vue({
el:"#vista",
data:{
listado:false,
listado1:true,
listado2:false,
crear:0,
variables:false,
var2:true,
var3:false,
},
methods:{
mostrarListado(){
this.listado=true;
this.listado1=false;
this.listado2=true;
},
CerrarListado(){
this.listado=false;
this.listado2=false;
this.listado1=true;
},
mostrarVariables(){
this.variables=true;
this.var2=false;
this.var3=true;
},
CerrarVariables(){
this.variables=false;
this.var2=true;
this.var3=false;
}
}
});
</script>
<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.2/js/jquery.dataTables.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$('#empresa1').DataTable({
dom: 'Bfrtip',
buttons: [
'copy', 'csv', 'excel', 'pdf', 'print'
],
"language":{
"sProcessing":     "Procesando...",
"sLengthMenu":     "Mostrar _MENU_ registros",
"sZeroRecords":    "No se encontraron resultados",
"sEmptyTable":     "Ningún dato disponible en esta tabla",
"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
"sInfoPostFix":    "",
"sSearch":         "Buscar:",
"sUrl":            "",
"sInfoThousands":  ",",
"sLoadingRecords": "Cargando...",
"oPaginate": {
"sFirst":    "Primero",
"sLast":     "Último",
"sNext":     "Siguiente",
"sPrevious": "Anterior"
},
"oAria": {
"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
"sSortDescending": ": Activar para ordenar la columna de manera descendente"
}
}
});
});
</script>
@endsection