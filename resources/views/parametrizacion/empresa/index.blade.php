@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Empresas <a href="{{Route('empresa.create')}}"><button class="btn btn-success">Nuevo</button></a> <a href="" target="_blank"></a></h3>

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
					<th>Nombre</th>
					<th>Razon social</th>
					<th>Departamento</th>
					<th>Municipio</th>
					<th>Opciones</th>
				</thead>
                 @foreach($dataEmpresa as $key)
              
				<tr class="info">
					<td><a href="{{Route('granja.create',["idempresa"=> $key->empresa_id])}}">{{$key->empresa_id}}</a></td>
					<td><a href="{{Route('granja.create',["idempresa"=> $key->empresa_id])}}">{{$key->nombre_empresa}}</a></td>
					<td><a href="{{Route('granja.create',["idempresa"=> $key->empresa_id])}}">{{$key->razon_social}}</a> </td>
					<td><a href="{{Route('granja.create',["idempresa"=> $key->empresa_id])}}">{{$key->departamento_nombre}}</a></td>
					<td>{{$key->municipio_nombre}} </td>
					<td>
						<a href="{{Route('empresa.edit',$key->empresa_id)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$key->empresa_id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
			@include('parametrizacion.empresa.modal')
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