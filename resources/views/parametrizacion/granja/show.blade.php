@extends ('layouts.admin')
@section ('contenido')
    <div class="row">
  
    	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
    		<div class="form-group">
    			<label>GRANJA</label>
    			<p>{!! $dataGranja->granja_nombre !!}</p>
    		</div>
    	</div>
    	<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
            <div class="form-group">
                <label for="empresa">Empresa</label>
                <p>{!!$dataGranja->empresa->nombre_empresa !!}</p>
            </div>
        </div>
    
    </div>

    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-body">            

                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                        <thead style="background-color:#A9D0F5">
                            
                            <th>ID</th>
                            <th>GRANJA</th>
                            <th>Empresa</th>
                            <th>Departamento</th>
                            <th>Ciudad</th>
                        </thead>
                        @foreach($granja as $key)
                        <tfoot>
                            
                            <th>{{$key->granja_id}}</th>
                            <th>{{$key->granja_nombre}}</th>
                            <th>{{$key->nombre_empresa}}</th>
                            <th>{{$key->departamento_nombre}}</th>
                            <th><h4>{{$key->municipio_nombre}}</h4></th>  
                        </tfoot>
                       @endforeach
                       
                   
                    </table>
                 </div>
            </div>
        </div>
    	
    </div>   


@endsection