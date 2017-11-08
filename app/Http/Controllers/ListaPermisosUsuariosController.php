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
    	$permisos = DB::connection('reportesmensajeros')->select("select * from permisos p
        left join users_permisos up on p.idPermisos=up.permisos_id and users_id=81");
    	return view('permisos.listaPermisos', ['permisos' => $permisos]) ;
    }
}
