@php

use App\variablesAnimal;
$info = variablesAnimal::with('animal')->where('variable_id', '=' ,$individuo->fk_variables_id)->first();
@endphp
<div class="row">
	<div class="col-md-6">
		<strong>Macro: </strong>{{$info->variables_macro}}
	</div>
	<div class="col-md-6">
		<strong>Variable Nombre: </strong>{{$info->variable_nombre}}
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<strong>Variable descripción: </strong>{{$info->variable_descripcion}}
	</div>
	<div class="col-md-6">
		<strong>Index G: </strong>{{$info->index_g}}
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<strong>Min: </strong>{{$info->variable_min}}
	</div>
	<div class="col-md-6">
		<strong>Max: </strong>{{$info->variable_max}}
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<strong>Ir operador: </strong>{{$info->ir_operador}}
	</div>
	<div class="col-md-6">
		<strong>Calificación operador: </strong>{{$info->calificacion_operador}}
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<strong>Ir tolerancia: </strong>{{$info->ir_tolerancia}}
	</div>
	<div class="col-md-6">
		<strong>Calificación tolerancia: </strong>{{$info->calificacion_tolerncia}}
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<strong>Variable max programacion: </strong>{{$info->variable_max_prog}}
	</div>
	<div class="col-md-6">
		<strong>Calificacion text pos: </strong>{{$info->calificacion_texto_pos}}
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<strong>Calificacion text neg: </strong>{{$info->calificacion_texto_neg}}
	</div>
	<div class="col-md-6">
		<strong>Calificacion operador: </strong>{{$info->operacion_resultado}}
	</div>
</div>
<div class="row" style="margin-top: 20px">
	<div class="col-md-12">
		{!!Html::image(url('/imagenes/guias').'/'.$info->variables_apoyo_visual, null, ['width' => '100%'])!!}
	</div>
</div>