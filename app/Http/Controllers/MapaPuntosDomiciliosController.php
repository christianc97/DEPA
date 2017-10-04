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

}
