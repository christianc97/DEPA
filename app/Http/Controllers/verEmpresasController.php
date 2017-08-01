<?php

namespace reportes\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class verEmpresasController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('domicilios.empresa');
    }

    public function store(Request $request) {
        $id_empresa = $request->get('id_empresa');
        $empresa = DB::select("select id, nombre_empresa,email_contacto, celular,telefono, direccion  FROM empresas where id=$id_empresa");
        return view('domicilios.empresa', ["empresa" => $empresa]);
    }

}
