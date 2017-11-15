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
            $gruposElite = DB::connection('mensajeros')->select('select e.id as idGrupo, e.name, r.nombres, r.apellidos, r.celular, r.tbl_users_id, r.id from recursos r
                left join elite_groups e on r.elite_group = e.id
                where r.elite_group is not null order by e.name;');

            $gruposE = DB::connection('mensajeros')->select('select id, name from elite_groups;');

            $permisoAsociar = DB::connection('reportesmensajeros')->select('select permisos_id from users_permisos where users_id=' . $user . '');

    	return view ('reportes.gruposElite', ["gruposElite" => $gruposElite, "permisoAsociar" => $permisoAsociar, 'gruposE' => $gruposE]);
         } else {
            return view('home');
        }
    }

    public function puntosgrupos(Request $request){
            
            $nombregrupo = $request->get('nombregrupo');
            $nombrepunto = $request->get('nombrepunto');
            $gruponame = DB::connection('mensajeros')->select('select id from elite_groups where name = "'.$nombregrupo.'"');
            $idgrupo = $gruponame[0]->id;
            $iduser = Auth::user()->id;
            DB::connection('reportesmensajeros')->insert("insert into grupoelite_puntos(id_grupo, nombre_grupo, nombre_punto, user_id)values ($idgrupo, '$nombregrupo', '$nombrepunto', $iduser)");
            return Redirect()->back();  
    
}
}
