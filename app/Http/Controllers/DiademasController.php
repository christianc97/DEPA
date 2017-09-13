<?php

namespace reportes\Http\Controllers;

use Illuminate\Http\Request;
use reportes\User;
use reportes\Diademas;
use Illuminate\Support\Facades\Redirect;
use reportes\Http\Requests\DiademasFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use stdClass;
use DB;
class DiademasController extends Controller
{
    protected $id = 24;

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(){
         $user = Auth::user()->id;
        $tienePermiso = $this->validarPermisos($this->id, $user);
        if ($tienePermiso) {
    	 $diademas = DB::connection('reportesmensajeros')
            ->select('select d.id_diadema, d.codigo_d, d.fecha_compra, GROUP_CONCAT(e.id_equipos) as id_equipos, GROUP_CONCAT(e.codigo) as codigoe from diademas d
            left join equipos_diademas ed on d.id_diadema= ed.diademas_id
            left join equipos e on ed.equipos_id= e.id_equipos 
            where ed.fecha_desasignacion is null 
            group by d.id_diadema
            order by d.codigo_d asc');  
    	return view ('diademas.index', ["diademas" => $diademas]);
         } else {
            return view('home');
        }
    }

    public function create() {
        return view('diademas.create');
    }

    public function store(DiademasFormRequest $request) {
        $diadema = new Diademas();
        $diadema->codigo_d = Str::lower($request->get('codigo'));
        $diadema->fecha_compra = $request->get('fecha_compra');
        $diadema->save();
        return Redirect::to('diademas');
    }
    public function show($id_diadema) {

      $diademas_asignadas = DB::connection('reportesmensajeros')
        ->select("select codigo_d, fecha_compra from diademas where id_diadema=$id_diadema ");

        $equipos = DB::connection('reportesmensajeros')->select("select id_equipos, codigo,tipo, marca, modelo,serial, os_instalado, diademas_id, fecha_asignacion, fecha_desasignacion from equipos e inner
            join equipos_diademas ed on e.id_equipos=ed.equipos_id where diademas_id=$id_diadema and fecha_desasignacion is null");

        $id= Auth::user()->id;
        $historial= DB::connection('reportesmensajeros')->select("select hd.id_historial_diademas, hd.nota, hd.created_at, u.nombre1, u.apellido1 from historial_diademas hd
            inner join users u on hd.users_id=u.id  where diademas_id=$id_diadema order by created_at desc");
        
        return view('diademas.show', ["diadema" => Diademas::findOrFail($id_diadema), 'diademas_asignadas' => $diademas_asignadas, "equipos" => $equipos, "historial" => $historial]);
    }

    public function edit($id_diadema) {
        return view("diademas/edit", ["diademas" => Diademas::findOrFail($id_diadema)]);
    }
    
    public function update(DiademasFormRequest $request, $id_diadema) {
        $diadema = Diademas::findOrFail($id_diadema);
        $diadema->codigo_d = Str::lower($request->get('codigo_d'));
        $diadema->fecha_compra = Str::lower($request->get('fecha_compra'));
        $diadema->update();
        return Redirect::to('diademas');
    }

    public function destroy($id_diadema) {
        $id_diadema = DB::connection('reportesmensajeros')->select("select id_diadema from diademas where id_diadema=$id_diadema");
        foreach ($id_diadema as $d){
            $ide=$d->id_diadema;
        }
        DB::connection('reportesmensajeros')->delete("DELETE FROM diademas WHERE id_diadema=$ide");
        return Redirect::to('diademas');
        
    }
    
    public function agregarDescripcion(Request $request){
        $id= Auth::user()->id;
        $id_diadema= $request->get('id_diadema');
        $nota = $request->get('nota');
        DB::connection('reportesmensajeros')->insert("insert into historial_diademas(nota,users_id,diademas_id)values ('$nota',$id,$id_diadema)");
        return redirect()->back();
        
    }
}
