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
            $domicilios_puntos = DB::connection('mu_domicilios')->select('select * from puntos 
            order by id desc');
            return view('domiciliosPuntos.index', ["domicilios_puntos" => $domicilios_puntos]);
        } else {
            return view('home');
        }
    }
    public function show($id){
        $domicilios_puntos = DB::connection('mu_domicilios')->select('select * from puntos 
            where id = ' . $id . '');

        return view('domiciliosPuntos.MapaPuntosDomicilios', ["domicilios_puntos" => $domicilios_puntos]);

        }

}
