<?php

namespace reportes\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class JitsiEquiposUsuariosController extends Controller
{
	protected $id = 34;

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $user = Auth::user()->id;
        $tienePermiso = $this->validarPermisos($this->id, $user);
        if ($tienePermiso) {
            $jitsi_equipos = DB::connection('reportesmensajeros')->select('select e.id_equipos, ue.fecha_desasignacion, e.codigo, e.ext_jitsi, ue.users_id, u.nombre1, u.apellido1, e.codigo, e.area from equipos e
				left join users_equipos ue on e.id_equipos = ue.equipos_id
				left join users u on ue.users_id = u.id
				where u.activo = 1 and ue.fecha_desasignacion is null
				group by e.codigo
				order by e.codigo asc;');
            return view('equipos.JitsiEquiposUsuarios', ['jitsi_equipos' => $jitsi_equipos]);
        } else {
            return view('home');
        }
    }
}