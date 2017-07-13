<?php

namespace reportes\Http\Controllers;

use Illuminate\Http\Request;
use reportes\Equipos;
use Illuminate\Support\Facades\Redirect;
use reportes\Http\Requests\EquiposFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use stdClass;
use DB;

class EquiposController extends Controller {

    protected $id = 18;

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $user = Auth::user()->id;
        $tienePermiso = $this->validarPermisos($this->id, $user);
        if ($tienePermiso) {
            $equipos = DB::connection('reportesmensajeros')->select('select * from equipos');
            return view('equipos.index', ["equipos" => $equipos]);
        } else {
            return view('home');
        }
    }

    public function create() {
        return view('equipos.create');
    }

    public function store(EquiposFormRequest $request) {
        $equipo = new Equipos();
        $equipo->codigo = Str::lower($request->get('codigo'));
        $equipo->tipo = $request->get('tipo');
        $equipo->marca = Str::lower($request->get('marca'));
        $equipo->modelo = Str::lower($request->get('modelo'));
        $equipo->serial = Str::lower($request->get('serial'));
        $equipo->os_original = $request->get('os_original');
        $equipo->os_instalado = $request->get('os_instalado');
        $equipo->os_licenciado = $request->get('os_licenciado');
        $equipo->procesador = Str::lower($request->get('procesador'));
        $equipo->arquitectura = Str::lower($request->get('arquitectura'));
        $equipo->capacidad_ram = Str::lower($request->get('capacidad_ram'));
        $equipo->tipo_ram = Str::lower($request->get('tipo_ram'));
        $equipo->tamaño_ram = Str::lower($request->get('tamaño_ram'));
        $equipo->capacidad_hdd = Str::lower($request->get('capacidad_hdd'));
        $equipo->tipo_hdd = Str::lower($request->get('tipo_hdd'));
        $equipo->tamaño_hdd = Str::lower($request->get('tamaño_hdd'));
        $equipo->conector_hdd = Str::lower($request->get('conector_hdd'));
        $equipo->video_integrada = Str::lower($request->get('video_integrada'));
        $equipo->video_externa = Str::lower($request->get('video_externa'));
        $equipo->red_fisica = Str::lower($request->get('red_fisica'));
        $equipo->red_wireless = Str::lower($request->get('red_wireless'));
        $equipo->bluetooth = Str::lower($request->get('bluetooth'));
        $equipo->pantalla_pulgadas = Str::lower($request->get('pantalla_pulgadas'));
        $equipo->tactil = Str::lower($request->get('tactil'));
        $equipo->camara = Str::lower($request->get('camara'));
        $equipo->parlantes = Str::lower($request->get('parlantes'));
        $equipo->microfono = Str::lower($request->get('microfono'));
        $equipo->unidad_cd = Str::lower($request->get('unidad_cd'));
        $equipo->password = Str::lower($request->get('password'));
        $equipo->save();
        return Redirect::to('equipos');
    }

    public function show($id) {
        return view("equipos.show", ["equipos" => Equipos::findOrFail($id)]);
    }

    public function edit($id) {
        return view("equipos.edit", ["equipos" => Equipos::findOrFail($id)]);
    }

    public function update(EquiposFormRequest $request, $id) {
        $equipo = Equipos::findOrFail($id);
        $equipo->codigo = Str::lower($request->get('codigo'));
        $equipo->tipo = $request->get('tipo');
        $equipo->marca = Str::lower($request->get('marca'));
        $equipo->modelo = Str::lower($request->get('modelo'));
        $equipo->serial = Str::lower($request->get('serial'));
        $equipo->os_original = $request->get('os_original');
        $equipo->os_instalado = $request->get('os_instalado');
        $equipo->os_licenciado = $request->get('os_licenciado');
        $equipo->procesador = Str::lower($request->get('procesador'));
        $equipo->arquitectura = Str::lower($request->get('arquitectura'));
        $equipo->capacidad_ram = Str::lower($request->get('capacidad_ram'));
        $equipo->tipo_ram = Str::lower($request->get('tipo_ram'));
        $equipo->tamaño_ram = Str::lower($request->get('tamaño_ram'));
        $equipo->capacidad_hdd = Str::lower($request->get('capacidad_hdd'));
        $equipo->tipo_hdd = Str::lower($request->get('tipo_hdd'));
        $equipo->tamaño_hdd = Str::lower($request->get('tamaño_hdd'));
        $equipo->conector_hdd = Str::lower($request->get('conector_hdd'));
        $equipo->video_integrada = Str::lower($request->get('video_integrada'));
        $equipo->video_externa = Str::lower($request->get('video_externa'));
        $equipo->red_fisica = Str::lower($request->get('red_fisica'));
        $equipo->red_wireless = Str::lower($request->get('red_wireless'));
        $equipo->bluetooth = Str::lower($request->get('bluetooth'));
        $equipo->pantalla_pulgadas = Str::lower($request->get('pantalla_pulgadas'));
        $equipo->tactil = Str::lower($request->get('tactil'));
        $equipo->camara = Str::lower($request->get('camara'));
        $equipo->parlantes = Str::lower($request->get('parlantes'));
        $equipo->microfono = Str::lower($request->get('microfono'));
        $equipo->unidad_cd = Str::lower($request->get('unidad_cd'));
        $equipo->password = Str::lower($request->get('password'));
        $equipo->update();
        return Redirect::to('equipos');
    }

    public function destroy($id) {
        $id_equipos = DB::connection('reportesmensajeros')->select("select id_equipos from equipos where id_equipos=$id");
        foreach ($id_equipos as $f){
            $ide=$f->id_equipos;
        }
        DB::connection('reportesmensajeros')->delete("DELETE FROM equipos WHERE id_equipos=$ide");
        return Redirect::to('equipos');
        
    }

}
