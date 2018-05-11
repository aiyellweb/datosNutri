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
			<h3>Grupo Variables Variables </h3>
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
	<h1 v-if="listado">Crear Variables de grupo </h1>
	<div id="listadoColor1"  v-if="listado" >
		{!!Form::open(array('url'=>'varialesgrupos','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
		{{Form::token()}}
		<input type="hidden" name="animalId" value="{{$animal->animal_id}}">
		<input type="hidden" name="variableId" value="{{$variables->variable_id}}">
		
		<div class="row">
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="descripcion">Variable Nombre</label>
					<input type="text" name="variable_nombre" class="form-control" readonly value="{{$variables->variable_nombre}}" >
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="descripcion">Animal</label>
					<input type="text" name="variable_nombre" class="form-control" readonly value="{{$animal->animal_nombre}}" >
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label> Grupo Variables</label>
					<select name="fk_grupo_variable_id" class="form-control">
						@foreach($listadoGrupoVariables as $key)
						<option value="{{$key->grupo_variable_id}}">{{$key->grupo_nombre}}</option>
						@endforeach
						
					</select>
				</div>
			</div>
			
			<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
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
						<th>Nombre Variables</th>
						<th>Acciones</th>
					</thead>
					
					
					<tr class="info" >
						<td><a href=""></a></td>
						<td><a href=""> </a></td>
						
						<td>
							<a href=""><button class="btn btn-info">Edit</button></a>
							<!--  <a href="" data-target="#modal-delete-idTabien" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>-->
						</td>
					</tr>
					
					
					
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