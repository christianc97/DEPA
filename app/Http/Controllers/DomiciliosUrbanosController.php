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
        $puntos_domicilios = DB::connection('mu_domicilios')->select("select p.id, p.nombre, p.direccion, p.zone, p.schedule, p.scheduleLabel, p.cityId, p.ciudad,p.parking from puntos p where empresa_id=$id order by id asc");

        return view("domicilios.show", ["empresa" => $empresa, "users_empresa" => $users_empresa, "users_domicilios" => $users_domicilios, "puntos_domicilios"=>$puntos_domicilios]);
    }
    public function destroy(Request $request, $id){
        $user = Usersdomicilios::findOrFail($id);
        $user->password_reset_token = $request->get('newpassword');
        $user->password_hash = Hash::make($request->get('newpassword'));
        $user->update();
        return Redirect()->back();
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
        $direccion2 = $objeto->address;
        $nombrezona = $objeto->nombrezona;
        $lat = $objeto->lat;
        $long = $objeto->long;
        $empresa_id = $objeto->empresa_id;
        $user_create = $objeto->user_create;
        $user_modify = $objeto->user_modify;
        $ciudad = $objeto->city;
        $idCity = DB::connection('mensajeros')->select('select id from ciudad where name_geoapps = "'.$ciudad.'" ');
        $cityId = $idCity[0]->id;
        $parking = $objeto->parking;
        
        if ($objeto->parking=='') {
            $parking=0;
        }

        DB::connection('mu_domicilios')->insert("insert into puntos(`nombre`, `direccion`, `direccion2`,`zone`, `lat`, `long`, `empresa_id`, `user_create`, `user_modify`, `cityId` , `ciudad`,`parking`)"
                . "values ('$nombre','$direccion','$direccion2','$nombrezona','$lat','$long',$empresa_id,$user_create,$user_modify,'$cityId','$ciudad',$parking)");
    }
    public function tiempos(Request $request){
        //id que se envia desde el ModalView de tiempos puntos
        $id= $request->get('id');
        //tomar datos de los campos
        $lunes1 = $request->get('lunes1');
        $lunes2 = $request->get('lunes2');
        
        $martes1 = $request->get('martes1');
        $martes2 = $request->get('martes2');
       
        $miercoles1 = $request->get('miercoles1');
        $miercoles2 = $request->get('miercoles2');
        
        $jueves1 = $request->get('jueves1');
        $jueves2 = $request->get('jueves2');
        
        $viernes1 = $request->get('viernes1');
        $viernes2 = $request->get('viernes2');

        $sabado1 = $request->get('sabado1');
        $sabado2 = $request->get('sabado2');
        
        $domingo1 = $request->get('domingo1');
        $domingo2 = $request->get('domingo2');

        $festivos1 = $request->get('festivos1');
        $festivos2 = $request->get('festivos2');

        //tiempos puntos
        $schedule_tiempos = "'$lunes1-$lunes2,' '$martes1-$martes2,' '$miercoles1-$miercoles2,' '$jueves1-$jueves2,' '$viernes1-$viernes2,' '$sabado1-$sabado2,' '$domingo1-$domingo2,' '$festivos1-$festivos2'"; 

        DB::connection('mu_domicilios')->update('update puntos p set schedule = '.$schedule_tiempos.' where p.id = '.$id);

        //label de tiempos
        if (($lunes1 && $lunes2) == '0' && ($martes1 && $martes2) == '0' && ($miercoles1 && $miercoles2) == '0' && ($jueves1 && $jueves2) == '0' && ($viernes1 && $viernes2) == '0' && ($sabado1 && $sabado2) == '0' && ($domingo1 && $domingo2) == '0' && ($festivos1 && $festivos2) == '0' ) {
            $scheduleLabel = "24 horas";
        }
        //de domingo a domingo
        elseif (($lunes1) == ($festivos1) && ($lunes2) == ($festivos2)) {
            //8 pm
            if ($lunes2 == 20.25) {
                $festivos2 = '8:15';
            }
            elseif ($lunes2 == 20.5) {
                $festivos2 = '8:30';
            }
            elseif ($lunes2 == 20) {
                
                $festivos2 = '8';
            }
            //6 pm
            elseif ($lunes2 == 18.25) {
                $festivos2 = '6:15';
            }
            elseif ($lunes2 == 18.5) {
                $festivos2 = '6:30';
            }
            elseif ($lunes2 == 18) {
                $festivos2 = '6';
            }
            //7 pm
            elseif ($lunes2 == 19.25) {
                $festivos2 = '7:15';
            }
            elseif ($lunes2 == 19.5) {
                $festivos2 = '7:30';
            }
            elseif ($lunes2 == 19) {
                $festivos2 = '7';
            }
            //9 pm
            elseif ($lunes2 == 21.25) {
                $festivos2 = '9:15';
            }
            elseif ($lunes2 == 21.5) {
                $festivos2 = '9:30';
            }
            elseif ($lunes2 == 21) {
                $festivos2 = '9';
            }
            //10 pm
            elseif ($lunes2 == 22.25) {
                $festivos2 = '10:15';
            }
            elseif ($lunes2 == 22.5) {
                $festivos2 = '10:30';
            }
            elseif ($lunes2 == 22) {
                $festivos2 = '10';
            }
            //11 pm
            elseif ($lunes2 == 23.25) {
                $festivos2 = '11:15';
            }
            elseif ($lunes2 == 23.5) {
                $festivos2 = '11:30';
            }
            elseif ($lunes2 == 23) {
                $festivos2 = '11';
            }

            $scheduleLabel = "Domingo a Domingo $lunes1 a.m a $festivos2 p.m";
        }
        //de lunes a sabado
        elseif (($lunes1) == ($sabado1) && ($lunes2) == ($sabado2)) {
            //8 pm
            if ($lunes2 == 20.25) {
                $sabado2 = '8:15';
            }
            elseif ($lunes2 == 20.5) {
                $sabado2 = '8:30';
            }
            elseif ($lunes2 == 20) {
                
                $sabado2 = '8';
            }
            //6 pm
            elseif ($lunes2 == 18.25) {
                $sabado2 = '6:15';
            }
            elseif ($lunes2 == 18.5) {
                $sabado2 = '6:30';
            }
            elseif ($lunes2 == 18) {
                $sabado2 = '6';
            }
            //7 pm
            elseif ($lunes2 == 19.25) {
                $sabado2 = '7:15';
            }
            elseif ($lunes2 == 19.5) {
                $sabado2 = '7:30';
            }
            elseif ($lunes2 == 19) {
                $sabado2 = '7';
            }
            //9 pm
            elseif ($lunes2 == 21.25) {
                $sabado2 = '9:15';
            }
            elseif ($lunes2 == 21.5) {
                $sabado2 = '9:30';
            }
            elseif ($lunes2 == 21) {
                $sabado2 = '9';
            }
            //10 pm
            elseif ($lunes2 == 22.25) {
                $sabado2 = '10:15';
            }
            elseif ($lunes2 == 22.5) {
                $sabado2 = '10:30';
            }
            elseif ($lunes2 == 22) {
                $sabado2 = '10';
            }
            //11 pm
            elseif ($lunes2 == 23.25) {
                $sabado2 = '11:15';
            }
            elseif ($lunes2 == 23.5) {
                $sabado2 = '11:30';
            }
            elseif ($lunes2 == 23) {
                $sabado2 = '11';
            }
            //8 pm domingos y festivos
            if ($festivos2 == 20.25) {
                $festivos2 = '8:15';
            }
            elseif ($festivos2 == 20.5) {
                $festivos2 = '8:30';
            }
            elseif ($festivos2 == 20) {
                
                $festivos2 = '8';
            }
            //3 pm domingos y festivos
            elseif ($festivos2 == 15.25) {
                $festivos2 = '3:15';
            }
            elseif ($festivos2 == 15.5) {
                $festivos2 = '3:30';
            }
            elseif ($festivos2 == 15) {
                $festivos2 = '3';
            }
            //4 pm domingos y festivos
            elseif ($festivos2 == 16.25) {
                $festivos2 = '4:15';
            }
            elseif ($festivos2 == 16.5) {
                $festivos2 = '4:30';
            }
            elseif ($festivos2 == 16) {
                $festivos2 = '4';
            }
            //5 pm domingos y festivos
            elseif ($festivos2 == 17.25) {
                $festivos2 = '5:15';
            }
            elseif ($festivos2 == 17.5) {
                $festivos2 = '5:30';
            }
            elseif ($festivos2 == 17) {
                $festivos2 = '5';
            }
            //6 pm domingos y festivos
            elseif ($festivos2 == 18.25) {
                $festivos2 = '6:15';
            }
            elseif ($festivos2 == 18.5) {
                $festivos2 = '6:30';
            }
            elseif ($festivos2 == 18) {
                $festivos2 = '6';
            }
            //7 pm domingos y festivos
            elseif ($festivos2 == 19.25) {
                $festivos2 = '7:15';
            }
            elseif ($festivos2 == 19.5) {
                $festivos2 = '7:30';
            }
            elseif ($festivos2 == 19) {
                $festivos2 = '7';
            }
            //9 pm domingos y festivos
            elseif ($festivos2 == 21.25) {
                $festivos2 = '9:15';
            }
            elseif ($festivos2 == 21.5) {
                $festivos2 = '9:30';
            }
            elseif ($festivos2 == 21) {
                $festivos2 = '9';
            }
            //10 pm domingos y festivos
            elseif ($festivos2 == 22.25) {
                $festivos2 = '10:15';
            }
            elseif ($festivos2 == 22.5) {
                $festivos2 = '10:30';
            }
            elseif ($festivos2 == 22) {
                $festivos2 = '10';
            }
            //11 pm domingos y festivos
            elseif ($festivos2 == 23.25) {
                $festivos2 = '11:15';
            }
            elseif ($festivos2 == 23.5) {
                $festivos2 = '11:30';
            }
            elseif ($festivos2 == 23) {
                $festivos2 = '11';
            }
            elseif ($festivos2 == 24) {
                $festivos1 = 'cerrado';   
                $festivos2 = 'cerrado';             
            }
            //noche domingos-------
            //8 pm domingos
            if ($domingo2 == 20.25) {
                $domingo2 = '8:15';
            }
            elseif ($domingo2 == 20.5) {
                $domingo2 = '8:30';
            }
            elseif ($domingo2 == 20) {
                
                $domingo2 = '8';
            }
            //3 pm domingos y festivos
            elseif ($domingo2 == 15.25) {
                $domingo2 = '3:15';
            }
            elseif ($domingo2 == 15.5) {
                $domingo2 = '3:30';
            }
            elseif ($domingo2 == 15) {
                $domingo2 = '3';
            }
            //4 pm domingos y festivos
            elseif ($domingo2 == 16.25) {
                $domingo2 = '4:15';
            }
            elseif ($domingo2 == 16.5) {
                $domingo2 = '4:30';
            }
            elseif ($domingo2 == 16) {
                $domingo2 = '4';
            }
            //5 pm domingos y festivos
            elseif ($domingo2 == 17.25) {
                $domingo2 = '5:15';
            }
            elseif ($domingo2 == 17.5) {
                $domingo2 = '5:30';
            }
            elseif ($domingo2 == 17) {
                $domingo2 = '5';
            }
            //6 pm domingos y festivos
            elseif ($domingo2 == 18.25) {
                $domingo2 = '6:15';
            }
            elseif ($domingo2 == 18.5) {
                $domingo2 = '6:30';
            }
            elseif ($domingo2 == 18) {
                $domingo2 = '6';
            }
            //7 pm domingos y festivos
            elseif ($domingo2 == 19.25) {
                $domingo2 = '7:15';
            }
            elseif ($domingo2 == 19.5) {
                $domingo2 = '7:30';
            }
            elseif ($domingo2 == 19) {
                $domingo2 = '7';
            }
            //9 pm domingos y festivos
            elseif ($domingo2 == 21.25) {
                $domingo2 = '9:15';
            }
            elseif ($domingo2 == 21.5) {
                $domingo2 = '9:30';
            }
            elseif ($domingo2 == 21) {
                $domingo2 = '9';
            }
            //10 pm domingos y festivos
            elseif ($domingo2 == 22.25) {
                $domingo2 = '10:15';
            }
            elseif ($domingo2 == 22.5) {
                $domingo2 = '10:30';
            }
            elseif ($domingo2 == 22) {
                $domingo2 = '10';
            }
            //11 pm domingos y festivos
            elseif ($domingo2 == 23.25) {
                $domingo2 = '11:15';
            }
            elseif ($domingo2 == 23.5) {
                $domingo2 = '11:30';
            }
            elseif ($domingo2 == 23) {
                $domingo2 = '11';
            }
            elseif ($domingo2 == 24) {
                $domingo1 = 'cerrado';
                $domingo2 = 'cerrado';
            }

            $scheduleLabel = "Lunes a Sabado de $lunes1 a.m a $sabado2 p.m, Domingos de $domingo1 a.m a $domingo2 p.m, y Festivos de $festivos1 a.m a $festivos2 p.m";
        }
        // de lunes a viernes
        elseif (($lunes1) == ($viernes1) && ($lunes2) == ($viernes2)) {
            //8 pm
            if ($festivos2 == 20.25) {
                $festivos2 = '8:15';
            }
            elseif ($festivos2 == 20.5) {
                $festivos2 = '8:30';
            }
            elseif ($festivos2 == 20) {
                
                $festivos2 = '8';
            }
            //6 pm domingos y festivos
            elseif ($festivos2 == 18.25) {
                $festivos2 = '6:15';
            }
            elseif ($festivos2 == 18.5) {
                $festivos2 = '6:30';
            }
            elseif ($festivos2 == 18) {
                $festivos2 = '6';
            }
            //7 pm domingos y festivos
            elseif ($festivos2 == 19.25) {
                $festivos2 = '7:15';
            }
            elseif ($festivos2 == 19.5) {
                $festivos2 = '7:30';
            }
            elseif ($festivos2 == 19) {
                $festivos2 = '7';
            }
            //9 pm domingos y festivos
            elseif ($festivos2 == 21.25) {
                $festivos2 = '9:15';
            }
            elseif ($festivos2 == 21.5) {
                $festivos2 = '9:30';
            }
            elseif ($festivos2 == 21) {
                $festivos2 = '9';
            }
            //10 pm domingos y festivos
            elseif ($festivos2 == 22.25) {
                $festivos2 = '10:15';
            }
            elseif ($festivos2 == 22.5) {
                $festivos2 = '10:30';
            }
            elseif ($festivos2 == 22) {
                $festivos2 = '10';
            }
            //11 pm domingos y festivos
            elseif ($festivos2 == 23.25) {
                $festivos2 = '11:15';
            }
            elseif ($festivos2 == 23.5) {
                $festivos2 = '11:30';
            }
            elseif ($festivos2 == 23) {
                $festivos2 = '11';
            }
            elseif ($festivos2 == 24) {
                $festivos1 = 'cerrado';   
                $festivos2 = 'cerrado';             
            }
            //viernes noche 8 pm
            elseif ($lunes2 == 20.25) {
                $viernes2 = '8:15';
            }
            elseif ($lunes2 == 20.5) {
                $viernes2 = '8:30';
            }
            elseif ($lunes2 == 20) {
                
                $viernes2 = '8';
            }
            //6 pm
            elseif ($lunes2 == 18.25) {
                $viernes2 = '6:15';
            }
            elseif ($lunes2 == 18.5) {
                $viernes2 = '6:30';
            }
            elseif ($lunes2 == 18) {
                $viernes2 = '6';
            }
            //7 pm
            elseif ($lunes2 == 19.25) {
                $viernes2 = '7:15';
            }
            elseif ($lunes2 == 19.5) {
                $viernes2 = '7:30';
            }
            elseif ($lunes2 == 19) {
                $viernes2 = '7';
            }
            //9 pm
            elseif ($lunes2 == 21.25) {
                $viernes2 = '9:15';
            }
            elseif ($lunes2 == 21.5) {
                $viernes2 = '9:30';
            }
            elseif ($lunes2 == 21) {
                $viernes2 = '9';
            }
            //10 pm
            elseif ($lunes2 == 22.25) {
                $viernes2 = '10:15';
            }
            elseif ($lunes2 == 22.5) {
                $viernes2 = '10:30';
            }
            elseif ($lunes2 == 22) {
                $viernes2 = '10';
            }
            //11 pm
            elseif ($lunes2 == 23.25) {
                $viernes2 = '11:15';
            }
            elseif ($lunes2 == 23.5) {
                $viernes2 = '11:30';
            }
            elseif ($lunes2 == 23) {
                $viernes2 = '11';
            }
            //sabdos noche
            if ($sabado2 == 20.25) {
                $sabado2 = '8:15';
            }
            elseif ($sabado2 == 20.5) {
                $sabado2 = '8:30';
            }
            elseif ($sabado2 == 20) {
                
                $sabado2 = '8';
            }
            //6 pm
            elseif ($sabado2 == 18.25) {
                $sabado2 = '6:15';
            }
            elseif ($sabado2 == 18.5) {
                $sabado2 = '6:30';
            }
            elseif ($sabado2 == 18) {
                $sabado2 = '6';
            }
            //7 pm
            elseif ($sabado2 == 19.25) {
                $sabado2 = '7:15';
            }
            elseif ($sabado2 == 19.5) {
                $sabado2 = '7:30';
            }
            elseif ($sabado2 == 19) {
                $sabado2 = '7';
            }
            //9 pm
            elseif ($sabado2 == 21.25) {
                $sabado2 = '9:15';
            }
            elseif ($sabado2 == 21.5) {
                $sabado2 = '9:30';
            }
            elseif ($sabado2 == 21) {
                $sabado2 = '9';
            }
            //10 pm
            elseif ($sabado2 == 22.25) {
                $sabado2 = '10:15';
            }
            elseif ($sabado2 == 22.5) {
                $sabado2 = '10:30';
            }
            elseif ($sabado2 == 22) {
                $sabado2 = '10';
            }
            //11 pm
            elseif ($sabado2 == 23.25) {
                $sabado2 = '11:15';
            }
            elseif ($sabado2 == 23.5) {
                $sabado2 = '11:30';
            }
            elseif ($sabado2 == 23) {
                $sabado2 = '11';
            }
            elseif ($sabado2 == 24) {
                $sabado1 = 'cerrado';
                $sabado2 = 'cerrado';
            }
            elseif ($sabado2 == 0) {
                $sabado1 = 'Todo el dia';
                $sabado2 = 'Todo el dia';
            }

            //noche domingos-------
            //8 pm domingos
            if ($domingo2 == 20.25) {
                $domingo2 = '8:15';
            }
            elseif ($domingo2 == 20.5) {
                $domingo2 = '8:30';
            }
            elseif ($domingo2 == 20) {
                
                $domingo2 = '8';
            }
            //5 pm domingos y festivos
            elseif ($domingo2 == 17.25) {
                $domingo2 = '5:15';
            }
            elseif ($domingo2 == 17.5) {
                $domingo2 = '5:30';
            }
            elseif ($domingo2 == 17) {
                $domingo2 = '5';
            }
            //6 pm domingos y festivos
            elseif ($domingo2 == 18.25) {
                $domingo2 = '6:15';
            }
            elseif ($domingo2 == 18.5) {
                $domingo2 = '6:30';
            }
            elseif ($domingo2 == 18) {
                $domingo2 = '6';
            }
            //7 pm domingos y festivos
            elseif ($domingo2 == 19.25) {
                $domingo2 = '7:15';
            }
            elseif ($domingo2 == 19.5) {
                $domingo2 = '7:30';
            }
            elseif ($domingo2 == 19) {
                $domingo2 = '7';
            }
            //9 pm domingos y festivos
            elseif ($domingo2 == 21.25) {
                $domingo2 = '9:15';
            }
            elseif ($domingo2 == 21.5) {
                $domingo2 = '9:30';
            }
            elseif ($domingo2 == 21) {
                $domingo2 = '9';
            }
            //10 pm domingos y festivos
            elseif ($domingo2 == 22.25) {
                $domingo2 = '10:15';
            }
            elseif ($domingo2 == 22.5) {
                $domingo2 = '10:30';
            }
            elseif ($domingo2 == 22) {
                $domingo2 = '10';
            }
            //11 pm domingos y festivos
            elseif ($domingo2 == 23.25) {
                $domingo2 = '11:15';
            }
            elseif ($domingo2 == 23.5) {
                $domingo2 = '11:30';
            }
            elseif ($domingo2 == 23) {
                $domingo2 = '11';
            }
            elseif ($domingo2 == 24) {
                $domingo1 = 'cerrado';
                $domingo2 = 'cerrado';
            }
            elseif ($domingo2 == 0) {
                $domingo1 = 'Todo el dia';
                $domingo2 = 'Todo el dia';
            }


            $scheduleLabel = "Lunes a Viernes de $lunes1 a.m a $viernes2 p.m, Sabados de $sabado1 a.m a $sabado2 p.m, Domingos de $domingo1 a $domingo2, y Festivos de $festivos1 a.m a $festivos2 p.m";
        }
        // de lunes a jueves
        elseif (($lunes1) == ($jueves1) && ($lunes2) == ($jueves2)) {
            //jueves noche
            if ($lunes2 == 20.25) {
                $jueves2 = '8:15';
            }
            elseif ($lunes2 == 20.5) {
                $jueves2 = '8:30';
            }
            elseif ($lunes2 == 20) {
                
                $jueves2 = '8';
            }
            //6 pm
            elseif ($lunes2 == 18.25) {
                $jueves2 = '6:15';
            }
            elseif ($lunes2 == 18.5) {
                $jueves2 = '6:30';
            }
            elseif ($lunes2 == 18) {
                $jueves2 = '6';
            }
            //7 pm
            elseif ($lunes2 == 19.25) {
                $jueves2 = '7:15';
            }
            elseif ($lunes2 == 19.5) {
                $jueves2 = '7:30';
            }
            elseif ($lunes2 == 19) {
                $jueves2 = '7';
            }
            //9 pm
            elseif ($lunes2 == 21.25) {
                $jueves2 = '9:15';
            }
            elseif ($lunes2 == 21.5) {
                $jueves2 = '9:30';
            }
            elseif ($lunes2 == 21) {
                $jueves2 = '9';
            }
            //10 pm
            elseif ($lunes2 == 22.25) {
                $jueves2 = '10:15';
            }
            elseif ($lunes2 == 22.5) {
                $jueves2 = '10:30';
            }
            elseif ($lunes2 == 22) {
                $jueves2 = '10';
            }
            //11 pm
            elseif ($lunes2 == 23.25) {
                $jueves2 = '11:15';
            }
            elseif ($lunes2 == 23.5) {
                $jueves2 = '11:30';
            }
            elseif ($lunes2 == 23) {
                $jueves2 = '11';
            }
            //viernes noche--//viernes 6pm
            if ($viernes2 == 18) {
                $viernes2 = '6';
            }
            elseif ($viernes2 == 18.5) {
                $viernes2 = '6:30';
            }
            elseif ($viernes2 == 18.25) {
                $viernes2 = '6:15';
            }
            //viernes noche 7 pm
            elseif ($viernes2 == 19) {
                $viernes2 = '7';
            }
            elseif ($viernes2 == 19.5) {
                $viernes2 = '7:30';
            }
            elseif ($viernes2 == 19.25) {
                $viernes2 = '7:15';
            }
            //viernes 8 pm noche
            elseif ($viernes2 == 20) {
                $viernes2 = '8';
            }
            elseif ($viernes2 == 20.5) {
                $viernes2 = '8:30';
            }
            elseif ($viernes2 == 20.25) {
                $viernes2 = '8:15';
            }
            //viernes 9 pm noche
            elseif ($viernes2 == 21) {
                $viernes2 = '9';
            }
            elseif ($viernes2 == 21.5 ) {
                $viernes2 = '9:30';
            }
            elseif ($viernes2 == 21.25) {
                $viernes2 ='9:15';
            }
            //viernes 10 pm noche
            elseif ($viernes2 == 22) {
                $viernes2 = '10';
            }
            elseif ($viernes2 == 22.5) {
                $viernes2 = '10:30';
            }
            elseif ($viernes2 == 22.25)  {
                $viernes2 = '10:15';
            }
            //viernes 11 pm noche
            elseif ($viernes2 == 23) {
                $viernes2 = '11';
            }
            elseif ($viernes2 == 23.5) {
                $viernes2 = '11:30';
            }
            elseif ($viernes2 == 23.25)  {
                $viernes2 = '11:15';
            }
            //sabado noche-------------------
            //sabado 6pm
            if ($sabado2 == 18) {
                $sabado2 = '6';
            }
            elseif ($sabado2 == 18.5) {
                $sabado2 = '6:30';
            }
            elseif ($sabado2 == 18.25) {
                $sabado2 = '6:15';
            }
            //viernes noche 7 pm
            elseif ($sabado2 == 19) {
                $sabado2 = '7';
            }
            elseif ($sabado2 == 19.5) {
                $sabado2 = '7:30';
            }
            elseif ($sabado2 == 19.25) {
                $sabado2 = '7:15';
            }
            //viernes 8 pm noche
            elseif ($sabado2 == 20) {
                $sabado2 = '8';
            }
            elseif ($sabado2 == 20.5) {
                $sabado2 = '8:30';
            }
            elseif ($sabado2 == 8.25) {
                $sabado2 = '8:15';
            }
            //viernes 9 pm noche
            elseif ($sabado2 == 21) {
                $sabado2 = '9';
            }
            elseif ($sabado2 == 21.5 ) {
                $sabado2 = '9:30';
            }
            elseif ($sabado2 == 21.25) {
                $sabado2 ='9:15';
            }
            //viernes 10 pm noche
            elseif ($sabado2 == 22) {
                $sabado2 = '10';
            }
            elseif ($sabado2 == 22.5) {
                $sabado2 = '10:30';
            }
            elseif ($sabado2 == 22.25)  {
                $sabado2 = '10:15';
            }
            //viernes 11 pm noche
            elseif ($sabado2 == 23) {
                $sabado2 = '10';
            }
            elseif ($sabado2 == 23.5) {
                $sabado2 = '10:30';
            }
            elseif ($sabado2 == 23.25)  {
                $sabado2 = '10:15';
            }
            //----------------------------
            //domingo noche--
            //viernes 6pm
            if ($domingo2 == 17) {
                $domingo2 = '5';
            }
            elseif ($domingo2 == 17.5) {
                $domingo2 = '5:30';
            }
            elseif ($domingo2 == 17.25) {
                $domingo2 = '5:15';
            }
            //viernes 6pm
            if ($domingo2 == 18) {
                $domingo2 = '6';
            }
            elseif ($domingo2 == 18.5) {
                $domingo2 = '6:30';
            }
            elseif ($domingo2 == 18.25) {
                $domingo2 = '6:15';
            }
            //viernes noche 7 pm
            elseif ($domingo2 == 19) {
                $domingo2 = '7';
            }
            elseif ($domingo2 == 19.5) {
                $domingo2 = '7:30';
            }
            elseif ($domingo2 == 19.25) {
                $domingo2 = '7:15';
            }
            //viernes 8 pm noche
            elseif ($domingo2 == 20) {
                $domingo2 = '8';
            }
            elseif ($domingo2 == 20.5) {
                $domingo2 = '8:30';
            }
            elseif ($domingo2 == 8.25) {
                $domingo2 = '8:15';
            }
            //viernes 9 pm noche
            elseif ($domingo2 == 21) {
                $domingo2 = '9';
            }
            elseif ($domingo2 == 21.5 ) {
                $domingo2 = '9:30';
            }
            elseif ($domingo2 == 21.25) {
                $domingo2 ='9:15';
            }
            //viernes 10 pm noche
            elseif ($domingo2 == 22) {
                $domingo2 = '10';
            }
            elseif ($domingo2 == 22.5) {
                $domingo2 = '10:30';
            }
            elseif ($domingo2 == 22.25)  {
                $domingo2 = '10:15';
            }
            //viernes 11 pm noche
            elseif ($domingo2 == 23) {
                $domingo2 = '10';
            }
            elseif ($domingo2 == 23.5) {
                $domingo2 = '10:30';
            }
            elseif ($domingo2 == 23.25)  {
                $domingo2 = '10:15';
            }
            //---------------------------------
            //viernes noche--//viernes 6pm
            if ($festivos2 == 18) {
                $festivos2 = '6';
            }
            elseif ($festivos2 == 18.5) {
                $festivos2 = '6:30';
            }
            elseif ($festivos2 == 18.25) {
                $festivos2 = '6:15';
            }
            //viernes noche 7 pm
            elseif ($festivos2 == 19) {
                $festivos2 = '7';
            }
            elseif ($festivos2 == 19.5) {
                $festivos2 = '7:30';
            }
            elseif ($festivos2 == 19.25) {
                $festivos2 = '7:15';
            }
            //viernes 8 pm noche
            elseif ($festivos2 == 20) {
                $festivos2 = '8';
            }
            elseif ($festivos2 == 20.5) {
                $festivos2 = '8:30';
            }
            elseif ($festivos2 == 8.25) {
                $festivos2 = '8:15';
            }
            //viernes 9 pm noche
            elseif ($festivos2 == 21) {
                $festivos2 = '9';
            }
            elseif ($festivos2 == 21.5 ) {
                $festivos2 = '9:30';
            }
            elseif ($festivos2 == 21.25) {
                $festivos2 ='9:15';
            }
            //viernes 10 pm noche
            elseif ($festivos2 == 22) {
                $festivos2 = '10';
            }
            elseif ($festivos2 == 22.5) {
                $festivos2 = '10:30';
            }
            elseif ($festivos2 == 22.25)  {
                $festivos2 = '10:15';
            }
            //viernes 11 pm noche
            elseif ($festivos2 == 23) {
                $festivos2 = '10';
            }
            elseif ($festivos2 == 23.5) {
                $festivos2 = '10:30';
            }
            elseif ($festivos2 == 23.25)  {
                $festivos2 = '10:15';
            }
            elseif ($festivos2 == 24) {
                $festivos1 = 'cerrado';
                $festivos2 = 'cerrado';
            }
            $scheduleLabel = "Lunes a Jueves de $lunes1 a.m a $jueves2 p.m, Viernes de $viernes1 a.m a $viernes2 p.m, Sabados de $sabado1 a.m a $sabado2 p.m, Domingos de $domingo1 a.m a $domingo2 p.m, Festivos de $festivos1 a.m a $festivos2 p.m";
        }
        else{

            $scheduleLabel = "Lunes de $lunes1 a.m a $lunes2 p.m, Martes de $martes1 a.m a $martes2 p.m, Miercoles de $miercoles1 a.m a $miercoles2 p.m, Jueves de $jueves1 a.m a $jueves2 p.m, Viernes de $viernes1 a.m a $viernes2 p.m, Sabados de $sabado1 a.m a $sabado2 p.m, Domingos de $domingo1 a.m a $domingo2 p.m, Festivos de $festivos1 a.m a $festivos2 p.m";
        }

        DB::connection('mu_domicilios')->update('update puntos p set scheduleLabel = "'.$scheduleLabel.'" where p.id = '.$id);
        return Redirect()->back();
    }
    public function editNombrePunto(Request $request){

        $id = $request->get('id');
        $nuevo_punto = $request->get('nuevopunto');
        $nueva_zona = $request->get('nuevazona');

        $edit_punto = DB::connection('mu_domicilios')->update('update puntos p set nombre =  "'.$nuevo_punto.'", zone = "'.$nueva_zona.'" where p.id = '.$id);
        
        return Redirect()->back();
    }

}
;