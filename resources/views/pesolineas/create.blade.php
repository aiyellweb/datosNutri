@extends ('layouts.admin')
@section ('contenido')
<style type="text/css">
  
  #listadoColor1{
    border:  solid rgb(255, 153, 204);
    background: rgb(230, 255, 230);
  }
</style>
<div id="vista">
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <h3> Animal Grupo Linea Peso</h3>
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
  <h1 v-if="listado">Crear Variables </h1>
  <div id="listadoColor1"  v-if="listado" >
    {!!Form::open(array('url'=>'lineapeso','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
    {{Form::token()}}
    <input type="hidden" name="idAnimalLinea"  readonly  value="{{$linea->linea_id}}" >
    
    <div class="row">
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
          <label for="nombre">Animal Linea</label>
          <input type="text"   name="animal_linea" class="form-control"  readonly  value="{{$linea->linea_nombre}}">
        </div>
      </div>
      
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
          <div class="form-group">
            <label>Peso Genero</label>
            <select name="peso_genero" class="form-control">
              <option value="HEMBRA">Hembra</option>
              <option value="MACHOS">Machos</option>
            </select>
          </div>
          
        </div>
      </div>
      <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
        <div class="form-group">
          <label for="descripcion">Peso semana</label>
          <input type="number" id="panimal"  name="peso_semana" class="form-control">
        </div>
      </div>
      
      <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
        <div class="form-group">
          <label for="descripcion">Peso min</label>
          <input type="number" id="panimal"  name="peso_min" class="form-control">
        </div>
      </div>
      <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
        <div class="form-group">
          <label for="descripcion">Peso max</label>
          <input type="number" id="panimal"  name="peso_max" class="form-control">
        </div>
      </div>
      <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
        <div class="form-group">
          <label for="descripcion">Peso promedio</label>
          <input type="number" id="panimal"  name="peso_prom" class="form-control">
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
            <th>Peso Genero</th>
            <th>Linea Animal</th>
            <th>Peso Semana</th>
            <th>Peso Min</th>
            <th>Peso Max</th>
            <th>Peso Promedio</th>
            
            
            <th>Accion</th>
          </thead>
          
          @foreach($peso as $key)
          <tr class="info" >
            <td><a href="#" >{{ $key->peso_id}}</td>
            <td><a href="#">{{$key->animalLinea->linea_nombre}}</td>
            <td><a href="#">{{$key->peso_semana}}</td>
            <td><a href="#">{{$key->peso_min}}</td>
            <td><a href="#">{{$key->peso_min}}</td>
            <td><a href="#">{{$key->peso_max}}</td>
            <td><a href="#">{{$key->peso_prom}}</td>
            
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
  <hr>
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