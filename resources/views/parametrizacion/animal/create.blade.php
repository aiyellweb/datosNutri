@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Nueva Animal</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif
		
		{!!Form::open(array('url'=>'animal','method'=>'POST','autocomplete'=>'off'))!!}
		{{Form::token()}}
		<div class="row" >
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6"">
				<label for="nombre">Nombre Animal </label>
				<input type="text" name="animal_nombre" class="form-control" placeholder="Nombre empresa...">
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<label for="descripcion">descripcion Animal</label>
				<input type="text" name="animal_descripcion" class="form-control" placeholder="razon social...">
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
						},
					}
});
</script>
<script>
$('#liAlmacen').addClass("treeview active");
$('#liCategorias').addClass("active");
</script>
@endsection