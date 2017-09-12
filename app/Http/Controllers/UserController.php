<?php
namespace reportes\Http\Controllers;
use Illuminate\Http\Request;
use reportes\User;
use Illuminate\Support\Facades\Redirect;
use reportes\Http\Requests\UsuarioFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;
class UserController extends Controller {
    protected $id = 12;
    public function __construct() {
        $this->middleware('auth');
    }
    public function index() {
        $user = Auth::user()->id;
        $tienePermiso = $this->validarPermisos($this->id, $user);
        if ($tienePermiso) {
            $usuarios = DB::connection('reportesmensajeros')
            ->select('select u.id,u.cedula, u.nombre1, u.nombre2, u.apellido1, u.apellido2, u.area, u.cargo, u.sucursal, u.genero, u.celular, u.correo_corporativo, u.fecha_ingreso, u.fecha_finalizacion_contrato,GROUP_CONCAT(e.id_equipos) as id_equipos, GROUP_CONCAT(e.codigo) as codigo from users u
            left join users_equipos ue on u.id= ue.users_id
            left join equipos e on ue.equipos_id= e.id_equipos
            where u.activo=1 and ue.fecha_desasignacion is null
            group by u.id
             order by u.fecha_ingreso asc');
            foreach ($usuarios as $user) {
                $user->id_equipos = explode(',', $user->id_equipos);
                $user->codigo= explode(',', $user->codigo);
            }
            $usuarios_todos = DB::connection('reportesmensajeros')->select('select * from users order by fecha_ingreso asc');
            /* $consulta = DB::connection('reportesmensajeros')->select(' select * from users'); */
            return view('usuario.index', ["usuarios" => $usuarios, "usuarios_todos" => $usuarios_todos]);
        } else {
            return view('home');
        }
    }
    public function create() {
        return view('usuario.create');
    }
    public function store(UsuarioFormRequest $request) {
        $usuario = new User();
        $usuario->tipo_documento = 'cc';
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
        $usuario->direccion = Str::lower($request->get('direccion'));
        $usuario->email = Str::lower($request->get('email'));
        $usuario->eps = $request->get('eps');
        $usuario->afp = $request->get('afp');
        $usuario->correo_corporativo = Str::lower($request->get('correo_corporativo'));
        $usuario->sucursal = $request->get('sucursal');
        $usuario->fecha_ingreso = $request->get('fecha_ingreso');
        $usuario->fecha_finalizacion_contrato = $request->get('fecha_finalizacion_contrato');
        $usuario->password = bcrypt($request['cedula']);
        $usuario->activo = 1;
        //separa el correo corporativo para sacar el username
        $splitName = explode('@', Str::lower($request->get('correo_corporativo')), 2); // 
        $username = $splitName[0];
        $usuario->username = $username;
        $usuario->save();
        return Redirect::to('usuario');
    }
    public function show($id) {
        return view("usuario.show", ["usuario" => User::findOrFail($id)]);
    }
    public function edit($id) {
        $permisos = DB::connection('reportesmensajeros')->select("select * from permisos p
        left join users_permisos up on p.idPermisos=up.permisos_id and users_id=$id");
        return view("usuario.edit", ["usuario" => User::findOrFail($id), "permisos" => $permisos]);
        /* $usuario = DB::connection('reportesmensajeros')->select(' select * from users where id=:id', ["id" => $id]);
          return view("usuario.edit", ["usuario" => $usuario]); */
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
        $usuario->fecha_finalizacion_contrato = null;
        $usuario->activo = 1;
        if ($request->get('fecha_finalizacion_contrato') != null) {
            $usuario->fecha_finalizacion_contrato = $request->get('fecha_finalizacion_contrato');
            $usuario->activo = 0;
        }
        $usuario->update();
        return Redirect::to('usuario');
    }
    public function destroy($id) {
        $usuario = User::findOrFail($id);
        $usuario->fecha_finalizacion_contrato = date('Y-m-d H:i:s');
        $usuario->activo = 0;
        $usuario->update();
        return Redirect::to('usuario');
    }
}