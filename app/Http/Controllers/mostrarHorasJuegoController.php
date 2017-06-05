<?php

namespace reportes\Http\Controllers;

use Illuminate\Http\Request;
use reportes\Http\Requests\ReportesFormRequest;
use Illuminate\Support\Facades\Auth;
use reportes\Reportes;
use DB;

class mostrarHorasJuegoController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('reportes.horasJuego');
    }

    public function store(ReportesFormRequest $request) {
        $fecha_inicio = $request->get('fecha_inicio');
        $hora_inicio = $request->get('hora_inicio');
        $fecha_fin = $request->get('fecha_fin');
        $hora_fin = $request->get('hora_fin');
        $tipo_servicio = $request->get('tipo_servicio');
        $ciudad = $request->get('ciudad');
        $id_empresa = $request->get('id_empresa');
        $servicios_activacion = $request->get('servicios_activacion');
        $FechaInicioCompleta = $fecha_inicio . ' ' . $hora_inicio;
        $FechaFinCompleta = $fecha_fin . ' ' . $hora_fin;

        $idEmpresa = ($id_empresa != "") ? "AND t.`solicitante` IN ( SELECT id FROM tbl_users WHERE empresas_id = '$id_empresa')" : "";
        $serviciosActivacion = ($servicios_activacion != false) ? "AND t.activation = 0" : "";
        $TipoServicio = ($tipo_servicio != "") ? "and t.type_task_id = '$tipo_servicio'" : "";
        $Ciudad = ($ciudad != "") ? "and r.ciudad_id = '$ciudad'" : "";

        $reporte = new Reportes();
        $reporte->fecha_inicio = $request->get('fecha_inicio');
        $reporte->hora_inicio = $request->get('hora_inicio');
        $reporte->fecha_fin = $request->get('fecha_fin');
        $reporte->hora_fin = $request->get('hora_fin');
        $reporte->tipo_servicio = $request->get('ts');
        $reporte->ciudad = $request->get('ciudad');
        $reporte->user_id= Auth::user()->id;
        $reporte->tipo_reporte_id = 2;
        $reporte->tipo_log = 'Mostrado';
        $reporte->save();

        $horas_juego = DB::select('select * from (SELECT u.id, u.username, r.nombre, c.nombre "ciudad", r.celular_daviplata,
 COUNT(*) "cantidad_servicios", SUM(t.distancia) "distancia", SUM(t.valor_total - IFNULL(t.recargo_seguro,0)) "valor_total"
 FROM task t 
LEFT JOIN (SELECT * FROM task_history WHERE type_task_status_id = 3 ORDER BY id DESC) h ON t.id = h.task_id  AND t.id_resource = h.recurso_id AND t.estado = 5
LEFT JOIN tbl_users u ON u.id = t.id_resource 
LEFT JOIN recursos r ON r.tbl_users_id = u.id
LEFT JOIN ciudad c ON c.id = r.ciudad_id
WHERE (h.datecreate BETWEEN "' . $FechaInicioCompleta . '" AND "' . $FechaFinCompleta . '")
    ' . $TipoServicio . '
        ' . $Ciudad . ' ' . $serviciosActivacion . ' ' . $idEmpresa . '
GROUP BY t.id_resource, id, username, nombre, ciudad, celular_daviplata) t order by t.cantidad_servicios desc');

        set_time_limit(60);

        return view('reportes.horasJuego', ["horasJuego" => $horas_juego]);
    }

}
