<?php

namespace reportes\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class reportesAppVersionesController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $app = DB::select('SELECT  descripcion, COUNT(*) "mensajeros" FROM (
SELECT h.descripcion FROM task_history h WHERE h.datecreate BETWEEN  DATE_ADD(NOW(), INTERVAL - 1 DAY) AND NOW()
 AND h.type_task_status_id = 3 GROUP BY  h.descripcion, h.recurso_id) xx GROUP BY xx.descripcion
          ');
        return view('reportes/reportesAppVersiones', ["app" => $app]);
    }

    

}
