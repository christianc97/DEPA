<?php

namespace reportes\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use reportes\Http\Requests\ReportesFormRequest;
use reportes\Reportes;
use Illuminate\Support\Facades\Auth;
use DB;

class reporteServiciosFinalizadosController extends Controller {
    //

    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        return view('reportes/reportesServiciosFinalizados');
    }

    public function exportarServiciosFinalizados(ReportesFormRequest $request) {

        $es = $request->get('es');
        $tp = $request->get('tp');
        $im = $request->get('im');

        $aux = ($tp != "") ? "AND t.estado_pago IN ( 1 )" : "";

        $reporte = new Reportes();
        $reporte->id_mensajero = $request->get('im');
        $reporte->estado_servicio = $request->get('es');
        $reporte->tipo_pago= $request->get('tp');
        $reporte->user_id= Auth::user()->id;
        $reporte->tipo_reporte_id= 1;
        $reporte->tipo_log='Descargado';
        $reporte->save();

        $consulta = 'SELECT
          t.id,t.uuid,t.date_created,t.fecha_inicio,t.hora_inicio,t.ida_vuelta,t.solicitante AS id_solicitante,p.nombre AS nombre_solicitante,
          sol.user_type AS tipo_usuario,em.did AS nit,em.nombre_empresa,tt.nombre AS tipo_servicio,re.nombre AS nombre_recurso,
          re.did AS documento_recurso,rec.user_type tipo_recurso,t.valor_total,
          t.comision,
          t.recargo_distancia,t.recargo_ida_vuelta,t.recargo_tiempo,
          pa.nombre AS estado_pago,t.factura,
          ts.nombre AS estado,t.descripcion,t.cc AS cuenta_contable,
          IF(t.ida_vuelta = 1,(SELECT COUNT(p.id) FROM task_places p WHERE p.task_id = t.id)-2,(SELECT COUNT(p.id) FROM task_places p WHERE p.task_id = t.id)-1) AS cant_paradas,
          (SELECT tp.address FROM task_places tp WHERE task_id = t.id AND tipo_task_places = 1 LIMIT 1) AS dir_origen,
          (SELECT tp.address FROM task_places tp WHERE task_id = t.id AND tipo_task_places = 2 LIMIT 1) AS parada_1,
          t.distancia "distancia_km",
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
          WHERE t.estado IN (' . $es . ')
          AND t.id_resource = ' . $im . ' ' . $aux . ''
        ;

        Excel::create('reporte Servicios Mensajero', function($excel)use($consulta) {
            $excel->sheet('reporte servicios', function($sheet)use($consulta) {
                
                $resultado = DB::select($consulta);
                
                foreach ($resultado as &$sf) {
                    $sf = (array) $sf;
                }
                $sheet->fromArray($resultado);
            });
        })->export('xls');
    }

}
