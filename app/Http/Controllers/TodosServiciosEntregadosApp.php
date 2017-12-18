<?php

namespace reportes\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class TodosServiciosEntregadosApp extends Controller
{ 
	protected $id = 33;

	public function __construct() {
        $this->middleware('auth');
    }

    public function index(){
        $user = Auth::user()->id;
        $tienePermiso = $this->validarPermisos($this->id, $user);
        if ($tienePermiso) {
        $ciudades = DB::connection('mensajeros')->select('select id, nombre from ciudad order by nombre;');
    	return view('reportes/TodosServiciosEntregadosApp', ['ciudades' => $ciudades]);
    	} else {
            return view('home');
        }
    }
}
