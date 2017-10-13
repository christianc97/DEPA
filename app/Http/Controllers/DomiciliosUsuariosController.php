<?php

namespace reportes\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use reportes\Empresa;
use reportes\Usersdomicilios;
use reportes\Http\Requests\UsuarioFormRequest;
use reportes\Http\Requests\EmpresasFormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use stdClass;
use DB;

class DomiciliosUsuariosController extends Controller {

    protected $id = 20;



    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $user = Auth::user()->id;
        $tienePermiso = $this->validarPermisos($this->id, $user);
        if ($tienePermiso) {
            $domicilios_usuarios = DB::connection('mu_domicilios')->select('select e.id, e.direccion, e.mu_ref empresa_mu ,e.nombre nombre_empresa, u.mu_ref as usuario_mu, u.username, u.password_reset_token,  GROUP_CONCAT(p.ciudad) as ciudad  from user u
            inner join empresa e on u.empresa_id = e.id
            inner join (select p.id, p.empresa_id, p.ciudad from puntos p group by p.empresa_id, p.ciudad
            order by p.empresa_id) p on p.empresa_id= e.id group by u.id order by p.empresa_id desc;
            ');
            return view('domiciliosUsuarios.index', ["domicilios_usuarios" => $domicilios_usuarios]);
        } else {
            return view('home');
        }
    }
   public function edit($id) {
        return view("domiciliosUsuarios.edit", ["empresa" => Empresa::findOrFail($id)]);
    }

    public function update(EmpresasFormRequest $request, $id) {
        $empresa = Empresa::findOrFail($id);
        $empresa->direccion = $request->get('direccion');
        $empresa->update();
        return Redirect::to('domiciliosUsuarios');
    }

}
