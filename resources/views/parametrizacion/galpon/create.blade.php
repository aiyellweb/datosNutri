@extends ('layouts.admin')
@section ('contenido')
<style type="text/css">
#listadoColor1{
border:  solid #01DFD7;
background: rgb(230, 255, 230);
}
#trId{
background: #A9F5BC;
}
#hrId{
color: #58FA58;
font-size: 10px;
}
#DetalleID{
background: #E6E6E6;
}
#mdialTamanio{
width: 80% !important;
}
</style>
<div id="vista">
	<div class="row" >
		<div class="col-md-12" >
			<div class="panel panel-succes" id="DetalleID">
				<div class="panel-heading">
					<h1 class="panel-title"> <strong>{{$galponGranjaID->granja_nombre}}</strong></h1>
					<hr>
					<div class="row">
						<div class="col-lg-6 col-sm-4 col-md-4 col-xs-12">
							
							<label>Id</label>
							<p>{{$galponGranjaID->granja_id}}</p>
							<div class="form-group">
								<label>Razon Social</label>
								<p>{{$galponGranjaID->empresa->nombre_empresa}}</p>
							</div>
							<div class="form-group">
								<label>Nit</label>
								<p>{{$galponGranjaID->empresa->nit}}</p>
							</div>
							
						</div>
						
						<div class="col-lg-2 col-sm-4 col-md-4 col-xs-12">
							<div class="form-group">
								<label>Municipio</label>
								<p>{{$galponGranjaID->empresa->municipio->municipio_nombre}}</p>
							</div>
							<div class="form-group">
								<label>Departamento</label>
								<p>{{$galponGranjaID->empresa->departamento->departamento_nombre}}</p>
							</div>
							<div class="form-group">
								<label>Pais</label>
								<p>Colombia</p>
							</div>
						</div>
					</div>
					<br>
				</div>
				
				
				
			</div>
		</div>
	</div>
	<hr>
	////
	<h1 v-if="estudio1">Crear Estudio :{{$granjaListado->granja_nombre}} </h1>
	<div v-if="estudio1" >
		{!!Form::open(array('url'=>'estudio','method'=>'POST','autocomplete'=>'on','files'=>'true'))!!}
		{{Form::token()}}
		<input type="hidden" name="fk_empresa_id" value="{{$empresasListado->empresa_id}}" >
		<input type="hidden" name="fk_granja_id" value="{{$granjaListado->granja_id}}" >
		<div class="row">
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="nombre">Empresa</label>
					<input type="text" name="empresa"   class="form-control" readonly  value="{{$empresasListado->nombre_empresa}}">
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="descripcion">Granja</label>
					<input type="text" name="granja_nombre"  class="form-control" readonly  value="{{$granjaListado->granja_nombre}}" >
				</div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
				<div class="form-group">
					<label>Animal</label>
					<select name="fk_animal_id_estudio" class="form-control "  data-live-search="true">
						<option value="0">Seleccione una opción</option>
						@foreach($animal as $key)
						<option value="{{$key->animal_id}}">{{$key->animal_nombre}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-lg-2 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="descripcion">Numero de animales Estudio</label>
					<input type="number" name="estudio_num_animales"  class="form-control" placeholder="Digite numero " >
				</div>
			</div>
			<div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="descripcion">Estudio</label>
					<input type="text" name="estudio"  class="form-control" placeholder="Digite Estudio " >
				</div>
			</div>
			<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
				<div class="form-group">
					<label for="cantidad">Grupo Variables</label>
					{!!Form::select('fk_grupo_variable_id[]',$grupoVariable,null,['class' => 'form-control', 'multiple' => 'multiple'])!!}
				</div>
			</div>
		</div>
		
		<hr>
		<!-- Acccion  con botones
		<div  class="row">
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
								<h3>
									<a href="#">
												<button  v-if="estudioGalpones2" class="btn btn-success" v-on:click="Galponmostrar()" >Nuevo Estudio Galpon</button>
									</a>
									<a href="" target="_blank"></a>
								</h3>
								<h3>
									<a href="#">
												<button  v-if="estudioGalpones3" class="btn btn-warning" v-on:click="GalponCerrar()" >Cerrar</button>
									</a>
									<a href="" target="_blank"></a>
								</h3>
					</div>
		</div>
		-->
		<!--  antiguo vuejs  	<div v-if="estudioGalpones1" >-->
		<h1 v-if="estudioGalpones1">Crear Estudio Galpon</h1>
		<div class="row">
			<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
				<div class="form-group">
					<label for="num_comprobante">Empresa</label>
					<input type="text" name="num_comprobante" readonly   value="{{$empresasListado->nombre_empresa}}" class="form-control">
				</div>
			</div>
			<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
				<div class="form-group">
					<label for="num_comprobante">Granja</label>
					<input type="text" name="num_comprobante" readonly   value="{{$granjaListado->granja_nombre}}" class="form-control" >
				</div>
			</div>
		</div>
		<div class="row">
			<div class="panel panel-primary">
				<div class="panel-body">
					<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
						<div class="form-group">
							<label>Galpon</label>
							<select class="form-control " id="galponId" data-live-search="true">
								<option value="0">Seleccione una opción</option>
								@foreach($galponIndividuos as $key)
								<option value="{{$key->galpone_id}}">{{$key->sistema_produccion}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
						<div class="form-group">
							<label for="cantidad">Lineas Animal</label>
							<select id="lineaId" class="form-control">
								<option value="0">Seleccione una opción</option>
								@foreach($animalLinea as $key)
								<option value="{{$key->linea_id}}">{{$key->linea_nombre}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
						<div class="form-group">
							<label for="stock">Semanas</label>
							<input type="number" id="semana" class="form-control" placeholder="Semanas">
						</div>
					</div>
					<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
						<div class="form-group">
							<label>Sexo</label>
							<select id="genero" class="form-control" data-live-search="true">
								<option value="0">Seleccione una opción</option>
								<option value="HEMBRA">HEMBRA</option>
								<option value="MACHOS">MACHO</option>
							</select>
						</div>
					</div>
					<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
						<div class="form-group">
							<label>Lote</label>
							<input type="text" id="lote" class="form-control" placeholder="Digite lote">
						</div>
					</div>
					<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
						<div class="form-group">
							<button type="button" onclick="return AgregarItemTable()" class="btn btn-primary">Agregar</button>
						</div>
					</div>
					<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
						<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
							<thead style="background-color:#A9D0F5">
								<th>Opciones</th>
								<th>Galpon</th>
								<th>lineas</th>
								<th>semana</th>
								<th>Sexo</th>
								<th>Lote</th>
							</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
			<div class="form-group"  class="text-center">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button  v-if="estudio3" class="btn btn-danger" v-on:click="estudioCerrar()" >Cancelar</button>
			</div>
		</div>
	</div>
	<!-- cierre antiguo </div> -->
	{!!Form::close()!!}
</div>
<hr>
<div  class="row">
	<div class="col-md-12">
		<h3>
		<a href="#">
			<button  v-if="estudio2" class="btn btn-success" v-on:click="ListadoEstudiomostrar()" >Crear Estudio</button>
		</a>
		<a href="" target="_blank"></a>
		</h3>
		@php
		use App\Estudios\estudioGalpones;
		$estudioGalpon = estudioGalpones::where('fk_empresa_id',$empresasListado->empresa_id)
		->where('fk_granja_id',$granjaListado->granja_id)
		->get();
		@endphp
		
		
		<div class="row">
			<div class="col-md-12">
				<h1>Estudios  de la Granja : <strong>{{$granjaListado->granja_nombre}}</strong> </h1>
			</div>
			
		</div>
		@if(count($estudioGalpon) > 0)
		
		
		
		
		
		
		<div class="table-responsive">
			<table class="table table-bordered table-striped"  id="estudios" >
				<thead id="trId">
					<th>Id</th>
					<th>Granja</th>
					<th>Galpon</th>
				</thead>
				<tbody>
					@foreach($estudioGalpon as $estudio)
					<tr class="info">
						<td>{{$estudio->galpon->galpone_id}}</td>
						<td>{{$estudio->granja->granja_nombre}}</td>
						<td>
							{!!link_to_route('estudio-galpon-individuos', $title = $estudio->galpon->sistema_produccion,
							$parameters = $estudio->estudio_galpon_id, $attributes = ['class' => '']);
							!!}
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		
		@endif
		
	</div>
</div>
<hr>
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Galpones</h3>
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
		<h3>
		<a href="#">
			<button  v-if="listado1" class="btn btn-success" v-on:click="mostrarListado()" >Nuevo</button>
		</a>
		<a href="" target="_blank"></a>
		</h3>
		<h3>
		<a href="#">
			<button  v-if="listado2" class="btn btn-warning" v-on:click="CerrarListado()" >Cerrar</button>
		</a>
		<a href="" target="_blank"></a>
		</h3>
	</div>
</div>
<h1 v-if="listado">Crear Galpon + </h1>
<div id="listadoColor1"  v-if="listado" >
	{!!Form::open(array('url'=>'galpon','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
	{{Form::token()}}
	<input type="hidden" name="fk_empresa_id" value="{{$empresasListado->empresa_id}}" >
	<input type="hidden" name="fk_granja_id" value="{{$granjaListado->granja_id}}" >
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="nombre">Empresa</label>
				<input type="text" name="empresa"   class="form-control" readonly  value="{{$empresasListado->nombre_empresa}}">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="descripcion">Granja</label>
				<input type="text" name="granja_nombre"  class="form-control" readonly  value="{{$granjaListado->granja_nombre}}" >
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="descripcion">Ambiente</label>
				<input type="text" name="tipo_ambiente"  class="form-control" placeholder="Digite tipo de Ambiente" >
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="descripcion">Sistema de Produccion</label>
				<input type="text" name="sistema_produccion"  class="form-control" placeholder="Digite Sistema Produccion" >
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
		</div>
	</div>
	{!!Form::close()!!}
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	@include('flash::message')
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-bordered table-striped">
				<thead id="trId">
					<th>Id</th>
					<th>Empresa</th>
					<th>Granja</th>
					<th>Sistema Produccion</th>
					<th>Tipo Ambiente</th>
					<th>Acciones</th>
				</thead>
				@foreach($listadoGalpon as $key)
				<tr class="info" >
					<td>{{$key->galpone_id}}</td>
					<td>{{$key->empresa->nombre_empresa}}</td>
					<td>{{$key->granja->granja_nombre}}</td>
					<td>{{$key->sistema_produccion}}</td>
					<td>{{$key->tipo_ambiente}}</td>
					<td>
						<a href=""><button class="btn btn-info">Edit</button></a>
						<!--  <a href="" data-target="#modal-delete-idTabien" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>-->
					</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>
</div>
@stop
@section('scripts')
<script type="text/javascript">
	
		$(document).ready(function() {
		$('#estudios').DataTable({
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
<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
<script src="{{asset('js/vue.js')}}"></script>
<script type="text/javascript">
	new Vue({
		el:"#vista",
		data:{
			/// primer bloque de galpon
			listado:false,
			listado1:true,
			listado2:false,
			//// primer bloque de estudio granja
			estudio1:false,
			estudio2:true,
			estudio3:false,
			//// segundo bloque de estudio galpon
			estudioGalpones1:false,
			estudioGalpones2:true,
			estudioGalpones3:false,
			///// fin bloque
			/// variables control  create
			crear:0,
			variables:false,
			var2:true,
			var3:false,
			/// variables estudio granja
			variablesEstudio:false,
			var2Estudio:true,
			var3Estudio:false,
			/// variables estudio galpones
			variablesGalpon:false,
			var2Galpon:true,
			var3Galpon:false,
			botongalpon:false,
		},
	methods:{
		//// bloque galpones
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
		}, //// bloque estudio
		ListadoEstudiomostrar(){
			this.estudio1=true;
			this.estudio2=false;
			this.estudio3=true;
		},
		Estudiomostrar(){
			this.variablesGalpon=true;
			this.var2Estudio=true;
			this.var3Estudio=false;
		},
		estudioCerrar(){
			this.estudio1=false;
			this.estudio2=true;
			this.estudio3=false;
		},
		/// bloque  Estudio Galpon
		Galponmostrar(){
			this.estudioGalpones1=true;
			this.estudioGalpones2=false;
			this.estudioGalpones3=true;
			this.botongalpon=true;
		},
		Galpovariablesnmostrar(){
			this.variablesEstudio=true;
			this.var2Galpon=true;
			this.var3Galpon=false;
		},
		GalponCerrar(){
			this.estudioGalpones1=false;
			this.estudioGalpones2=true;
			this.estudioGalpones3=false;
			this.botongalpon=false;
			IdsGalpon = [];
		},
	}
});
var count = 0;
var IdsGalpon = [];
function AgregarItemTable(){
	IdGalpon = $('#galponId').val();
	GalponTxt = $('#galponId option:selected').text();
	idLinea= $('#lineaId').val();
	LineaTxt = $('#lineaId option:selected').text();
	Semana = $('#semana').val();
	Genero = $('#genero').val();
	Lote = $('#lote').val();
	if ((!Number(IdGalpon)) && (Number(IdGalpon) == 0)) {
		alert('Debe seleccionar un galpon');
		$('#galponId').focus();
		return false;
	}
	if ((!Number(idLinea)) && (Number(idLinea) == 0)) {
		alert('Debe seleccionar una linea animal');
		$('#lineaId').focus();
		return false;
	}
	if ((!Number(Semana)) && (Number(Semana) == 0)) {
		alert('Debe digitar un número de semanas valido (numerico)');
		$('#semana').focus();
		return false;
	}
	if ((!Number(Genero)) && (Number(Genero) == 0)) {
		alert('Debe seleccionar un genero');
		$('#genero').focus();
		return false;
	}
	if (($('#lote').val().length <= 1)) {
		alert('Lo sentimos, debe ingresar un lote valido, minimo de 2 caracteres');
		$('#lote').focus();
		return false;
	}
	var row = '<tr class="selected" id="fila'+count+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+count+');">X</button></td><td><input type="hidden" name="galpones[]" value="'+IdGalpon+'"><p>'+GalponTxt+'</p></td><td><input type="hidden" name="lineas[]" value="'+idLinea+'"><p>'+LineaTxt+'</p></td><td><input type="hidden" name="semanas[]" value="'+Semana+'"><p>'+Semana+'</p></td><td><input type="hidden" name="generos[]" value="'+Genero+'"><p>'+Genero+'</p></td><td><input type="hidden" name="lotes[]" value="'+Lote+'"><p>'+Lote+'</p></td></tr>';
	IdsGalpon.push(IdGalpon);
	count++;
	UpdateDropdown();
	limpiar();
	$('#detalles').append(row);
}
function UpdateDropdown(){
		
	/*
	if (IdsGalpon.indexOf($('#galponId').val()) !== -1) {
		alert('Lo sentimos, ya existe el galpon seleccionado, intente con otro');
		$('#galponId').val(0);
		$('#galponId').focus();
		return false;
	}
	*/
	$('#galponId option:selected').remove();
}
function limpiar(){
	IdGalpon = $('#galponId').val(0);
	idLinea= $('#lineaId').val(0);
	Semana = $('#semana').val('');
	Genero = $('#genero').val(0);
	Lote = $('#lote').val('');
}
function eliminar(index){
	$("#fila" + index).remove();
}
$('#liVentas').addClass("treeview active");
$('#liVentass').addClass("active");
$('#liAlmacen').addClass("treeview active");
$('#liCategorias').addClass("active");
</script>
@endsection