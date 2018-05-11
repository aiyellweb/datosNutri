@extends ('layouts.admin')
@section ('contenido')
<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <h3>Editar Grupo animal  Variables : {{$variable->animal->animal_nombre}} </h3>
    @if (count($errors)>0)
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
    @endif
    {!!Form::model($variable,['method'=>'PATCH','route'=>['variable.update',$variable->variables_id]])!!}
    {{Form::token()}}
    <input type="hidden" name="animal_id" value="{{$variable->fk_animal_id}}">
    <input type="hidden" name="variable_grupo_id" value="{{$variable->fk_grupo_variable_id}}">
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
      <div class="form-group">
        <label for="nombre">Animal Nombre</label>
        <input type="text" name="animal_nombre" class="form-control" readonly value="{{$variable->animal->animal_nombre}}" placeholder="NIt">
      </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
      <div class="form-group">
        <label for="nombre">Nombre grupo Animal Variable </label>
        <input type="text" name="grupo_nombre" class="form-control"  readonly  value="{{$variable->AnimalVariable->grupo_nombre}}" placeholder="Nombre empresa...">
      </div>
    </div>
    
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
      <div class="form-group">
        <div class="form-group">
          <label>Macro</label>
          <select name="variable_macro" class="form-control">
            <option value="Condicion Corporal">Condicion Corporal</option>
            <option value="Toxinas">Toxinas</option>
            <option value="Protozoarios">Protozoarios</option>
          </select>
        </div>
        
      </div>
    </div>
    
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
      <div class="form-group">
        <label for="descripcion">Variable Nombre</label>
        <input type="text" id="panimal"  name="variable_nombre" class="form-control" value="{{$variable->variable_nombre}}">
      </div>
    </div>
    
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
      <div class="form-group">
        <label for="descripcion">Variable Descripcion</label>
        <input type="text" id="panimal"  name="variable_descripcion" class="form-control" value="{{$variable->variable_descripcion}}">
      </div>
    </div>
    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
      <div class="form-group">
        <label for="descripcion">Variable Min</label>
        <input type="numeric" id="panimal"  name="variable_min" class="form-control" value="{{$variable->variable_min}}">
      </div>
    </div>
    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
      <div class="form-group">
        <label for="descripcion">Variable Max</label>
        <input type="numeric" id="panimal"  name="variable_max" class="form-control" value="{{$variable->variable_max}}">
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