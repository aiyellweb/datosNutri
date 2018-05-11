@extends ('layouts.admin')
@section ('contenido')
<div class="row">
    
    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        <div class="form-group">
            <label>Tipo de Ambiente</label>
            <p>{!! $dataGranjas->tipo_ambiente !!}</p>
        </div>
    </div>
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
        <div class="form-group">
            <label for="sistema">Sistema de produccion</label>
            <p>{!!$dataGranjas->sistema_produccion!!}</p>
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
                        <th>Ambiente</th>
                        <th>Sistema de produccion</th>
                        <th>Nombre galpon</th>
                        <th>Empresa</th>
                        <th>Granja</th>
                        <th>Departamento</th>
                        <th>Ciudad</th>
                    </thead>
                    @foreach($dataShow as $key)
                    <tfoot>
                    
                    <th>{{$key->galpone_id}}</th>
                    <th>{{$key->tipo_ambiente}}</th>
                    <th>{{$key->sistema_produccion}}</th>
                    <th>{{$key->nombre_golpen}}</th>
                    <th>{{$key->nombre_empresa}}</th>
                    <th>{{$key->granja_nombre}}</th>
                    <th>{{$key->departamento_nombre}}</th>
                    <th>{{$key->municipio_nombre}}</th>
                    </tfoot>
                    @endforeach
                    
                    
                </table>
            </div>
        </div>
    </div>
    
</div>
@endsection