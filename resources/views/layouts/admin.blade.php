<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nutritec SAS</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">
    <link rel="stylesheet"  href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
    <style type="text/css">
    
    
    </style>
  </head>
  <body class="hold-transition skin-green-light sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="{{url('home')}}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>Nutritec</b>V</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Nutritec</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <small class="bg-red">Online</small>
                  <span class="hidden-xs">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    
                    <p>
                      klan1
                      <small>klan1@klan1.com</small>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div class="pull-right">
                      <a href="{{Route('logout')}}" class="btn btn-default btn-flat">Cerrar Sesión</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar"  id="sideTocar" >
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar"  id="texto-side" >
          <!-- Sidebar user panel -->
          
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            
            <li id="liEscritorio">
              <a href="{{url('home')}}">
                <i class="fa fa-dashboard"></i> <span>Escritorio</span>
              </a>
            </li>
            <li id="liAlmacen" class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Parametrizacion</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li id="liArticulos"><a href="{{Route('empresa.index')}}"><i class="fa fa-circle-o"></i> Empresas</a></li>
                <!-- <li id="liCategorias"><a href="{{Route('granja.index')}}"><i class="fa fa-circle-o"></i>granjas</a></li>
                <li id="liCategorias"><a href="{{Route('galpon.index')}}"><i class="fa fa-circle-o"></i>galpones</a></li>-->
                <li id="liCategorias"><a href="{{Route('animal.index')}}"><i class="fa fa-circle-o"></i>Animales</a></li>
                <li id="liCategorias"><a href="{{Route('gruposVariables.create')}}"><i class="fa fa-circle-o"></i>Grupo Variables</a></li>
              </ul>
            </li>
            <li id="liAlmacen" class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i>
                <span>Estudios</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li id="liArticulos"><a href="{{Route('empresa.index')}}"><i class="fa fa-circle-o"></i>Estudio</a></li>
                
              </ul>
            </li>
            <!--
            <li id="liCompras" class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>x</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li id="liIngresos"><a href=""><i class="fa fa-circle-o"></i> x</a></li>
                <li id="liProveedores"><a href=""><i class="fa fa-circle-o"></i> x</a></li>
              </ul>
            </li>
            <li id="liVentas" class="treeview">
              <a href="#">
                <i class="fa fa-shopping-cart"></i>
                <span>x</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li id="liVentass"><a href=""><i class="fa fa-circle-o"></i> x</a></li>
                <li id="liClientes"><a href=""><i class="fa fa-circle-o"></i> x</a></li>
              </ul>
            </li>
            -->
            
            <li id="liAcceso" class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Acceso</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li id="liUsuarios"><a href="{{Route('user.index')}}"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                
              </ul>
            </li>
            <!--
            <li>
              <a href="" target="_blank">
                <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
            <li>
              <a href="">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li>
            -->
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Sistema de Nutritec</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">
                      <!--Contenido-->
                      @yield('contenido')
                      <!--Fin Contenido-->
                    </div>
                  </div>
                  
                </div>
                </div><!-- /.row -->
                </div><!-- /.box-body -->
                </div><!-- /.box -->
                </div><!-- /.col -->
                </div><!-- /.row -->
                </section><!-- /.content -->
                </div><!-- /.content-wrapper -->
                <!--Fin-Contenido-->
                <footer class="main-footer">
                  <div class="pull-right hidden-xs">
                    <b>Version</b> 1.0
                  </div>
                  <strong>Copyright &copy; 2018-2020 <a href="">Klan1</a>.</strong> Todos los derechos reservados
                </footer>
                
                <!-- jQuery 2.1.4 -->
                
                <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
                <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
                <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.2/js/jquery.dataTables.js"></script>
                <script type="text/javascript">
                $(document).ready(function(){
                $('#empresa').DataTable({
                dom: 'Bfrtip',
                buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                "language":{
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
                },
                "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
                }
                });
                });
                </script>
                <!--
                <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.2/js/jquery.dataTables.js"></script>-->
                <!-- Bootstrap 3.3.5 -->
                <script src="{{asset('js/bootstrap.min.js')}}"></script>
                <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
                <!-- AdminLTE App -->
                <script src="{{asset('js/app.min.js')}}"></script>
                @yield('scripts')
              </body>
            </html>