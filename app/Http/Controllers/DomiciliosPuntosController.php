<?php

namespace reportes\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class DomiciliosPuntosController extends Controller {

    protected $id = 21;

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $user = Auth::user()->id;
        $tienePermiso = $this->validarPermisos($this->id, $user);
        if ($tienePermiso) {
            $domicilios_puntos = DB::connection('mu_domicilios')->select('select p.id, p.nombre,p.direccion, e.nombre, p.empresa_id, p.ciudad, p.parking from puntos p
            inner join empresa e on p.empresa_id=e.id
            order by p.empresa_id desc;');
            return view('domiciliosPuntos.index', ["domicilios_puntos" => $domicilios_puntos]);
        } else {
            return view('home');
        }
    }

}
