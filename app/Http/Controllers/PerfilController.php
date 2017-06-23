<?php

namespace reportes\Http\Controllers;

use Illuminate\Http\Request;
use reportes\User;
use Illuminate\Support\Facades\Auth;
use reportes\Http\Requests\UsuarioFormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use DB;


class PerfilController extends Controller
{
    public function __contruct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        if ($request) {
            $id = Auth::user()->id;
            $usuarios = DB::connection('reportesmensajeros')->select("select * from users where id=$id");
            return view('perfil.index', ["usuario" => $usuarios]);
        }
    }

    public function edit($id) {
        return view('perfil.edit', ["usuario" => User::findOrFail($id)]);
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
        return Redirect::to('perfil');
    }
}
