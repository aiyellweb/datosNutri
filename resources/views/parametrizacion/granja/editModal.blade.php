<div class="modal fade modal-slide-in-right" aria-hidden="true"
	role="dialog" tabindex="-1" id="modal-edit-{{$key->granja_id}}">
	{{Form::Open(array('action'=>array('parametrizacion\granjaController@update',$key->granja_id),'method'=>'PUT'))}}
	<input type="hidden" name="fk_empresa_id" value="{{$key->fk_empresa_id}}" >
	<div class="modal-dialog"  >
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
				aria-label="Close">
				<span aria-hidden="true"></span>
				</button>
				<h4 class="modal-title"> Accion Modificar</h4>
			</div>
			<div class="modal-body">
				<div class="box box-primary col-xs-12">
					
					<p>Confirme si desea Modificar la Granja <span><strong>{{$key->granja_nombre}}</strong></span></p>
					
					<br>
					<div class="form-group">
						<label for="nit_eps">Granja Nombre</label>
						<input type="text" name="granja_nombre" class="form-control"    value="{{$key->granja_nombre}}" >
					</div>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit"    class="btn btn-primary">Modificar</button>
				</div>
			</div>
		</div>
		{{Form::Close()}}
	</div>
</div>