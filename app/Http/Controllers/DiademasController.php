<?php

namespace reportes\Http\Controllers;

use Illuminate\Http\Request;
use reportes\User;
use reportes\Diademas;
use Illuminate\Support\Facades\Redirect;
use reportes\Http\Requests\DiademasFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use stdClass;
use DB;
class DiademasController extends Controller
{
    protected $id = 24;

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(){
         $user = Auth::user()->id;
        $tienePermiso = $this->validarPermisos($this->id, $user);
        if ($tienePermiso) {
    	 $diademas = DB::connection('reportesmensajeros')
            ->select('select d.id_diadema, d.codigo_d, d.fecha_compra, GROUP_CONCAT(e.id_equipos) as id_equipos, GROUP_CONCAT(e.codigo) as codigoe from diademas d
            left join equipos_diademas ed on d.id_diadema= ed.diademas_id
            left join equipos e on ed.equipos_id= e.id_equipos 
            where ed.fecha_desasignacion is null 
            group by d.id_diadema
            order by d.codigo_d asc');
    	return view ('diademas.index', ["diademas" => $diademas]);
         } else {
            return view('home');
        }
    }

    public function create() {
        return view('diademas.create');
    }

    public function store(DiademasFormRequest $request) {
        $diadema = new Diademas();
        $diadema->codigo_d = Str::lower($request->get('codigo'));
        $diadema->fecha_compra = $request->get('fecha_compra');
        $diadema->save();
        return Redirect::to('diademas.index');
    }
}
