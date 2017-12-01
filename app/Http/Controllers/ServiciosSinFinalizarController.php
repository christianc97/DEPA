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
    	
    	
        $type_task = DB::connection('mensajeros')->select("select ts.nombre estado, count(t.id) cantidad  from task t 
															LEFT JOIN type_task_status ts ON ts.id = t.estado
															where t.estado in (1,2,3,4) 
															group by t.estado");
        
    	return view('reportes.serviciosSinFinalizar', ["typetask" => $type_task]);
    }
    
}
