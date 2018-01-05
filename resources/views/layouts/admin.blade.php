<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>DP</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
        <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
        <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">
        <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
        <link rel="stylesheet" href="{{asset('css/coverStyles.css')}}">
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        @if (!(empty(Auth::user()->fecha_finalizacion_contrato)))
            <div class="site-wrapper">
              <div class="site-wrapper-inner">
                <div class="cover-container">
                  <main role="main" class="inner cover">
                    <h1 class="cover-heading">Ops! Ya no tienes acceso</h1>
                    <p class="lead">
                        Al parecer ya no tienes acceso al sistema de reportes debido a que ya no trabajas con nosotros, si esto no es correcto comunicate con nosotros.
                        <p></p>
                        <a href="mailto:j.contreras@mensajerosurbanos.com" target="_blank" style="font-size: 15px" class="escribenos">Escribenos <i class="fa fa-comment-o" aria-hidden="true"></i></a>
                    </p>
                    <p class="lead">
                      <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-lg btn-secondary">Salir</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                    </p>
                  </main>
                  <footer class="mastfoot">
                    <div class="inner">
                      <strong>Copyright &copy; 2017 <a href="https://mensajerosurbanos.com/">Mensajeros urbanos</a>.</strong> All rights reserved.
                    </div>
                  </footer>
                </div>
              </div>
            </div>
        @else             
                    
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="/home" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>R</b>ep</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>DP </b><h5 class="beta"><b>(beta)</b></h5> </span>
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
                            @if (Auth::guest())
                            @else 
                            <li class="dropdown user user-menu">
                            @if (!(empty(Auth::user()->fecha_finalizacion_contrato)))
                            @else
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-male" aria-hidden="true"></i> <span class="hidden-xs">{{Auth::user()->nombre1}} {{Auth::user()->apellido1}}</span>
                                </a>
                            @endif
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <a href="{{asset('perfil')}}" >
                                            perfil
                                        </a>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">

                                        <div class="pull-right">
                                            <a href="{{ route('logout') }}" class="btn btn-default btn-flat"
                                               onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            @endif
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->

                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        @if (!(empty(Auth::user()->fecha_finalizacion_contrato)))
                        @else
                        <li class="header"><i class="fa fa-laptop"></i>
                       
                            <span>REPORTES</span>
                            </li>
                        @endif
                        @foreach(Permisos() as $p)
                        
                        
                            @if(! empty($p->permisos_id ==1))
                        <li id="reportes-reportesServiciosFinalizados"><a href="{{asset('reportes/reportesServiciosFinalizados')}}"><i class="fa fa-long-arrow-right"></i>Servicios finalizados mensajero</a></li>
                        @endif

                        @if(! empty($p->permisos_id ==2))
                        <li id="reportes-reportesAdmin"><a href="{{asset('reportes/reportesAdmin')}}"><i class="fa fa-long-arrow-right"></i> Reporte admin</a></li>
                        @endif

                        @if(! empty($p->permisos_id ==12))
                        <li id="usuario"><a href="{{asset('/usuario')}}"><i class="fa fa-long-arrow-right"></i> Personal</a></li>
                        @endif

                      
                        @if(! empty($p->permisos_id ==3))
                        <li id="reportes-reportesHoraJuego"><a href="{{asset('reportes/reportesHoraJuego')}}"><i class="fa fa-long-arrow-right"></i>Horas de juego</a></li>
                        @endif

                        @if(! empty($p->permisos_id ==4))
                        <li id="reportes-reportesMovimientosCliente"><a href="{{asset('reportes/reportesMovimientosCliente')}}"><i class="fa fa-long-arrow-right"></i>Movimientos cliente</a></li>
                        @endif

                        @if(! empty($p->permisos_id ==5))
                        <li id="reportes-reportesTotalServicios"><a href="{{asset('reportes/reportesTotalServicios')}}"><i class="fa fa-long-arrow-right"></i>Reportes servicios Empresa</a></li>
                        @endif

                        @if(! empty($p->permisos_id ==16))
                        <li id="reportes-reportesTotalServiciosPersonas"><a href="{{asset('reportes/reportesTotalServiciosPersonas')}}"><i class="fa fa-long-arrow-right"></i>Reportes servicios Persona</a></li>
                        @endif 

                        @if(! empty($p->permisos_id ==6))
                        <li id="reportes-reportesListadoMensajeros"><a href="{{asset('reportes/reportesListadoMensajeros')}}"><i class="fa fa-long-arrow-right"></i>Listado de mensajeros</a></li>
                        @endif

                        @if(! empty($p->permisos_id ==7))
                        <li id="reportes-reportesAppVersiones"><a href="{{asset('reportes/reportesAppVersiones')}}"><i class="fa fa-long-arrow-right"></i>App versiones</a></li>
                        @endif

                        @if(! empty($p->permisos_id ==8))
                        <li id='reportes-trackMensajero'><a href="{{asset('reportes/trackMensajero')}}"><i class="fa fa-long-arrow-right"></i>Track mensajero</a></li>
                        @endif

                        @if(! empty($p->permisos_id ==17))
                        <li id='reportes-reportesVistasTask'><a href="{{asset('reportes/reportesVistasTask')}}"><i class="fa fa-long-arrow-right"></i>Vistas Task</a></li>
                        @endif

                        @if(! empty($p->permisos_id ==18))
                        <li id='equipos'><a href="{{asset('/equipos')}}"><i class="fa fa-long-arrow-right"></i>Equipos</a></li>
                        @endif
                        @if(! empty($p->permisos_id ==24))
                        <li id='diademas'><a href="{{asset('/diademasList')}}"><i class="fa fa-long-arrow-right"></i>Diademas</a></li>
                        @endif
                         @if(! empty($p->permisos_id == 26))
                        <li id='GruposElite'><a href="{{asset('/reportes/GruposElite')}}"><i class="fa fa-long-arrow-right"></i>Grupos Elite</a></li>
                        @endif
                         @if(! empty($p->permisos_id == 27))
                        <li id='comercialAsignado'><a href="{{asset('/reportes/comercialAsignado')}}"><i class="fa fa-long-arrow-right"></i>Comercial Asignado</a></li>
                        @endif
                        @if(! empty($p->permisos_id == 29))
                        <li id='serviciosEntregados'><a href="{{asset('/reportes/ServiciosEntregados')}}"><i class="fa fa-long-arrow-right"></i>Servicios Entregados App</a></li>
                        @endif
                        @if(! empty($p->permisos_id == 30))
                        <li id='serviciosSinFinalizar'><a href="{{asset('/reportes/serviciosSinFinalizar')}}"><i class="fa fa-long-arrow-right"></i>Servicios Sin Finalizar</a></li>
                        @endif
                        @if(! empty($p->permisos_id == 31))
                        <li id='permisos-Asignados'><a href="{{asset('/lista/usuarios-permisos')}}"><i class="fa fa-long-arrow-right"></i>Permisos Asignados</a></li>
                        @endif
                        @if(! empty($p->permisos_id == 32))
                        <li id='pagos-daviplata'><a href="{{asset('reportes/pagosDaviplata')}}"><i class="fa fa-long-arrow-right"></i>Pagos Daviplata </a></li>
                        @endif
                         @if(! empty($p->permisos_id == 33))
                        <li id='todos-servicios-app'><a href="{{asset('reportes/Todos-Servicios-Entregados-App')}}"><i class="fa fa-long-arrow-right"></i>Servicios Entregados App Grupal</a></li>
                        @endif
                        @endforeach
                        
                         @foreach(Permisos() as $p)
                        @if(! empty($p->permisos_id ==19))
                        <li class="header"><i class="fa fa-laptop"></i>
                            <span>DOMICILIOS</span></li>
                        @endif 
                        
                        @if(! empty($p->permisos_id ==19))                        
                        <li id='domicilios'><a href="{{asset('/domicilios')}}"><i class="fa fa-long-arrow-right"></i>Empresas domicilios</a></li>
                        @endif   
                        
                        @if(! empty($p->permisos_id ==20))                        
                        <li id='domiciliosUsuarios'><a href="{{asset('/domiciliosUsuarios')}}"><i class="fa fa-long-arrow-right"></i>Usuarios domicilios</a></li>
                        @endif
                        
                        @if(! empty($p->permisos_id ==21))
                        <li id='domiciliosPuntos'><a href="{{asset('/domiciliosPuntos/')}}"><i class="fa fa-long-arrow-right"></i>Puntos domicilios</a></li>

                        @endif

                        @if(! empty($p->permisos_id == 25))
                        <li id='domiciliosPuntos'><a href="{{asset('/puntosdomicilios/mapa')}}"><i class="fa fa-long-arrow-right"></i>Mapa Puntos domicilios</a></li>
                        @endif
                        
                       
                        @endforeach

                        @foreach(Permisos() as $p)
                        @if(! empty($p->permisos_id ==9))
                        <li class="header"><i class="fa fa-laptop"></i>
                            <span>REPORTES CHIA</span></li>
                        <li id="reportes-reportesChia"><a href="{{asset('reportes/reportesChia')}}"><i class="fa fa-long-arrow-right"></i>Reportes activación</a></li>
                        @endif 

                        @if(! empty($p->permisos_id ==10))
                        <li id='reportes-reportesAjustesNegativos'><a href="{{asset('reportes/reportesAjustesNegativos')}}"><i class="fa fa-long-arrow-right"></i>Ajuste Negativos</a></li>
                        @endif

                        @if(! empty($p->permisos_id ==11))
                        <li id='reportes-reportesTotalServiciosChia'><a href="{{asset('reportes/reportesTotalServiciosChia')}}"><i class="fa fa-long-arrow-right"></i>Total servicios chía </a></li>
                        @endif
                        @endforeach
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
                                    @yield('titulo')
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!--Contenido-->

                                            @yield('content')
                                            <!--Fin Contenido-->
                                        </div>
                                    </div>

                                </div>
                            </div><!-- /.row -->
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </section>
            </div><!-- /.col -->
            <!-- /.content -->
        </div><!-- /.content-wrapper -->
        <!--Fin-Contenido-->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Versión</b> 0.1.0
            </div>
            <strong>Copyright &copy; 2017 <a href="https://mensajerosurbanos.com/">Mensajeros urbanos</a>.</strong> All rights reserved.
        </footer>
        <!-- jQuery 2.1.4 -->
        <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('js/app.min.js')}}"></script>
        <script>
                   var r = location.pathname;
                   var splitted = r.split('/');
                   var liId = splitted[1] + '-' + splitted[2];
                   var liId2 = splitted[1];
                   $('#' + liId).addClass('active');
                   $('#' + liId2).addClass('active');
        </script>
        @endif
</body>
</html>
