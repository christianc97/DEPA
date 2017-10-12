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
            $bogota = DB::connection('mu_domicilios')->select('select p.id, p.nombre, empresa_id, p.lat, p.long, p.direccion, p.ciudad, e.nombre "empresa" from puntos p
                left join empresa e on p.empresa_id = e.id 
                where p.ciudad = "bogota";');

            $cali = DB::connection('mu_domicilios')->select('select p.id, p.nombre, empresa_id, p.lat, p.long, p.direccion, e.nombre "empresa" from puntos p
                left join empresa e on p.empresa_id = e.id 
                where ciudad = "cali";');

            $barranquilla = DB::connection('mu_domicilios')->select('select p.id, p.nombre, empresa_id, p.lat, p.long, p.direccion, e.nombre "empresa" from puntos p
                left join empresa e on p.empresa_id = e.id 
                where ciudad = "barranquilla";');

            $medellin = DB::connection('mu_domicilios')->select('select p.id, p.nombre, empresa_id, p.lat, p.long, p.direccion, e.nombre "empresa" from puntos p
                left join empresa e on p.empresa_id = e.id 
                where ciudad = "medellin";');

            $villavicencio = DB::connection('mu_domicilios')->select('select p.id, p.nombre, empresa_id, p.lat, p.long, p.direccion, (e.nombre) as empresa from puntos p
                left join empresa e on p.empresa_id = e.id 
                where ciudad = "villavicencio";'); 

            $cum_soacha = DB::connection('mu_domicilios')->select('select p.id, p.nombre, empresa_id, p.lat, p.long, p.direccion, (e.nombre) as empresa from puntos p
                left join empresa e on p.empresa_id = e.id 
                where ciudad = "cum_soacha";'); 

            $cartagena = DB::connection('mu_domicilios')->select('select p.id, p.nombre, empresa_id, p.lat, p.long, p.direccion, (e.nombre) as empresa from puntos p
                left join empresa e on p.empresa_id = e.id 
                where ciudad = "cartagena";'); 

            $sta_marta = DB::connection('mu_domicilios')->select('select p.id, p.nombre, empresa_id, p.lat, p.long, p.direccion, (e.nombre) as empresa from puntos p
                left join empresa e on p.empresa_id = e.id 
                where ciudad = "sta_marta";'); 

            $clientes = DB::connection('mu_domicilios')->select('select p.id, p.nombre, empresa_id, p.lat, p.long, p.direccion, (e.nombre) as empresa, e.mu_ref from puntos p
                left join empresa e on p.empresa_id = e.id 
                where mu_ref is not null group by mu_ref ');

            return view('domiciliospuntosmapa/MapaPuntosDomicilios', ["bogota"=> $bogota, "cali"=> $cali, "barranquilla"=> $barranquilla, "medellin"=> $medellin, "villavicencio"=> $villavicencio, "cum_soacha"=> $cum_soacha, "cartagena"=> $cartagena, "sta_marta"=> $sta_marta, "clientes"=> $clientes]);
        } else {
            return view('home');
        }
    }   

}


