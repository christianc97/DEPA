<?php

namespace reportes\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use DB;

class reporteAdminController extends Controller {
    
    protected $id=2;
    
    public function __construct() {
        $this->middleware('auth');
        
    }

    public function index() {
        $user=Auth::user()->id;
        $tienePermiso=$this->validarPermisos($this->id,$user);
        if ($tienePermiso) {
           $admin = DB::select('SELECT  u.id, u.username, u.superuser, u.create_at, pr.nombre, pr.telefono, IFNULL(GROUP_CONCAT(p.itemname), "Basico") "Permisos", u.email, u.lastvisit_at
          FROM tbl_users u
          LEFT JOIN tbl_profiles pr ON u.id = pr.user_id
          LEFT JOIN AuthAssignment p ON u.id = p.userid
          WHERE u.superuser = 1
          GROUP BY id, username, superuser,create_at, nombre, telefono, email, lastvisit_at
          ORDER BY username ASC
          ');
        return view('reportes/reportesAdmin',["admin" => $admin]);
        }else{
            return view('home');
        }
        
    }

    public function exportarAdmin() {
        Excel::create('reporte Admin', function ($excel) {
            $excel->sheet('reporte usuarios admin', function($sheet) {
                $admin = DB::select('SELECT  u.id, u.username, u.superuser, u.create_at, pr.nombre, pr.telefono, IFNULL(GROUP_CONCAT(p.itemname), "Basico") "Permisos", u.email, u.lastvisit_at
          FROM tbl_users u
          LEFT JOIN tbl_profiles pr ON u.id = pr.user_id
          LEFT JOIN AuthAssignment p ON u.id = p.userid
          WHERE u.superuser = 1
          GROUP BY id, username, superuser,create_at, nombre, telefono, email, lastvisit_at
          ORDER BY username ASC
          ');
                foreach ($admin as &$ad) {
                    $ad = (array) $ad;
                }
                $sheet->fromArray($admin);
            });
        })->export('xls');
    }

}
