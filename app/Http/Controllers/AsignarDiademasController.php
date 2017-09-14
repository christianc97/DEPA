<?php

namespace reportes\Http\Controllers;

use Illuminate\Http\Request;
use reportes\Diademas;
use reportes\User;
use Illuminate\Support\Facades\Redirect;
use reportes\Http\Requests\DiademasFormRequest;
use reportes\Http\Requests\EquiposFormRequest;
use Illuminate\Support\Facades\Auth;
use DB;

class AsignarDiademasController extends Controller
{
    public function index() {
    }

     public function store(EquiposFormRequest $request) {
        $codigo = $request->get('codigo');
        $id = $request->get('id');
        $equipos = DB::connection('reportesmensajeros')->select("select id_equipos, codigo,tipo, marca, modelo,serial, os_instalado from equipos "
                . "where codigo = '$codigo'");
        $equipos_asignados = DB::connection('reportesmensajeros')->select("select nombre1, nombre2, apellido1, apellido2, area, fecha_asignacion, fecha_desasignacion from users_equipos ue
            inner join users u on ue.users_id=u.id
            inner join equipos e on ue.equipos_id=e.id_equipos
            where codigo = '$codigo' and fecha_asignacion is not null and fecha_desasignacion is null");
        return view('asignardiademas.diademas', ["usuario" => User::findOrFail($id), "equipos" => $equipos, "equipos_asignados" => $equipos_asignados]);
    }

    public function edit($id_diadema) {
        $equipos = DB::connection('reportesmensajeros')->select("select id_equipos, codigo,tipo, marca, modelo,serial, os_instalado, diademas_id, fecha_asignacion, fecha_desasignacion from equipos e inner
            join equipos_diademas ed on e.id_equipos=ed.equipos_id where diademas_id=$id_diadema and fecha_desasignacion is null");
        return view('asignardiademas.edit', ["diadema" => Diademas::findOrFail($id_diadema), "equipos" => $equipos]);
    }
    public function show($id_diadema) {
        return view("asignardiademas.show", ["diademas" => Diademas::findOrFail($id_diadema)]);
    }

    public function update(DiademasFormRequest $request, $id_diadema) {
        $equipo = $request->get('id_equipos');
        $fecha_asignacion = date('Y-m-d H:i:s');
        $asignador = Auth::id();
        $validacion = DB::connection('reportesmensajeros')->select("select id_equipos, codigo,tipo, marca, modelo,serial, os_instalado, diademas_id
            , fecha_asignacion, fecha_desasignacion from equipos e inner
            join equipos_diademas ed on e.id_equipos=ed.equipos_id where diademas_id=$id_diadema and id_equipos=$equipo and fecha_asignacion is not null and fecha_desasignacion is null");
        if(count($validacion)>0){
            return redirect()->back()->with('computador_ya_asignado', 'La diadema esta asignada a el equipo');
        }else{
            DB::connection('reportesmensajeros')->insert("insert into equipos_diademas(diademas_id,equipos_id, fecha_asignacion, asignador)values ($id_diadema , $equipo,'$fecha_asignacion',$asignador)");
            return redirect()->back()->with('computador_asignado', 'Equipo asignado');
        }
    } 
    public function destroy($id_equipos) {
        $id_equipos = DB::connection('reportesmensajeros')->select("select equipos_id from equipos_diademas where equipos_id=$id_equipos");
        foreach ($id_equipos as $ie){
            $ide= $ie->equipos_id;
        }
        DB::connection('reportesmensajeros')->delete("DELETE FROM equipos_diademas WHERE equipos_id= $ide");
        return redirect()->back()->with('computador_desasignado', 'Se desasigno el equipo');
    }
}
