<?php

namespace reportes\Http\Controllers;

use Illuminate\Http\Request;
//se hace llamado al request para poder insertar datos o consultarlos
use reportes\Http\Requests\ReportesFormRequest;
//libreria y configuraciones de autenticacion por el framework
use Illuminate\Support\Facades\Auth;
//uso del modelo de conexion a base de datos
use reportes\Reportes;
//uso de variable de conexion a la base de datos
use DB;

class ajustesNegativosController extends Controller {
    //constructor de seguridad - administrador de sesiones
    public function __construct() {
        $this->middleware('auth');
    }
    //funcion que lleva a la vista inicial de ajustes negativos
    public function index() {
        return view('reportes.ajustesNegativos');
    }
    //funcion que almacena en base de datos->en tabla -log_reporte-
    public function store(ReportesFormRequest $request) {
        //obtiene los datos desde el formulario de la vista ajustes negativos
        $fecha_inicio = $request->get('fecha_inicio');
        $fecha_fin = $request->get('fecha_fin');
        //hace referencia a la tabla donde guardara en este caso -log_reporte- pues es el modelo creado y lo que se ha establecido
        $reporte = new Reportes();
        $reporte->fecha_inicio= $request->get('fecha_inicio');
        $reporte->fecha_fin = $request->get('fecha_fin');
        $reporte->user_id= Auth::user()->id;
        $reporte->tipo_reporte_id=5;
        $reporte->tipo_log='Mostrado';
        //guarda los datos obtenidos
        $reporte->save();
        //hace consulta de los ajustes negativos para luego enviarlos de vuelta y ser exportados.
        $ajustes = DB::select('SELECT u.id, u.username, u.email, r.nombre, x.descuento FROM tbl_users u 
                                RIGHT JOIN recursos r ON r.tbl_users_id = u.id 
                                RIGHT JOIN (
                                SELECT m.usuario, round(SUM(m.monto) *-1,2) "descuento"  FROM movimientos m WHERE m.task_id IN(
                                SELECT t.id FROM task t WHERE t.estado IN (5,7) AND t.ciudad_id = 6 AND t.fecha_inicio BETWEEN :between AND :and 
                                AND t.solicitante IN (10392,19116)) AND m.type_movimientos_id NOT IN (22,23)
                                GROUP BY m.usuario) x ON x.usuario =  u.id ORDER BY descuento',["between"=>$fecha_inicio, "and"=>$fecha_fin]);
        
        //retorna a la vista de ajustes negativos...
        return view('reportes.ajustesNegativos', ["ajustes" => $ajustes]);
    }

}
