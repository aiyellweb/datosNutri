@extends ('layouts.admin')
@section ('contenido')
<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <h3>Editar galpon: {{$galpon->sistema_produccion}} </h3>
    @if (count($errors)>0)
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
    @endif
    {!!Form::model($galpon,['method'=>'PATCH','route'=>['galpon.update',$galpon->galpone_id]])!!}
    {{Form::token()}}
    
    
    
    <div class="row" >
      <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12"">
        <label for="nombre">Tipo Ambiente</label>
        <input type="text" name="tipo_ambiente" class="form-control" value="{{$galpon->tipo_ambiente}}">
      </div>
      <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12"">
        <label for="nombre">Sistema de produccion</label>
        <input type="text" name="sistema_produccion" class="form-control" value="{{$galpon->sistema_produccion}}" placeholder="Nombre produccion...">
      </div>
      
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
        <div id="valor" class="form-group">
          <label for="cliente">empresa</label>
          <select name="fk_empresa_id" id="pidcliente" v-model="empresa" @change="whenUserSelected" class="form-control selectpicker" data-live-search="true">
            <option >seleccione</option>
            @foreach($empresa as $key)
            <option value="{{$key->empresa_id}}">{{$key->nombre_empresa}}</option>
            @endforeach
          </select>
          <label>granjas</label>
          <select name="fk_granja_id"  class="form-control">
            <option  v-for="ciu in granjas"  v-bind:value="ciu.granja_id">@{{ciu.granja_nombre}}</option>
          </select>
        </div>
      </div>
      
      <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        <div id="valor" class="form-group">
          <button class="btn btn-primary" type="submit">Guardar</button>
          <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>
      </div>
      {!!Form::close()!!}
      
    </div>
  </div>
  <script src="{{asset('js/vue.js')}}"></script>
  <script src="{{asset('js/axios.min.js')}}"></script>
  <script type="text/javascript">
  
  new Vue({
  el:"#valor",
  data:{
  empresa:[],
  granjas:[]
  },
  methods:{
  whenUserSelected: function(){
  var that = this;
  axios.get('/empresaGranjas/'+ that.empresa)
  .then(function (response) {
  that.granjas = response.data;
  console.log(that.granjas);
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