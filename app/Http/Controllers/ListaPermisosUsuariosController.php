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
	public function __construct() {
        $this->middleware('auth');
    }

    public function index(){

    	$permisos = DB::connection('reportesmensajeros')
            ->select('select u.id,u.cedula, u.nombre1, u.nombre2, u.apellido1, u.apellido2, u.area, u.cargo, u.sucursal, u.genero, u.celular, u.correo_corporativo, u.fecha_ingreso, u.fecha_finalizacion_contrato,GROUP_CONCAT(e.id_equipos) as id_equipos, GROUP_CONCAT(e.codigo) as codigo from users u
            left join users_equipos ue on u.id= ue.users_id
            left join equipos e on ue.equipos_id= e.id_equipos
            where u.activo=1 and ue.fecha_desasignacion is null
            group by u.id
             order by u.nombre1 asc');
    	return view('permisos.listaPermisos', ['permisos' => $permisos]) 
    	;
    }
}
