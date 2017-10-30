<?php

namespace reportes\Http\Controllers;

use Illuminate\Http\Request;
use reportes\Empresa;
use reportes\Puntos;
use reportes\Usersdomicilios;
use reportes\Http\Requests\UsuarioFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use GuzzleHttp\Client;
use Response;
use DB;

class DomiciliosUrbanosController extends Controller {

    protected $id = 19;

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $user = Auth::user()->id;
        $tienePermiso = $this->validarPermisos($this->id, $user);
        if ($tienePermiso) {
            $domicilios_empresas = DB::connection('mu_domicilios')->select('select id, nombre,mu_ref,tms  FROM empresa order by id desc');
            return view('domicilios.index', ["domicilios_empresas" => $domicilios_empresas]);
        } else {
            return view('home');
        }
    }

    public function create() {
        return view('domicilios.create');
    }

    public function store(Request $request) {
        $id_empresa = $request->get('id_empresa');
        $nombre_empresa = $request->get('nombre_empresa');
        $email_contacto = $request->get('email_contacto');
        $celular = $request->get('celular');
        $telefono = $request->get('telefono');
        $direccion = $request->get('direccion');

        DB::connection('mu_domicilios')->insert("insert into empresa(nombre, direccion, tel, cel, email, user_create, mu_ref)"
                . "values ('$nombre_empresa','$direccion','$telefono','$celular','$email_contacto',1,$id_empresa)");
        return Redirect::to('domicilios');
    }

    public function show($id) {
        $empresa = Empresa::findOrFail($id);
        $mu_ref = $empresa->mu_ref;
        $users_empresa = DB::select("select u.id, u.email from tbl_users u where u.empresas_id = $mu_ref");
        $users_domicilios = DB::connection('mu_domicilios')->select("select u.id,u.username,u.password_hash,u.password_reset_token,u.mu_ref from user u where empresa_id=$id");
        $puntos_domicilios = DB::connection('mu_domicilios')->select("select p.id, p.nombre, p.direccion, p.ciudad,p.parking from puntos p where empresa_id=$id order by id asc");
        
        return view("domicilios.show", ["empresa" => $empresa, "users_empresa" => $users_empresa, "users_domicilios" => $users_domicilios, "puntos_domicilios"=>$puntos_domicilios]);
    }
    public function destroy(Request $request, $id){
        $user = Usersdomicilios::findOrFail($id);
        $user->password_reset_token = $request->get('newpassword');
        $user->password_hash = Hash::make($request->get('newpassword'));
        $user->update();
        return Redirect()->back();
    }
    public function tiempos(Request $request){
        
    $id= $request->get('id');
    $lunes24 = $request->get('lunes24');
    $lunes1 = $request->get('lunes1');
    $lunes2 = $request->get('lunes2');

    $martes24 = $request->get('martes24');
    $martes1 = $request->get('martes1');
    $martes2 = $request->get('martes2');

    $miercoles24 = $request->get('miercoles24');
    $miercoles1 = $request->get('miercoles1');
    $miercoles2 = $request->get('miercoles2');

    $jueves24 = $request->get('jueves24');
    $jueves1 = $request->get('jueves1');
    $jueves2 = $request->get('jueves2');

    $viernes24 = $request->get('viernes24');
    $viernes1 = $request->get('viernes1');
    $viernes2 = $request->get('viernes2');

    $sabados24 = $request->get('sabados24');
    $sabado1 = $request->get('sabado1');
    $sabado2 = $request->get('sabado2');

    $domingos24 = $request->get('domingos24');
    $domingo1 = $request->get('domingo1');
    $domingo2 = $request->get('domingo2');

    $festivos24 = $request->get('festivos24');
    $festivos1 = $request->get('festivos1');
    $festivos2 = $request->get('festivos2');
    //si se seleccionan todo los combos entonces
    if (($lunes1) || ($martes1) ||  ($miercoles1) || ($jueves1) || ($viernes1) || ($sabado1) ||  ($domingo1) ||  ($festivos1)  == ""  ) {
       $tiempos = "'$lunes24,' '$martes24,' '$miercoles24,' '$jueves24,' '$viernes24,' '$sabados24,' '$domingos24,' '$festivos24'"; 
    }
    
    //si se llenan todos los campos eentonces
    else{
        $tiempos = "'$lunes1-$lunes2,' '$martes1-$martes2,' '$miercoles1-$miercoles2,' '$jueves1-$jueves2,' '$viernes1-$viernes2,' '$sabado1-$sabado2,' '$domingo1-$domingo2,' '$festivos1-$festivos2'"; 
    }

    DB::connection('mu_domicilios')->update('update puntos p set dir_down_der_lat = '.$tiempos.' where p.id = '.$id.'');
    return Redirect()->back();
    }

    public function cruzverde(Request $request){
        $ms = 'hello';
        return $ms;
    }

    public function usersDomicilios(Request $request) {
        $username = $request->get("username");
        $password_hash = Hash::make($request->get("password"));
        $password = $request->get("password");
        $empresa_id = $request->get("empresa_id");
        $mu_ref = $request->get("mu_ref");

        DB::connection('mu_domicilios')->insert("insert into user(username,password_hash,password_reset_token,empresa_id, mu_ref)"
                . "values ('$username','$password_hash','$password',$empresa_id,$mu_ref)");
        return redirect()->back();
    }

    public function buscarDireccion() {
        $data = Input::get('data1');
        $client = new Client();
        $response = $client->post('http://beta.api.mensajerosurbanos.com/address', [
            'json' => $data
        ]);

        $contents = (string) $response->getBody();

        return $contents;
    }

    public function crearPuntos() {
        $puntos = Input::get('puntos');
        $objeto = (object) $puntos;

        $nombre = $objeto->nombre;
        $direccion = $objeto->address;
        $lat = $objeto->lat;
        $long = $objeto->long;
        $empresa_id = $objeto->empresa_id;
        $user_create = $objeto->user_create;
        $user_modify = $objeto->user_modify;
        $ciudad = $objeto->city;
        $parking = $objeto->parking;
        
        if ($objeto->parking=='') {
            $parking=0;
        }

        DB::connection('mu_domicilios')->insert("insert into puntos(`nombre`, `direccion`, `lat`, `long`, `empresa_id`, `user_create`, `user_modify`, `ciudad`,`parking`)"
                . "values ('$nombre','$direccion','$lat','$long',$empresa_id,$user_create,$user_modify,'$ciudad',$parking)");
    }

}
