<?php

namespace reportes\Http\Controllers;

use Illuminate\Http\Request;
use reportes\Equipos;
use reportes\User;
use Illuminate\Support\Facades\Redirect;
use reportes\Http\Requests\EquiposFormRequest;
use Illuminate\Support\Facades\Auth;
use DB;

class asignarEquiposController extends Controller {

    public function index() {
    }

    public function store(EquiposFormRequest $request) {
        $codigo = $request->get('codigo');
        $id = $request->get('id');
        $equipos = DB::connection('reportesmensajeros')->select("select id_equipos, codigo,tipo, marca, modelo,serial, os_instalado from equipos "
                . "where codigo = '$codigo'");
        $equipos_asignados = DB::connection('reportesmensajeros')->select("select nombre1, nombre2, apellido1, apellido2, area, codigo,tipo, modelo,serial,os_instalado, fecha_asignacion, fecha_desasignacion from users_equipos ue
            inner join users u on ue.users_id=u.id
            inner join equipos e on ue.equipos_id=e.id_equipos
            where codigo = '$codigo' and fecha_asignacion is not null and fecha_desasignacion is null");
        return view('asignarEquipos.equipos', ["usuario" => User::findOrFail($id), "equipos" => $equipos, "equipos_asignados" => $equipos_asignados]);
    }

    public function edit($id) {
        $equipos = DB::connection('reportesmensajeros')->select("select id_equipos, codigo,tipo, marca, modelo,serial, os_instalado, users_id, fecha_asignacion, fecha_desasignacion from equipos e inner
            join users_equipos ue on e.id_equipos=ue.equipos_id where users_id=$id and fecha_desasignacion is null");
        return view('asignarEquipos.edit', ["usuario" => User::findOrFail($id), "equipos" => $equipos]);
    }

    public function show($id) {
        return view("asignarEquipos.show", ["equipos" => Equipos::findOrFail($id)]);
    }

    public function update(EquiposFormRequest $request, $id) {
        $equipo = $request->get('id_equipos');
        $fecha_asignacion = date('Y-m-d H:i:s');
        $asignador = Auth::id();
        $validacion = DB::connection('reportesmensajeros')->select("select id_equipos, codigo,tipo, marca, modelo,serial, os_instalado, users_id, fecha_asignacion, fecha_desasignacion from equipos e inner
            join users_equipos ue on e.id_equipos=ue.equipos_id where users_id=$id and id_equipos=$equipo and fecha_asignacion is not null and fecha_desasignacion is null");
        if(count($validacion)>0){
            return redirect()->back()->with('computador_ya_asignado', 'El usuario ya tiene el equipo asignado');
        }else{
            DB::connection('reportesmensajeros')->insert("insert into users_equipos(users_id,equipos_id, fecha_asignacion,asignador)values ($id,$equipo,'$fecha_asignacion',$asignador)");
            return redirect()->back()->with('computador_asignado', 'Equipo asignado');
        }
    }

    public function destroy(EquiposFormRequest $request, $id) {
        $equipo = $request->get('id_equipos');
        $fecha_desasignacion = date('Y-m-d H:i:s');
        DB::connection('reportesmensajeros')->delete("UPDATE users_equipos
        SET fecha_desasignacion = '$fecha_desasignacion'
        WHERE users_id=$id and equipos_id=$equipo");
        return redirect()->back()->with('computador_desasignado', 'Se desasigno el equipo');
    }

}
