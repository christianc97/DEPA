<?php

namespace reportes\Http\Controllers;

use Illuminate\Http\Request;
use reportes\Http\Requests\ReportesFormRequest;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class PagosDaviplataController extends Controller
{
    protected $id = 32;

	public function __construct() {
        $this->middleware('auth');
    }

    public function index(){
        $user = Auth::user()->id;
        $tienePermiso = $this->validarPermisos($this->id, $user);
        if ($tienePermiso) {
            return view('reportes.pagosDaviplata');
            } else {
            return view('home');
        }
    }
    public function store(ReportesFormRequest $request){

    	$id = $request->get('id_mensajero');

    	$pagosDaviplata = DB::connection('mensajeros')->select('select m.id, m.fecha, m.monto, m.acumulado, m.descripcion, m.datecreate, m.type_movimientos_id, m.usuario as id_mensajero, r.nombre as nombre_mensajero, m.usercreate, m.task_id, m.empresas_id, m.status, m.acumulado_nr, m.descuento_nr, m.cod_platam, m.factura from movimientos m 
		 left join recursos r on r.id = m.usuario
		 where m.usuario = '.$id.' and m.type_movimientos_id = 13;');

    		Excel::create('reporte Pagos Daviplata mensajero ' . $id . '', function($excel)use($pagosDaviplata) {
            $excel->sheet('reporte pagos mensajero', function($sheet)use($pagosDaviplata) {

                $resultado = $pagosDaviplata;

                foreach ($resultado as &$sf) {
                    $sf = (array) $sf;
                }
                $sheet->fromArray($resultado);
            });
        })->export('xls');

    	return redirect()->back();
    }
}
