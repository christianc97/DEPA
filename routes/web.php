<?php

Route::get('/', function () {
    return view('auth/login');
});

Route::get('api/tiempospuntos', function () {
  $puntos = DB::connection('mu_domicilios')->select('select p.nombre as name, p.direccion as address, p.direccion2 as address2, p.zone, p.scheduleLabel, p.lat, p.long, p.schedule, p.cityId from puntos p');
   return json_encode($puntos);
});
//Route::get('/findPuntoName', 'GruposEliteController@findPuntoName');

Route::get('/puntosAsociados/{id}', function ($id) {
  $infogroup = DB::connection('reportesmensajeros')->select('select id_grupo, nombre_grupo, nombre_punto from grupoelite_puntos where id_grupo = '.$id);
    return $infogroup;
});
Route::get('/eliminar/puntosAsociados/{id}', function ($id) {

    DB::connection('reportesmensajeros')->delete("DELETE FROM grupoelite_puntos WHERE id_grupo= ".$id);
  
});
//servicios vistos... añadir auth
Route::get('/api/serviciosvistos/{id}', function ($id) {
  
    $vistos = DB::connection('mensajeros')->select('select d.id_resource, r.nombre, d.datacreate, d.round from dispacher_process_task d 
      left join recursos r on r.tbl_users_id = d.id_resource
      where d.id_status = 2 and  d.task_id = '.$id);
    return $vistos;    
});

Route::get('api/user', function () {
    // Only authenticated users may enter...
  return 'hecho';
})->middleware('auth.basic.once');

Route::get('api/tiempospuntos/{id}', function ($id) {
  $puntos = DB::connection('mu_domicilios')->select('select p.nombre as name, p.direccion as address, p.direccion2 as address2, p.zone, p.scheduleLabel,  p.lat, p.long, p.schedule, p.cityId, p.empresa_id from puntos p where p.empresa_id in (select e.id from empresa e where e.mu_ref = '.$id.' )');

  foreach ($puntos as $punto) {
    $punto->latLon = array($punto->long, $punto->lat);
    $punto->schedule = explode(',', $punto->schedule);
  }

   return json_encode($puntos);
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
Route::resource('asignarEquipos', 'asignarEquiposController');
Route::resource('asignarEquipos/equipos', 'asignarEquiposController');
Route::resource('equipos', 'EquiposController');
Route::resource('domicilios', 'DomiciliosUrbanosController');
Route::resource('domicilios/empresa', 'verEmpresasController');
Route::resource('domiciliosUsuarios', 'DomiciliosUsuariosController');
Route::resource('domiciliosPuntos', 'DomiciliosPuntosController');
Route::resource('puntosdomicilios/mapa', 'MapaPuntosDomiciliosController');
Route::resource('/d', 'DescargarJitsiController');
/*diademas*/
Route::resource('diademased', 'DiademasController');
Route::resource('asignardiademas', 'AsignarDiademasController');
//Route::resource('asignardiademas/diademasAsignar', 'AsignarDiademasController');
Route::resource('asignardiademas/diademas', 'AsignarDiademasController');
/**/
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
Route::post('reportes/puntosgrupos', 'GruposEliteController@puntosgrupos');
Route::post('domicilios/crearPuntos', 'DomiciliosUrbanosController@crearPuntos');
Route::post('/domicilios/buscarDireccion', 'DomiciliosUrbanosController@buscarDireccion');
Route::post('/domicilios/buscarDireccion', 'DomiciliosUrbanosController@buscarDireccion');
Route::post('storage/create', 'StorageController@save');


/*export excel track*/
Route::post('reportes/trackMensajeroExport', 'ExcelController@exportarTrackMensajero');

/**/


Route::match(array('GET', 'POST'), 'reportes/trackMensajero/{id_mensajero?}', array('uses' => 'trackMensajeroController@track'));


Route::Auth();

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('formulario', 'StorageController@index');


Route::get('storage/{archivo}', function ($archivo) {
     $public_path = public_path();
     $url = $public_path.'/storage/'.$archivo;
     //verificamos si el archivo existe y lo retornamos
     if (Storage::exists($archivo))
     {
       return response()->download($url);
     }
     //si no se encuentra lanzamos un error 404.
     abort(404);

});


