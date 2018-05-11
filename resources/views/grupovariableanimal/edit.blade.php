@extends ('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Editar Grupo animal  Variable : {{$variable->animal->grupo_nombre}} </h3>
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        {!!Form::model($variable,['method'=>'PATCH','route'=>['animalGrupovariable.update',$variable->grupo_variable_id]])!!}
        {{Form::token()}}
        <input type="hidden" name="animal_id" value="{{$variable->fk_animal_id}}">
        <input type="hidden" name="variable_grupo_id" value="{{$variable->grupo_variable_id}}">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
            <div class="form-group">
                <label for="nombre">Animal Nombre</label>
                <input type="text" name="animal_nombre" class="form-control" readonly value="{{$variable->animal->animal_nombre}}" placeholder="NIt">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
            <div class="form-group">
                <label for="nombre">Nombre grupo Animal</label>
                <input type="text" name="grupo_nombre" class="form-control" value="{{$variable->grupo_nombre}}" placeholder="Nombre empresa...">
            </div>
        </div>
        
        
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                {!!Form::close()!!}
                
            </div>
        </div>
        <script>
        $('#liAlmacen').addClass("treeview active");
        $('#liCategorias').addClass("active");
        </script>
        @endsection