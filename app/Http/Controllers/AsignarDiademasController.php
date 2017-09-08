<?php

namespace reportes\Http\Controllers;

use Illuminate\Http\Request;
use reportes\Diademas;
use reportes\User;
use Illuminate\Support\Facades\Redirect;
use reportes\Http\Requests\DiademasFormRequest;
use Illuminate\Support\Facades\Auth;
use DB;

class AsignarDiademasController extends Controller
{
    public function store(DiademasFormRequest $request) {
       
    }

    public function edit($id_diadema) {
        $diademas = DB::connection('reportesmensajeros')->select("select id_diadema, codigo, fecha_compra from diademas d inner
            join equipos_diademas ed on d.id_diadema=ed.id_equipos where id_diademas=$id_diadema and fecha_desasignacion is null");
        return view('asignardiademas.edit', ["diadema" => User::findOrFail($id_diadema), "diademas" => $diademas]);
    }

    
    
}
