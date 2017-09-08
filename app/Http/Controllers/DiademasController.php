<?php

namespace reportes\Http\Controllers;

use Illuminate\Http\Request;
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
            ->select('select * from diademas');

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
        $diadema->codigo = Str::lower($request->get('codigo'));
        $diadema->fecha_compra = $request->get('fecha_compra');
        $diadema->save();
        return Redirect::to('diademas.index');
    }
}
