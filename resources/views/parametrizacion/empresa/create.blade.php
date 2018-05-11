@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Nueva Empresa</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif
		
		{!!Form::open(array('url'=>'empresa','method'=>'POST','autocomplete'=>'off'))!!}
		{{Form::token()}}
		<div class="row" >
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6"">
				<label for="nombre">Empresa</label>
				<input type="text" name="fk_empresa_id" class="form-control">
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<label for="descripcion">razon social</label>
				<input type="text" name="razon_social" class="form-control" placeholder="razon social...">
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<label for="descripcion">nit</label>
				<input type="text" name="nit" class="form-control" placeholder="nit...">
			</div>
			
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<div id="valor" class="form-group">
					<label for="cliente">departamento</label>
					<select name="deparamento_id" id="pidcliente" v-model="departamento" @change="whenUserSelected" class="form-control selectpicker" data-live-search="true">
						<option >seleccione</option>
						@foreach($departamento as $key)
						<option value="{{$key->departamento_id}}">{{$key->departamento_nombre}}</option>
						@endforeach
					</select>
					<label>ciudades</label>
					<select name="municipio_id" id="pplaca" class="form-control">
						<option  v-for="ciu in ciudades"  v-bind:value="ciu.municipio_id">@{{ciu.municipio_nombre}}</option>
					</select>
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
			{!!Form::close()!!}
			
		</div>
	</div>
</div>
<script src="{{asset('js/vue.js')}}"></script>
<script src="{{asset('js/axios.min.js')}}"></script>
<script type="text/javascript">
	
new Vue({
el:"#valor",
data:{
	departamento:[],
	ciudades:[]
},
		methods:{
				whenUserSelected: function(){
				var that = this;
				axios.get('/ciudades/'+ that.departamento)
							.then(function (response) {
							that.ciudades = response.data;
							console.log('valor');
							})
							.catch(function (error) {
							console.log(error);
							});
						}

						,
					}
});
</script>
<script>
$('#liAlmacen').addClass("treeview active");
$('#liCategorias').addClass("active");
</script>
@endsection