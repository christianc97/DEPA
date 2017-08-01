<?php

namespace reportes\Http\Controllers;

use Illuminate\Http\Request;
use reportes\Empresa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use DB;

class DomiciliosUrbanosController extends Controller {

    protected $id = 19;

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $user = Auth::user()->id;
        $tienePermiso = $this->validarPermisos($this->id, $user);
        if ($tienePermiso) {
            $domicilios_empresas = DB::connection('mu_domicilios')->select('select id, nombre,mu_ref,tms  FROM empresa order by id desc');
            return view('domicilios.index', ["domicilios_empresas" => $domicilios_empresas]);
        } else {
            return view('home');
        }
    }

    public function create() {
        return view('domicilios.create');
    }

    public function store(Request $request) {
        $id_empresa = $request->get('id_empresa');
        $nombre_empresa = $request->get('nombre_empresa');
        $email_contacto = $request->get('email_contacto');
        $celular = $request->get('celular');
        $telefono = $request->get('telefono');
        $direccion = $request->get('direccion');

        DB::connection('mu_domicilios')->insert("insert into empresa(nombre, direccion, tel, cel, email, user_create, mu_ref)"
                . "values ('$nombre_empresa','$direccion','$telefono','$celular','$email_contacto',1,$id_empresa)");
        return Redirect::to('domicilios');
    }

    public function show($id) {
        $empresa = Empresa::findOrFail($id);
        $mu_ref = $empresa->mu_ref;
        $users_empresa = DB::select("select u.id, u.email from tbl_users u where u.empresas_id = $mu_ref");
        $users_domicilios = DB::connection('mu_domicilios')->select("select u.id,u.username,u.password_hash,u.password_reset_token,u.mu_ref from user u where empresa_id=$id");
        return view("domicilios.show", ["empresa" => $empresa, "users_empresa" => $users_empresa, "users_domicilios" => $users_domicilios]);
    }

    public function edit() {
        
    }

    public function update() {
        
    }

    public function destroy() {
        
    }

    public function usersDomicilios(Request $request) {
        $username = $request->get("username");
        $password_hash = Hash::make($request->get("password"));
        $password = $request->get("password");
        $empresa_id = $request->get("empresa_id");
        $mu_ref = $request->get("mu_ref");

        DB::connection('mu_domicilios')->insert("insert into user(username,password_hash,password_reset_token,empresa_id, mu_ref)"
                . "values ('$username','$password_hash','$password',$empresa_id,$mu_ref)");
        return redirect()->back();
    }

}
