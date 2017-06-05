<?php

namespace reportes\Http\Controllers;

use Illuminate\Http\Request;
use reportes\Http\Requests\ReportesFormRequest;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use reportes\Reportes;
use DB;

class reportesListadoMensajerosController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('reportes.reportesListadoMensajeros');
    }

    public function exportarListadoMensajeros(ReportesFormRequest $request) {
        $ciudad = $request->get('ciudad');
        $estado_mensajero = $request->get('estado_mensajero');
        
        $Ciudad= ($ciudad !="")? "and r.ciudad_id = $ciudad ": "";
        
        $reporte = new Reportes();
        $reporte->ciudad = $request->get('ciudad');
        $reporte->estado_mensajero= $request->get('estado_mensajero');
        $reporte->user_id= Auth::user()->id;
        $reporte->tipo_reporte_id=8;
        $reporte->tipo_log='Descargado';
        $reporte->save();

        $listado_mensajero = 'SELECT r.tbl_users_id, r.nombre, r.nombres, r.apellidos, c.nombre "ciudad", u.username, u.email, r.telefono, r.celular, r.celular_daviplata,
 r.fecha_nacimiento, tr.nombre "tipo", cc.name "organizacion", r.did "cedula", r.placa, r.url_foto, r.url_cedula, r.url_pase, r.url_rut, r.url_eps, r.url_soat, r.url_tecnomecanica,
 r.url_manipulacion_alimentos, r.ss, r.vip,
  case u.`status` when 0 then "bloqueado" when 1 then "activo" when 2 then "preregistrado" when 3 then "descartado" end as "otro" ,
  r.`domiciliario` "mensajeria_domi", r.corporativo "mensajeria_express",  r.datecreate "creacion_mensajero", bh.creation_date "activo_desde", t.date_created "ultimo_servicio",
 t.id "id_ultimo_servicio", t2.servicios_finalizados
FROM recursos r 
LEFT JOIN (SELECT MAX(id) "id2", t.id_resource "id_resorce2", COUNT(*) "servicios_finalizados" FROM task t WHERE t.estado =5 GROUP BY t.id_resource) t2 ON t2.id_resorce2 = r.tbl_users_id
LEFT JOIN task t ON t2.id2 = t.id
LEFT JOIN tbl_users u ON r.tbl_users_id = u.id
LEFT JOIN ciudad c ON r.ciudad_id = c.id
LEFT JOIN type_recurso tr ON r.type_recurso_id = tr.id
LEFT JOIN courier_companies cc ON cc.id = r.company_id
left join (select * from blocking_history bh where bh.blocking_type = 10 group by bh.id_resource) bh on bh.id_resource = r.tbl_users_id
where u.`status` in ('.$estado_mensajero.') '.$Ciudad.' ';
        

        Excel::create('reporte Servicios Mensajero', function($excel)use($listado_mensajero) {
            $excel->sheet('reporte servicios', function($sheet)use($listado_mensajero) {

                $resultado = DB::select($listado_mensajero);

                foreach ($resultado as &$sf) {
                    $sf = (array) $sf;
                }
                $sheet->fromArray($resultado);
            });
        })->export('xls');
    }

}
