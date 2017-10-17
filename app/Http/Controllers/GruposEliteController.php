<?php

namespace reportes\Http\Controllers;

use Illuminate\Http\Request;
use reportes\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use stdClass;
use DB;

class GruposEliteController extends Controller
{
    protected $id = 26;

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(){
        $user = Auth::user()->id;
        $tienePermiso = $this->validarPermisos($this->id, $user);
        if ($tienePermiso) {
    	 $gruposElite = DB::connection('mensajeros')
            ->select('select e.name, r.nombres, r.apellidos, r.tbl_users_id, r.id from recursos r 
				left join elite_groups e on r.elite_group = e.id
				where r.elite_group is not null;');  
    	return view ('reportes.gruposElite', ["gruposElite" => $gruposElite]);
         } else {
            return view('home');
        }
    }
}
