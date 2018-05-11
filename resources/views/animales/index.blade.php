@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Animales <a href="{{Route('animal.create')}}"><button class="btn btn-success">Nuevo</button></a> <a href="" target="_blank"></a></h3>
	</div>
</div>
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
					<th>Descripcion Animal</th>
					<th>Opciones</th>
				</thead>
				@foreach($animal as $key)
				
				<tr class="info">
					<td>{{$key->animal_id}}</td>
					<td>{{$key->animal_nombre}}</td>
					<td>{{$key->animal_descripcion}} </td>>
					<td>
						<a href="{{Route('animal.edit',$key->animal_id)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$key->animal_id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('parametrizacion.animal.modal')
				@endforeach
				
			</table>
		</div>
		
	</div>
</div>
@push ('scripts')
<script>
$('#liAlmacen').addClass("treeview active");
$('#liCategorias').addClass("active");
</script>
@endpush
@endsection