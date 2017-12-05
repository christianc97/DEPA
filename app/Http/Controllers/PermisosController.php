<?php

namespace reportes\Http\Controllers;

use Illuminate\Http\Request;
use reportes\Permisos;
use reportes\User;
use Illuminate\Support\Facades\Redirect;
use reportes\Http\Requests\PermisosFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use DB;

class PermisosController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('usuario.edit');
    }

    public function store(PermisosFormRequest $request) {
        
    }

    public function show($id) {
        return view("usuario.show", ["usuario" => User::findOrFail($id)]);
    }

    public function edit($id) {
        $permisos = DB::connection('reportesmensajeros')->select("select p.idPermisos, p.nombre_permiso, up.id_users_permisos, up.users_id, up.permisos_id, up.created_at, u.nombre1, u.apellido1 from permisos p
                    left join users_permisos up on p.idPermisos=up.permisos_id and users_id=$id
                    left join users u on u.id = up.users_id
                      ;");

        return view("permisos.edit", ["usuario" => User::findOrFail($id), "permisos" => $permisos]);
    }

    public function update(PermisosFormRequest $request, $id) {


        $permiso = $request->get('idPermiso');
        DB::connection('reportesmensajeros')->insert("insert into users_permisos(users_id,permisos_id)values ($id,$permiso)");
        return redirect()->back()->with('permiso_asignado', 'Permiso asignado');
    }

    public function destroy(PermisosFormRequest $request, $id) {
        $permiso = $request->get('idPermiso');
        DB::connection('reportesmensajeros')->delete("DELETE FROM users_permisos WHERE users_id=$id  and permisos_id=$permiso");
        return redirect()->back()->with('permiso_desasignado', 'Permiso desasignado');
    }

}
