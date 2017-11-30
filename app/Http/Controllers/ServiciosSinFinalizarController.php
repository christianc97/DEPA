<?php

namespace reportes\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use stdClass;
use DB;

class ServiciosSinFinalizarController extends Controller
{
    protected $id = 30;

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(){
    	
    	
    	return view('reportes.serviciosSinFinalizar');
    }
    
}
