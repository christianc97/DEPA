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
    //funcion editar informacion diademas
    public function edit($id_diadema) {
        //Hace consulta de las diademas asignadas a un equipo
        $equipos = DB::connection('reportesmensajeros')->select("select id_equipos, codigo,tipo, marca, modelo,serial, os_instalado, diademas_id, fecha_asignacion, fecha_desasignacion from equipos e inner
            join equipos_diademas ed on e.id_equipos=ed.equipos_id where diademas_id=$id_diadema and fecha_desasignacion is null");

        $codigos = DB::connection('reportesmensajeros')->select('select id_equipos, codigo from equipos');

        return view('asignardiademas.edit', ["diadema" => Diademas::findOrFail($id_diadema), "equipos" => $equipos, 'codigos' => $codigos]);
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
