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
			<h3>Linea geneticas</h3>
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
	<h1 v-if="listado">Crear linea Animal </h1>
	<div id="listadoColor1"  v-if="listado" >
		{!!Form::open(array('url'=>'animallineas','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
		{{Form::token()}}
		
		<input type="hidden" name="idanimalCreateGrupo" value="{{$grupoAnimales->animal_grupo_id}}" >
		<input type="hidden" name="idanimal" value="{{$grupoAnimales->fk_animal_id}}" >
		
		<div class="row">
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="nombre">Grupo Animal</label>
					<input type="text"  class="form-control" readonly  value="{{$grupoAnimales->grupo_nombre}}">
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="descripcion">Animal</label>
					<input type="text"  class="form-control"  readonly value="{{ $grupoAnimales->animal->animal_nombre}}" >
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="descripcion">Linea Nombre</label>
					<input type="text" name="linea_nombre" class="form-control" >
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="descripcion">Linea Descripcion</label>
					<input type="text" name="linea_descripcion" class="form-control">
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
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table id="empresa" class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Nombre Animal</th>
						<th>Grupo Animal</th>
						<th>linea nombre</th>
						<th>linea Descripcion</th>
						<th>Acciones</th>
					</thead>
					@foreach($valores as $key)
					
					<tr class="info" >
						<td><a href="{{Route('lineapeso.create',['lineaId'=>$key->linea_id])}}">{{$key->linea_id}}</a></td>
						<td><a href="{{Route('lineapeso.create',['lineaId'=>$key->linea_id])}}"> {{$key->animal->animal_nombre}}</a></td>
						<td><a href="{{Route('lineapeso.create',['lineaId'=>$key->linea_id])}}">{{$key->animalGrupos->grupo_nombre}}</a></td>
						<td><a href="{{Route('lineapeso.create',['lineaId'=>$key->linea_id])}}">{{$key->linea_nombre}}</a></td>
						<td><a href="{{Route('lineapeso.create',['lineaId'=>$key->linea_id])}}">{{$key->linea_descripcion}}</a></td>
						<td>
							<a href="{{Route('gruposAnimal.edit',$key->linea_id)}}"><button class="btn btn-info">Edit</button></a>
							<!--  <a href="" data-target="#modal-delete-idTabien" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>-->
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
<script>
$('#liAlmacen').addClass("treeview active");
$('#liCategorias').addClass("active");
</script>
@endsection