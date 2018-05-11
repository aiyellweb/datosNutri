@extends ('layouts.admin')
@section ('contenido')
<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <h3>Editar empresa: {{$data2->nombre_empresa}} </h3>
    @if (count($errors)>0)
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
    @endif
    {!!Form::model($data2,['method'=>'PATCH','route'=>['empresa.update',$data2->empresa_id]])!!}
    {{Form::token()}}
    <input type="hidden" name="id" value="{!!$data2->empresa_id!!}">
    <input type="hidden" name="fk_municipio" value="{!!$data2->municipio->municipio_id!!}">
    <input type="hidden" name="fk_departamento" value="{!! $data2->departamento->departamento_id!!}">
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
      <div class="form-group">
        <label for="nombre">Nit</label>
        <input type="text" name="nit" class="form-control" value="{!!$data2->nit!!}" placeholder="NIt">
      </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
      <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre_empresa" class="form-control" value="{!!$data2->nombre_empresa!!}" placeholder="Nombre empresa...">
      </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
      <div class="form-group">
        <label for="descripcion">Descripción</label>
        <input type="text" name="razon_social" class="form-control" value="{!!$data2->razon_social !!}" placeholder="Descripción...">
      </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
      <div id="valor" class="form-group">
        <label for="cliente">departamento</label>
        <select name="deparamento_id" id="pidcliente" v-model="departamento" @change="whenUserSelected" class="form-control selectpicker" >
          <option >seleccione</option>
          @foreach($departamento as $key)
          @if($key->departamento_id==$data2->fk_departamento_id)
          <option value="{{$key->departamento_id}}" selected>{{$key->departamento_nombre}}></option>
          @else
          <option value="{{$key->departamento_id}}">{{$key->departamento_nombre}}</option>
          @endif
          @endforeach
        </select>
        
        <label>ciudades</label>
        <select name="municipio_id" id="pplaca" class="form-control">
          <option  v-for="ciu in ciudades"  v-bind:value="ciu.municipio_id">@{{ciu.municipio_nombre}}</option>
        </select>
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
    <script src="{{asset('js/vue.js')}}"></script>
    <script src="{{asset('js/axios.min.js')}}"></script>
    <script type="text/javascript">
    
    new Vue({
    el:"#valor",
    data:{
    departamento:[],
    ciudades:[]
    },
    methods:{
    whenUserSelected: function(){
    var that = this;
    axios.get('/ciudades/'+ that.departamento)
    .then(function (response) {
    that.ciudades = response.data;
    console.log('valor');
    })
    .catch(function (error) {
    console.log(error);
    });
    },
    }
    });
    </script>
    <script>
    $('#liAlmacen').addClass("treeview active");
    $('#liCategorias').addClass("active");
    </script>
    @endsection