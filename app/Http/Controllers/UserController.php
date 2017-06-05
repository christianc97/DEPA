<?php

namespace reportes\Http\Controllers;

use Illuminate\Http\Request;
use reportes\User;
use Illuminate\Support\Facades\Redirect;
use reportes\Http\Requests\UsuarioFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use DB;

class UserController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $usuarios = DB::connection('reportesmensajeros')->select('select * from users where activo=1 order by fecha_ingreso asc');
        /* $consulta = DB::connection('reportesmensajeros')->select(' select * from users'); */
        return view('usuario.index', ["usuarios" => $usuarios]);
    }

    public function create() {
        return view('usuario.create');
    }

    public function store(UsuarioFormRequest $request) {
        $usuario = new User();
        $usuario->tipo_documento = 'cc';
        $usuario->cedula = $request->get('cedula');
        $usuario->nombre1 = Str::lower($request->get('nombre1'));
        $usuario->nombre2 = Str::lower($request->get('nombre2'));
        $usuario->apellido1 = Str::lower($request->get('apellido1'));
        $usuario->apellido2 = Str::lower($request->get('apellido2'));
        $usuario->area = $request->get('area');
        $usuario->cargo = $request->get('cargo');
        $usuario->fecha_nacimiento = $request->get('fecha_nacimiento');
        $usuario->genero = $request->get('genero');
        $usuario->telefono = $request->get('telefono');
        $usuario->celular = $request->get('celular');
        $usuario->direccion = Str::lower($request->get('direccion'));
        $usuario->email = Str::lower($request->get('email'));
        $usuario->eps = $request->get('eps');
        $usuario->afp = $request->get('afp');
        $usuario->correo_corporativo = Str::lower($request->get('correo_corporativo'));
        $usuario->sucursal = $request->get('sucursal');
        $usuario->fecha_ingreso = $request->get('fecha_ingreso');
        $usuario->fecha_finalizacion_contrato = $request->get('fecha_finalizacion_contrato');
        $usuario->activo = 1;
        $usuario->save();
        return Redirect::to('usuario');
    }

    public function show($id) {
        return view("usuario.show", ["usuario" => User::findOrFail($id)]);
    }

    public function edit($id) {
        return view("usuario.edit", ["usuario" => User::findOrFail($id)]);
        /* $usuario = DB::connection('reportesmensajeros')->select(' select * from users where id=:id', ["id" => $id]);
          return view("usuario.edit", ["usuario" => $usuario]); */
    }

    public function update(UsuarioFormRequest $request, $id) {

        $usuario = User::findOrFail($id);
        $usuario->cedula = $request->get('cedula');
        $usuario->nombre1 = Str::lower($request->get('nombre1'));
        $usuario->nombre2 = Str::lower($request->get('nombre2'));
        $usuario->apellido1 = Str::lower($request->get('apellido1'));
        $usuario->apellido2 = Str::lower($request->get('apellido2'));
        $usuario->area = $request->get('area');
        $usuario->cargo = $request->get('cargo');
        $usuario->fecha_nacimiento = $request->get('fecha_nacimiento');
        $usuario->genero = $request->get('genero');
        $usuario->telefono = $request->get('telefono');
        $usuario->celular = $request->get('celular');
        $usuario->direccion = $request->get('direccion');
        $usuario->email = Str::lower($request->get('email'));
        $usuario->eps = $request->get('eps');
        $usuario->afp = $request->get('afp');
        $usuario->correo_corporativo = Str::lower($request->get('correo_corporativo'));
        $usuario->sucursal = $request->get('sucursal');
        $usuario->fecha_ingreso = $request->get('fecha_ingreso');
        $usuario->activo = 1;
        $usuario->update();
        return Redirect::to('usuario');
    }
    public function destroy(UsuarioFormRequest $requerido){
        $usuario=$requerido->get('fecha_finalizacion_contrato');
        print_r($usuario);
        die;
    }
}
