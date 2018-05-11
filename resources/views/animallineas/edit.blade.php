@extends ('layouts.admin')
@section ('contenido')
<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <h3>Editar Grupo animal: {{$gruposAnimalesID->animal->grupo_nombre}} </h3>
    @if (count($errors)>0)
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
    @endif
    {!!Form::model($gruposAnimalesID,['method'=>'PATCH','route'=>['animallineas.update',$gruposAnimalesID->animal_grupo_id]])!!}
    {{Form::token()}}
    <input type="hidden" name="grupo_animal_id" value="{{$gruposAnimalesID->fk_animal_id}}">
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
      <div class="form-group">
        <label for="nombre">Animal Nombre</label>
        <input type="text" name="animal_nombre" class="form-control" readonly value="{{$gruposAnimalesID->animal->animal_nombre}}" placeholder="NIt">
      </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
      <div class="form-group">
        <label for="nombre">Nombre grupo Animal</label>
        <input type="text" name="grupo_nombre" class="form-control" value="{{$gruposAnimalesID->grupo_nombre}}" placeholder="Nombre empresa...">
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