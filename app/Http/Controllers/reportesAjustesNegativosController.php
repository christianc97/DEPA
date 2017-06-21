<?php

namespace reportes\Http\Controllers;

use Illuminate\Http\Request;
use reportes\Http\Requests\ReportesFormRequest;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use reportes\Reportes;
use DB;

class reportesAjustesNegativosController extends Controller
{
    protected $id=10;
    public function __construct() {
        $this->middleware('auth');
    }
    
   public function index(){
       $user=Auth::user()->id;
       $tienePermiso=$this->validarPermisos($this->id, $user);
       if ($tienePermiso) {
           return view('reportes.reportesAjustesNegativos');
         }else{
           return view('home');
       }
   }
   public function exportarAjustesNegativos(ReportesFormRequest $request){
       $fecha_inicio = $request->get('fecha_inicio');
       $fecha_fin = $request->get('fecha_fin');
       
       $reporte = new Reportes();
        $reporte->fecha_inicio= $request->get('fecha_inicio');
        $reporte->fecha_fin = $request->get('fecha_fin');
        $reporte->user_id= Auth::user()->id;
        $reporte->tipo_reporte_id=5;
        $reporte->tipo_log='Descargado';
        $reporte->save();
       
       $ajustes = DB::select('SELECT u.id, u.username, u.email, r.nombre, x.descuento FROM tbl_users u 
RIGHT JOIN recursos r ON r.tbl_users_id = u.id 
RIGHT JOIN (
SELECT m.usuario, round(SUM(m.monto) *-1,2) "descuento"  FROM movimientos m WHERE m.task_id IN(
SELECT t.id FROM task t WHERE t.estado IN (5,7) AND t.ciudad_id = 6 AND t.fecha_inicio BETWEEN :between AND :and 
AND t.solicitante IN (10392,19116)) AND m.type_movimientos_id NOT IN (22,23)
GROUP BY m.usuario) x ON x.usuario =  u.id ORDER BY descuento',["between"=>$fecha_inicio,"and"=>$fecha_fin]);

        Excel::create('reporte ajustes negativos chia', function($excel)use($ajustes) {
            $excel->sheet('reporte ajustes negativos', function($sheet)use($ajustes) {



                $resultado = $ajustes;

                foreach ($resultado as &$sf) {
                    $sf = (array) $sf;
                }
                $sheet->fromArray($resultado);
            });
        })->export('xls');
   }
   
}
