@extends ('layouts.admin')
@section ('contenido')
<style type="text/css">
	
	#listadoColor1{
		border:  solid rgb(255, 153, 204);
		background: rgb(230, 255, 230);
	}
#trId{
	background: #A9F5BC;
}
#hrId{
	color: #58FA58;
	font-size: 10px;
	}
</style>
<div id="vista">
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"  >
			<h3 >Individuos por Galpon (<strong>{{$name}}</strong>)</h3>
			<hr id="hrId">
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
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-bordered table-striped" id="individuosTable">
					<thead  id="trId" class="bg-success">
						<th>ID</th>
						<th>Animal</th>
						<th>Granja</th>
						<th>Grupo Variable</th>
						<th>Variable</th>
					</thead>
					<tbody>
						@foreach($individuos as $individuo)
						<tr class="info">
							<td>
								<a href="#" data-toggle="modal" data-target="#individuo{{$individuo->fk_individio_id}}{{$individuo->fk_variables_id}}">
									{{$individuo->fk_individio_id}}
								</a>
							</td>
							<td>{{$individuo->animal->animal_nombre}}</td>
							<td>{{$individuo->granja->granja_nombre}}</td>
							<td>{{$individuo->GrupoVariable->grupo_nombre}}</td>
							<td>{{$individuo->Variable->variable_nombre}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- MODAL -->
@foreach($individuos as $individuo)
<div class="modal fade" id="individuo{{$individuo->fk_individio_id}}{{$individuo->fk_variables_id}}" tabindex="1" role="dialog" aria-labelledby="User">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title text-center">
				Información del Individuo <strong>"{{$individuo->animal->animal_nombre}}"</strong>
				- Variable: #<b>{{$individuo->fk_variables_id}}</b>
				</h4>
			</div>
			<div class="modal-body">
				@include('individuos.show')
				{!!Form::open(['route'=>'store/individuo', 'method' => 'POST', 'enctype' => "multipart/form-data",'files' => true,'id' => 'form'])!!}
				<div class="row" style="margin-top: 30px">
					<div class="col-md-5">
						<div class="form-group">
							{!!Form::hidden('fk_individio_id', $individuo->fk_individio_id)!!}
							{!!Form::hidden('fk_grupo_variable_id', $individuo->fk_grupo_variable_id)!!}
							{!!Form::hidden('fk_estudio_galpon_id', $individuo->fk_estudio_galpon_id)!!}
							{!!Form::label('variable_valor','Variable Valor')!!}
							{!!Form::text('variable_valor',null, ['class' => 'form-control', 'id' => 'variable_valor',
							'placeholder' => 'Ingrese un valor'])
							!!}
						</div>
					</div>
					<div class="col-md-7">
						<div class="form-group">
							{!!Form::label('individuo_imagen','Imagen de estudio')!!}
							{!!Form::file('individuo_imagen',null, ['class' => 'form-control', 'id' => 'individuo_imagen'])!!}
						</div>
					</div>
				</div>
				{!!Form::close()!!}
			</div>
			<div class="modal-footer">
				<button type="submit" id="btnSend" class="btn btn-primary">
				Almacenar
				</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>
@endforeach
@endsection
@section('scripts')
<script>
	
	$(document).ready(function() {
	$('#individuosTable').DataTable({
"searching": true,
"language": {
"url": '//cdn.datatables.net/plug-ins/1.10.13/i18n/Spanish.json'
}
	});
	});
	$('#btnSend').click(function(){
		if (($('#variable_valor').val() == '') || (!Number($('#variable_valor').val()))) {
			alert('Lo sentimos, el campo variable valor es obligatorio y debe ingresar un valor númerico ');
			$('#variable_valor').focus();
			return false;
		}
		if ($('#individuo_imagen').val() == '') {
			alert('Lo sentimos, debe adjuntar una imagen');
			$('#individuo_imagen').focus()
			return false;
		}
		$('#form').submit();
	});
</script>
@stop