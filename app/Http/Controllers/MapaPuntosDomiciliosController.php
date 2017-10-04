<?php

namespace reportes\Http\Controllers;

use Illuminate\Http\Request;
use reportes\Http\Requests\PuntosFormRequest;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use reportes\Puntos;
use DB;


class MapaPuntosDomiciliosController extends Controller
{
    protected $id = 25;

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $user = Auth::user()->id;
        $tienePermiso = $this->validarPermisos($this->id, $user);
        if ($tienePermiso) {

            return view('domiciliospuntosmapa/MapaPuntosDomicilios');
        } else {
            return view('home');
        }
    }
    public function bogota(){

        $puntos = DB::connection('mu_domicilios')->select('select * from puntos where ciudad = "bogota" ');

        return view('domiciliospuntosmapa/bogota', ["puntos"=> $puntos]);
    }
    public function cali(){

        $puntos = DB::connection('mu_domicilios')->select('select * from puntos where ciudad = "cali" ');

        return view('domiciliospuntosmapa/cali', ["puntos"=> $puntos]);
    }
    public function barranquilla(){

        $puntos = DB::connection('mu_domicilios')->select('select * from puntos where ciudad = "barranquilla" ');

        return view('domiciliospuntosmapa/barranquilla', ["puntos"=> $puntos]);
    }
    public function medellin(){

        $puntos = DB::connection('mu_domicilios')->select('select * from puntos where ciudad = "medellin"');

        return view('domiciliospuntosmapa/medellin', ["puntos"=> $puntos]);
    }
    public function villavicencio(){

        $puntos = DB::connection('mu_domicilios')->select('select * from puntos where ciudad = "villavicencio" ');

        return view('domiciliospuntosmapa/villavicencio', ["puntos"=> $puntos]);
    }
    public function cartagena(){

        $puntos = DB::connection('mu_domicilios')->select('select * from puntos where ciudad = "cartagena" ');

        return view('domiciliospuntosmapa/cartagena', ["puntos"=> $puntos]);
    }
    public function santamarta(){

        $puntos = DB::connection('mu_domicilios')->select('select * from puntos where ciudad = "sta_marta" ');

        return view('domiciliospuntosmapa/santamarta', ["puntos"=> $puntos]);
    }

}


