<?php

namespace reportes\Http\Controllers;

use Illuminate\Http\Request;
use reportes\Http\Requests\ReportesFormRequest;
use reportes\Reportes;
use Illuminate\Support\Facades\Auth;
use DB;

class VistasTaskController extends Controller {
    
    protected $id=17;
    
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        
        $user=Auth::user()->id;
        $tienePermiso=$this->validarPermisos($this->id,$user);
        if ($tienePermiso) {
           return view('reportes.reportesVistasTask');
        }else{
            return view('home');
        }
        
    }

    public function store(ReportesFormRequest $request) {
        $id_task = $request->get('id_task');

        $task = DB::select("select * from task t where t.id = $id_task");
        $task_places = DB::select("select * from task_places p where p.task_id = $id_task");
        $task_history = DB::select("select * from task_history h where h.task_id = $id_task");
        return view('reportes.vistasTask', ["task" => $task, "task_places"=>$task_places, "task_history"=>$task_history]);
    }

}
