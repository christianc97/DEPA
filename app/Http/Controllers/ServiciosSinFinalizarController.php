<?php

namespace reportes\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use stdClass;
use DB;

class ServiciosSinFinalizarController extends Controller
{
    protected $id = 30;

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(){
    	$servicios_sin_finalizar = DB::select('SELECT t.id,
                                                t.uuid,
                                                (SELECT tp.order_id FROM task_places tp WHERE task_id = t.id AND tipo_task_places = 1 LIMIT 1) AS num_orden,
                                                     t.date_created,
                                                     t.fecha_inicio,
                                                     t.hora_inicio,
                                                     ts.nombre AS estado, 
                                                     t.solicitante AS id_solicitante,
                                                     p.nombre AS nombre_solicitante,
                                                     t.id_company,
                                                     t.name_company,
                                                     tt.nombre AS tipo_servicio,
                                                     t.valor_total,
                                                     pa.nombre AS tipo_de_pago,
                                                c.nombre AS ciudad
                                            FROM
                                                task t
                                            INNER JOIN tbl_users sol ON sol.id = t.solicitante
                                            INNER JOIN tbl_profiles p ON p.user_id = t.solicitante
                                            INNER JOIN type_task tt ON tt.id = t.type_task_id
                                            LEFT JOIN empresas em ON em.id = t.id_company 
                                            LEFT JOIN recursos re ON re.tbl_users_id = t.id_resource
                                            LEFT JOIN type_task_pago pa ON pa.id = t.estado_pago
                                            LEFT JOIN type_task_status ts ON ts.id = t.estado
                                            LEFT JOIN ciudad c ON c.id = t.ciudad_id
                                            WHERE  
                                            t.estado in (1,2,3,4)
                                            order by t.fecha_inicio;');
    	
    	return view('reportes.serviciosSinFinalizar', ["servicios_sin_finalizar" => $servicios_sin_finalizar]);
    }
    
}
