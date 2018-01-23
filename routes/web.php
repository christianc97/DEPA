<?php

Route::Auth();

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//descargar programas de la carpeta storage
Route::get('/programas/{programa}', function ($programa) {

     $file = './programas/'.$programa;

      return Response::download($file);

});

Route::get('/', function () {
    return view('auth/login');
});

//endpoint tiempos todos los puntos cruz verde(para front mu)
Route::get('api/tiempospuntos', function () {
  $puntos = DB::connection('mu_domicilios')->select('select p.nombre as name, p.direccion as address, p.direccion2 as address2, p.zone, p.scheduleLabel, p.lat, p.long, p.schedule, p.cityId from puntos p');
   return json_encode($puntos);
});

//endpoint asociar una direccion a grupo elite
Route::get('/puntosAsociados/{id}', function ($id) {
  $infogroup = DB::connection('reportesmensajeros')->select('select id, id_grupo, nombre_grupo, nombre_punto from grupoelite_puntos where id_grupo = '.$id);
    return $infogroup;
});

//endpoint eliminar el direccion asociada a grupo elite
Route::get('/eliminar/puntosAsociados/{id}', function ($id) {
  DB::connection('reportesmensajeros')->delete("DELETE FROM grupoelite_puntos WHERE id = ".$id);
});

//servicios vistos mensajeros... añadir auth
Route::get('/api/serviciosvistos/{id}', function ($id) {
  
    $vistos = DB::connection('mensajeros')->select('select d.id_resource, r.nombre, d.datacreate, d.round from dispacher_process_task d 
      left join recursos r on r.tbl_users_id = d.id_resource
      where d.id_status = 2 and  d.task_id = '.$id.' order by d.datacreate asc');
    return $vistos;
        
});

//endpoint cruz verde(para front mu) por mu_ref...
Route::get('api/tiempospuntos/{id}', function ($id) {
  $puntos = DB::connection('mu_domicilios')->select('select p.nombre as name, p.direccion as address, p.direccion2 as address2, p.zone, p.scheduleLabel,  p.lat, p.long, p.schedule, p.cityId, p.empresa_id from puntos p where p.empresa_id in (select e.id from empresa e where e.mu_ref = '.$id.' )');

  foreach ($puntos as $punto) {
    $punto->latLon = array($punto->long, $punto->lat);
    $punto->schedule = explode(',', $punto->schedule);
  }

   return json_encode($puntos);
});

//endpoint eliminar punto tabla de la vista domicilios/show.blade.php
Route::get('/eliminar/puntosdomicilios/{id}', function ($id) {
    DB::connection('mu_domicilios')->delete("DELETE FROM puntos WHERE id = ".$id);
});

//endpoint consulta servicios por ciudad
Route::get('/TodosServiciosEntregadosAppciudad/{id}', function($id){
    $por_ciudad = DB::connection('mensajeros')->select('select t.id, t.fecha_inicio, t.hora_inicio, (select count(*) from dispacher_process_task d where d.task_id = t.id) llegaron_al_app, c.nombre from task t 
      left join ciudad c on c.id = t.ciudad_id
      where t.estado = 2 and t.ciudad_id = '.$id);
    return $por_ciudad;
});

//endpoint consulta servicios todas las ciudades
Route::get('/Todos-Servicios-Entregados-App', function(){
    $todas_ciudades = DB::connection('mensajeros')->select('select t.id, t.fecha_inicio, t.hora_inicio, (select count(*) from dispacher_process_task d where d.task_id = t.id) llegaron_al_app from task t where t.estado = 2');
    return $todas_ciudades;
});

//endpoint asignar equipo a un usuario(mediante select)
Route::get('/asignar/equipos/{userid}/{equipoid}', function($userid, $equipoid){

  $fecha_asignacion = date('Y-m-d H:i:s');
  $asignador = Auth::id();

  $asignar = DB::connection('reportesmensajeros')->insert("insert into users_equipos(users_id, equipos_id, fecha_asignacion, asignador)values ($userid, $equipoid,'$fecha_asignacion',$asignador)");
});

//endpoint asignar diadema a un equipo(mediante select)
Route::get('/asignar/diademas/{diademaid}/{equipoid}', function($diademaid, $equipoid){

  $fecha_asignacion = date('Y-m-d H:i:s');
  $asignador = Auth::id();

  $asignar = DB::connection('reportesmensajeros')->insert("insert into equipos_diademas(diademas_id, equipos_id, fecha_asignacion, asignador)values ($diademaid , $equipoid, '$fecha_asignacion', $asignador)");
});

Route::resource('reportes/reportesServiciosFinalizados', 'reporteServiciosFinalizadosController');
Route::resource('reportes/reportesAdmin', 'reporteAdminController');
Route::resource('reportes/reportesChia', 'ServActivChiaController');
Route::resource('reportes/recibir', 'pruebaController');
Route::resource('reportes/reportesHoraJuego', 'HorasJuegoController');
Route::resource('reportes/horasJuego', 'mostrarHorasJuegoController');
Route::resource('reportes/reportesMovimientosCliente', 'reportesMovimientoClienteController');
Route::resource('reportes/reportesAjustesNegativos', 'reportesAjustesNegativosController');
Route::resource('reportes/ajustesNegativos', 'ajustesNegativosController');
Route::resource('reportes/reportesTotalServicios', 'reportesTotalServiciosController');
Route::resource('reportes/totalServicios', 'totalServiciosController');
Route::resource('usuario', 'UserController');
Route::resource('reportes/reportesTotalServiciosChia', 'reportesTotalServiciosChiaController');
Route::resource('reportes/reportesListadoMensajeros', 'reportesListadoMensajerosController');
Route::resource('reportes/reportesAppVersiones', 'reportesAppVersionesController');
Route::resource('reportes/trackMensajero', 'trackMensajeroController');
Route::resource('permisos', 'PermisosController');
Route::resource('lista/usuarios-permisos', 'ListaPermisosUsuariosController');
Route::resource('reportes/reportesTotalServiciosPersonas', 'reportesTotalServiciosPersonaController');
Route::resource('perfil', 'PerfilController');
Route::resource('reportes/reportesVistasTask', 'VistasTaskController');
Route::resource('reportes/vistasTask', 'VistasTaskController');
Route::resource('reportes/GruposElite', 'GruposEliteController');
Route::resource('reportes/comercialAsignado', 'ComercialAsociadoController');
Route::resource('reportes/ServiciosEntregados', 'ServiciosVistosController');
Route::resource('reportes/serviciosSinFinalizar', 'ServiciosSinFinalizarController');
Route::resource('asignarEquipos', 'asignarEquiposController');
Route::resource('asignarEquipos/equipos', 'asignarEquiposController');
Route::resource('equipos', 'EquiposController');
Route::resource('domicilios', 'DomiciliosUrbanosController');
Route::resource('domicilios/empresa', 'verEmpresasController');
Route::resource('domiciliosUsuarios', 'DomiciliosUsuariosController');
Route::resource('domiciliosPuntos', 'DomiciliosPuntosController');
Route::resource('puntosdomicilios/mapa', 'MapaPuntosDomiciliosController');
Route::resource('/descargar-programas', 'DescargarJitsiController');
/*diademas*/
Route::resource('diademasList', 'DiademasController');
Route::resource('asignardiademas', 'AsignarDiademasController');
//Route::resource('asignardiademas/diademasAsignar', 'AsignarDiademasController');
Route::resource('asignardiademas/diademas', 'AsignarDiademasController');
/**/
Route::resource('reportes/pagosDaviplata', 'PagosDaviplataController');
Route::resource('reportes/Todos-Servicios-Entregados-App', 'TodosServiciosEntregadosApp');
Route::resource('reporteEquipos/extensiones', 'JitsiEquiposUsuariosController');

Route::post('diademas/show', 'DiademasController@agregarDescripcion');
Route::post('reportes/reportesServiciosFinalizados', 'reporteServiciosFinalizadosController@exportarServiciosFinalizados');
Route::post('reportes/reportesAdmin', 'reporteAdminController@exportarAdmin');
Route::post('reportes/reportesChia', 'ServActivChiaController@activacionChia');
Route::post('reportes/reportesHoraJuego', 'HorasJuegoController@reporteTiemposHJ');
Route::post('reportes/reportesMovimientosClientes', 'reportesMovimientoClienteController@exportarMovimientosCliente');
Route::post('reportes/reportesAjustesNegativos', 'reportesAjustesNegativosController@exportarAjustesNegativos');
Route::post('reportes/reportesTotalServicios', 'reportesTotalServiciosController@exportarTotalServicios');
Route::post('reportes/reportesTotalServiciosChia', 'reportesTotalServiciosChiaController@exportarTotalServiciosChia');
Route::post('reportes/reportesListadoMensajeros', 'reportesListadoMensajerosController@exportarListadoMensajeros');
Route::post('reportes/trackMensajero', 'trackMensajeroController@track');
Route::post('reportes/reportesTotalServiciosPersonas', 'reportesTotalServiciosPersonaController@exportarTotalServiciosPersonas');
Route::post('equipos/show', 'EquiposController@agregarDescripcion');
Route::post('puntosdomicilios/mapa', 'MapaPuntosDomiciliosController@clientes');
Route::post('domicilios/crearUsuario', 'DomiciliosUrbanosController@usersDomicilios');
Route::post('domicilios/tiempos', 'DomiciliosUrbanosController@tiempos');
Route::post('domicilios/editNombrePunto', 'DomiciliosUrbanosController@editNombrePunto');
Route::post('reportes/puntosgrupos', 'GruposEliteController@puntosgrupos');
Route::post('domicilios/crearPuntos', 'DomiciliosUrbanosController@crearPuntos');
Route::post('/domicilios/buscarDireccion', 'DomiciliosUrbanosController@buscarDireccion');
Route::post('/domicilios/buscarDireccion', 'DomiciliosUrbanosController@buscarDireccion');
Route::post('storage/create', 'StorageController@save');
Route::post('reportes/trackMensajeroExport', 'ExcelController@exportarTrackMensajero');

Route::match(array('GET', 'POST'), 'reportes/trackMensajero/{id_mensajero?}', array('uses' => 'trackMensajeroController@track'));





