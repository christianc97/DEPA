<?php

namespace reportes\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use DB;

abstract class Controller extends BaseController {

    protected $id;

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    public function validarPermisos($id, $user) {
        $tienePermiso=false;
        //consulta los permisos del usuario
        $permisos = DB::connection('reportesmensajeros')->select('select permisos_id from users_permisos 
                                                                    where users_id=' . $user . '');
        
        foreach ($permisos as $p) {
            if ($p->permisos_id==$id) {
                $tienePermiso=$id;
            }
        }
        return $tienePermiso;
    }

}
