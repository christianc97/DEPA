<?php

namespace reportes\Http\Controllers;

use Illuminate\Http\Request;
use reportes\Http\Requests\ReportesFormRequest;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use reportes\Reportes;
use DB;

class reportesTotalServiciosPersonaController extends Controller
{
    protected $id=16;
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        $user=Auth::user()->id;
        $tienePermiso=$this->validarPermisos($this->id,$user);
        if ($tienePermiso) {
           return view('reportes.reportesTotalServiciosPersonas');
        }else{
            return view('home');
        }
        
    }

    public function exportarTotalServiciosPersonas(ReportesFormRequest $request) {
        $fecha_inicio = $request->get('fecha_inicio');
        $fecha_fin = $request->get('fecha_fin');
        $id_persona = $request->get('id_persona');
        $ciudad = $request->get('ciudad');
        $estado_servicio = $request->get('estado_servicio');
        
        $reporte = new Reportes();
        $reporte->fecha_inicio= $request->get('fecha_inicio');
        $reporte->fecha_fin = $request->get('fecha_fin');
        $reporte->id_persona= $request->get('id_persona');
        $reporte->ciudad=$request->get('ciudad');
        $reporte->estado_servicio=$request->get('estado_servicio');
        $reporte->user_id= Auth::user()->id;
        $reporte->tipo_reporte_id=9;
        $reporte->tipo_log='Descargado';
        $reporte->save();


        $estadoServicio = ($estado_servicio != "") ? "t.estado IN ($estado_servicio) AND" : "";
        $Ciudad = ($ciudad != "") ? "AND t.ciudad_id = '$ciudad'" : "";

        $total_servicios = DB::select('SELECT 
    t.uuid,t.date_created,t.fecha_inicio,t.hora_inicio,t.ida_vuelta,t.solicitante AS id_solicitante,p.nombre AS nombre_solicitante,
    sol.user_type AS tipo_usuario,em.did AS nit,em.nombre_empresa,tt.nombre AS tipo_servicio,re.nombre AS nombre_recurso,
     re.did AS documento_recurso,rec.user_type tipo_recurso,t.valor_total,
     t.recargo_distancia,t.recargo_ida_vuelta,t.recargo_tiempo,  t.night_surcharge "recargo_nocturno",
     (IF(t.ida_vuelta = 1,(SELECT COUNT(p.id) FROM task_places p WHERE p.task_id = t.id)-3,(SELECT COUNT(p.id) FROM task_places p WHERE p.task_id = t.id)-2))*3900 AS recargo_por_paradas,
     pa.nombre AS estado_pago,t.factura,
    ts.nombre AS estado,t.descripcion,t.cc AS cuenta_contable,
    IF(t.ida_vuelta = 1,(SELECT COUNT(p.id) FROM task_places p WHERE p.task_id = t.id)-2,(SELECT COUNT(p.id) FROM task_places p WHERE p.task_id = t.id)-1) AS cant_paradas,
    
    (SELECT tp.address FROM task_places tp WHERE task_id = t.id AND tipo_task_places = 1 LIMIT 1) AS dir_origen,
    (SELECT tp.descripcion FROM task_places tp WHERE task_id = t.id AND tipo_task_places = 1 LIMIT 1) AS des_origen,
    (SELECT tp.address FROM task_places tp WHERE task_id = t.id AND tipo_task_places = 2 LIMIT 1) AS parada_1,
    (SELECT tp.descripcion FROM task_places tp WHERE task_id = t.id AND tipo_task_places = 2 LIMIT 1) AS des_parada_1,
    (SELECT tp.neighborhood FROM task_places tp WHERE task_id = t.id AND tipo_task_places = 2 LIMIT 1) AS parada_1_barrio,  
    t.distancia "distancia_km",
    (SELECT tp.order_id FROM task_places tp WHERE task_id = t.id AND tipo_task_places = 1 LIMIT 1) AS num_orden,
    t.tiempo_adicional,
     (SELECT tp.products_value FROM task_places tp WHERE tp.task_id = t.id AND tp.tipo_task_places = 2 ORDER BY id ASC LIMIT 1) "gran total",
    (SELECT tp.client_name FROM task_places tp WHERE task_id = t.id AND tipo_task_places = 2 LIMIT 1) AS cliente_final,
    c.nombre AS ciudad,
    t.os
FROM
    task t
INNER JOIN tbl_users sol ON sol.id = t.solicitante
INNER JOIN tbl_profiles p ON p.user_id = t.solicitante
INNER JOIN type_task tt ON tt.id = t.type_task_id
LEFT JOIN empresas em ON em.id = t.id_company
LEFT JOIN recursos re ON re.tbl_users_id = t.id_resource
LEFT JOIN type_task_pago pa ON pa.id = t.estado_pago
LEFT JOIN type_task_status ts ON ts.id = t.estado
LEFT JOIN tbl_users rec ON rec.id = t.id_resource
LEFT JOIN ciudad c ON c.id = t.ciudad_id
left join type_caracteristica_recursos scr on scr.id = t.tipo_segmentacion_id
WHERE ' . $estadoServicio . '
    t.solicitante IN (:idPersona) 
AND fecha_inicio BETWEEN :between AND :and 
' . $Ciudad . '', ["between" => $fecha_inicio, "and" => $fecha_fin, "idPersona" => $id_persona]);



        if (count($total_servicios) > 2000) {
            return view('reportes.reportesTotalServicios');
        } else {
            Excel::create('reporte total servicios empresa ' . $id_persona . ' desde '.$fecha_inicio.' hasta '.$fecha_fin.'', function($excel)use($total_servicios) {
                $excel->sheet('reporte total de servicios', function($sheet)use($total_servicios) {
                    $resultado = $total_servicios;

                    foreach ($resultado as &$sf) {
                        $sf = (array) $sf;
                    }
                    $sheet->fromArray($resultado);
                });
            })->export('xls');
        }
    }
}
