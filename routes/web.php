<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::get('/', function () {
    return view('auth/login');
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
Route::post('domicilios/crearjsonhoras', 'DomiciliosUrbanosController@horarioSave');
Route::post('domicilios/crearPuntos', 'DomiciliosUrbanosController@crearPuntos');
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


