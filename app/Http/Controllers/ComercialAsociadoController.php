<?php

namespace reportes\Http\Controllers;

use Illuminate\Http\Request;
use reportes\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use stdClass;
use DB;

class ComercialAsociadoController extends Controller
{
    protected $id = 27;

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(){
        $user = Auth::user()->id;
        $tienePermiso = $this->validarPermisos($this->id, $user);
        if ($tienePermiso) {
    	 $comercial_asociado = DB::connection('mensajeros')
            ->select('select e.id as id_empresa, e.nombre_empresa, u.nombre as comercial_asociado  from empresas e
				left join tbl_profiles u on e.commercial = u.user_id
				 where e.commercial is not null;');  
    	return view ('reportes.comercialAsociado', ["comercial_asociado" => $comercial_asociado]);
         } else {
            return view('home');
        }
    }
}
