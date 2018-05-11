@extends ('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Editar animal: {{$animal->animal_nombre}} </h3>
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        {!!Form::model($animal,['method'=>'PATCH','route'=>['animal.update',$animal->animal_id]])!!}
        {{Form::token()}}
        
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
            <div class="form-group">
                <label for="nombre">Animal nombre</label>
                <input type="text" name="animal_nombre" class="form-control" value="{!!$animal->animal_nombre!!}" placeholder="NIt">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
            <div class="form-group">
                <label for="nombre">Animal descripcion</label>
                <input type="text" name="animal_descripcion" class="form-control" value="{!!$animal->animal_descripcion!!}" placeholder="Nombre empresa...">
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