<?php

namespace reportes\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use stdClass;
use DB;

class ServiciosVistosController extends Controller
{
	protected $id = 29;

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(){
    	
    	return view('reportes.ServiciosVistos');
    }
    
}
