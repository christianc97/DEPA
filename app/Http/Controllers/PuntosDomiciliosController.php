<?php

namespace reportes\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Storage;
use Response;

class PuntosDomiciliosController extends Controller
{
	public function index(){
  		$books = array('');
  		return Response::json($books);
		}

}
