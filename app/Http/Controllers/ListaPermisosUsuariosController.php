<?php

namespace reportes\Http\Controllers;

use Illuminate\Http\Request;
use reportes\Permisos;
use reportes\User;
use Illuminate\Support\Facades\Redirect;
use reportes\Http\Requests\PermisosFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use DB;

class ListaPermisosUsuariosController extends Controller
{
    protected $id = 31;

	public function __construct() {
        $this->middleware('auth');
    }

    public function index(){
        $user = Auth::user()->id;
        $tienePermiso = $this->validarPermisos($this->id, $user);
        if ($tienePermiso) {
    	   $permisos = DB::connection('reportesmensajeros')
                ->select('select u.id, u.nombre1 as nombre,  u.apellido1 as apellido,  GROUP_CONCAT("\n", e.nombre_permiso) as permisos from users u
                left join users_permisos ue on u.id= ue.users_id
                left join permisos e on ue.permisos_id= e.idPermisos
                where u.activo=1
                group by u.id
                 order by u.nombre1 asc;');
            return view('permisos.listaPermisos', ['permisos' => $permisos]);
            } else {
            return view('home');
        }
    }
}
