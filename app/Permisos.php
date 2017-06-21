<?php

namespace reportes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use DB;

class Permisos extends Model {

    protected $connection = 'reportesmensajeros';
    protected $table = 'users_permisos';
    public $timesstamps = false;
    protected $fillable = [
        'users_id',
        'permisos_id',
    ];

    public static function permisos() {
        $id = Auth::user()->id;
        $permisos = DB::connection('reportesmensajeros')->select("select permisos_id from permisos p
        left join users_permisos up on p.idPermisos=up.permisos_id and users_id=$id");
         return $permisos;
        
    }

}
