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

    public function show($id_punto) {
        $id_punto = $id_punto;
        $punto = DB::select('SELECT * FROM puntos WHERE id = ' . $id_punto. '');

        return view("domiciliospuntosmapa/MapaPuntosDomicilios", ["punto" => $punto, "id_p" => $id_punto]);
    }

    public function track(PuntosFormRequest $request) {

        $id_punto = $request->get('id_punto');

        if ($id_punto != '') {
            $paradas = DB::select('select p.id, p.lat, p.long, p.direccion from puntos t where p.id = '.$id_punto.'');
          
            $track = DB::select('SELECT * FROM puntos WHERE id = ' . $id_punto . '');

            return view("domiciliospuntosmapa/MapaPuntosDomicilios", ["track" => $track, "id_p" => $id_mensajero,"paradas"=>$paradas]);
        } 
        else {
            return redirect()->back();
        }
 }
}
