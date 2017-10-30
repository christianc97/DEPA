<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
@extends('layouts.admin')

@section('titulo')
<h3 class="box-title">{{$empresa->nombre}}</h3>
@endsection

@section('content')
<style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #map {
        height: 50vh;
    }
    /* Optional: Makes the sample page fill the window. */
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
</style>
<div class='row1 align-left'>
    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
        <div class="table-responsive">
            <table id="mitabla" class="table table-condensed table-hover table-bordered table-striped">

                <tr>
                    <td><label>Id</label></td>
                    <td>{{$empresa->id}}</td>
                </tr>
                <tr>
                    <td><label>Nombre empresa</label></td>
                    <td>{{$empresa->nombre}}</td>
                </tr>
                <tr>
                    <td><label>Email contacto</label></td>
                    <td>{{$empresa->email}}</td>
                </tr>
                <tr>
                    <td><label>Celular</label></td>
                    <td>{{$empresa->cel}}</td>
                </tr>
                <tr>
                    <td><label>Telefono</label></td>
                    <td>{{$empresa->tel}}"</td>
                </tr>
                <tr>
                    <td><label>Dirección</label></td>
                    <td>{{$empresa->direccion}}</td>
                </tr>
                <tr>
                    <td><label>Mu ref</label></td>
                    <td>{{$empresa->mu_ref}}</td>
                </tr>
            </table>
        </div>
        <hr/>
    </div>
    <div class="col-lg-10 col-md-6 col-sm-6 col-xs-12">
        <h3 class="box-title">Crear nuevo usuario <div class="box-tools pull-right">
            <button class="btn btn-box-tool text text-success btn-success" onclick="abre();" ><i class="fa fa-plus" ></i></button>
            <button class="btn btn-box-tool text text-danger" onclick="cierra();"><i class="fa fa-minus"></i></button>
            </div></h3>
    </div>
    <div id="desaparece" style="display:none">
        <div class="col-lg-10 col-md-6 col-sm-6 col-xs-12">
            <div class="table-responsive">
                <table id="tablausuarios" class="table table-condensed table-hover display">
                    <thead>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Usuario en mensajeros urbanos</th>
                    <th></th>

                    </thead>
                    <tbody>
                        <tr>
                            {!! Form::open(array('url' => 'domicilios/crearUsuario','method'=>'POST','autocomplete'=>'off') ) !!}
                            {{Form::token()}}
                            <td><input class="form-control" type="text" id='username' name='username'></td>
                            <td><input class="form-control" type="password" id='password' name='password'>
                                <input type="hidden" id="empresa_id" name="empresa_id" value="{{$empresa->id}}">
                            </td>
                            <td>
                                <select class="form-control" name="mu_ref" value="">
                                    @foreach($users_empresa as $ue)
                                    <option value="{{$ue->id}}">{{$ue->id}} - {{$ue->email}}</option>
                                    @endforeach
                                </select>

                            </td>
                            <td><button id="miboton" class="btn btn-info" type="submit">Crear usuario</button></td>
                            {!! Form::close() !!}
                        </tr>
                    </tbody>
                </table>
            </div>
            <hr/>
        </div>
    </div>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <div class="col-lg-10 col-md-6 col-sm-6 col-xs-12">
        <div class="table-responsive">
            <h3 class="box-title">Usuarios en domicilios</h3>
            <table id="tablausuarios" class="table table-condensed table-hover display">
                <thead>
                <th>Id</th>
                <th>Username</th>
                <th>Password</th>
                <th>Mu ref</th>
                <th></th>

                </thead>
                <tbody>
                    @foreach($users_domicilios as $ud)
                    <tr>
                        <td>{{$ud->id}}</td>
                        <td>{{$ud->username}}</td> 
                        <td>{{$ud->password_reset_token}} 
                            <a href="" data-target="#modal-delete-{{$ud->id}}" data-toggle="modal">
                                <button class="btn btn-success" title="Editar contraseña">
                                    <span class="glyphicon glyphicon-pencil"></span> 
                                </button>
                            </a>
                        </td>
                        <td>{{$ud->mu_ref}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <hr/>
    </div>
 @foreach($users_domicilios as $ud)
 @include('domicilios.modal')
 @endforeach

    <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
        <div class="table-responsive"><h3 class="box-title">Crear nuevo punto</h3>

            <table id="tablausuarios" class="table table-condensed table-hover display">
                <tr>
                    <th>Ciudad</th>
                    <td>
                        <select class="form-control" id="ciudad" name="ciudad"></select>
                    </td>
                </tr>
                <tr>
                    <th>Direccion</th>
                    <td><input class="form-control" type="text" id='direccion' name='direccion'>
                        <div class="demo-container">
                            <div class="demo-box" style="color: red"></div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><button id="search" class="btn btn-info" type="button">Buscar</button></td>
                    <td><span id="resultado"></span></td>
                </tr>
                <tbody>
                    <tr>
                        <th>Nombre punto</th>
                        <td><input class="form-control" type="text" id='nombre_punto' name='nombre_punto'></td>
                    </tr>
                    <tr>
                        <th>Parking</th>
                        <td><input class="form-control" type="number" id='parking' name='parking'></td>

                    </tr>
                    <tr>
                        <td><button id="crear_punto" class="btn btn-info" type="button">Crear punto</button></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
    <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
        <div class="table-responsive">
            <div id="map"></div>
        </div>
    </div>
    <div class="col-lg-10 col-md-6 col-sm-6 col-xs-12">
        <div class="table-responsive">
            <h3 class="box-title">Puntos en domicilios</h3>
            <table id="tablausuarios" class="table table-condensed table-hover display">
                <thead>
                <th>Id</th>
                <th>Nombre punto</th>
                <th>Direccion</th>
                <th>Ciudad</th>
                <th>Parking</th>
                <th>Tiempos</th>
                </thead>
                <tbody>
                    @foreach($puntos_domicilios as $pd)
                    <tr>
                        <td>{{$pd->id}}</td>
                        <td>{{$pd->nombre}}</td>
                        <td>{{$pd->direccion}}</td>
                        <td>{{$pd->ciudad}}</td>
                        <td>{{$pd->parking}}</td>
                        <td><a href="" data-target="#modal-view-{{$pd->id}}" data-toggle="modal"><button class="btn btn-primary"><span class="glyphicon glyphicon-time"></span></button></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <hr/>
    </div>
</div>
    @foreach($puntos_domicilios as $pd)
     @include('domicilios.ModalView')
    @endforeach
@endsection
   <script>
            function lunes(value)
            {

                if(value==false)
                {
                    document.getElementById("lunes1").disabled=false;
                    document.getElementById("lunes2").disabled=false;
                }else if(value==true){
                    document.getElementById("lunes1").disabled=true;
                    document.getElementById("lunes2").disabled=true;
                    
                }
            }
            function martes(value)
            {
                if(value==false)
                {
                    document.getElementById("martes1").disabled=false;
                    document.getElementById("martes2").disabled=false;
                }else if(value==true){
                    document.getElementById("martes1").disabled=true;
                    document.getElementById("martes2").disabled=true;
                }
            }
            function miercoles(value)
            {
                if(value==false)
                {
                    document.getElementById("miercoles1").disabled=false;
                    document.getElementById("miercoles2").disabled=false;
                }else if(value==true){
                    document.getElementById("miercoles1").disabled=true;
                    document.getElementById("miercoles2").disabled=true;
                }
            }
            function jueves(value)
            {
                if(value==false)
                {
                    document.getElementById("jueves1").disabled=false;
                    document.getElementById("jueves2").disabled=false;
                }else if(value==true){
                    document.getElementById("jueves1").disabled=true;
                    document.getElementById("jueves2").disabled=true;
                }
            }
            function viernes(value)
            {
                if(value==false)
                {
                    document.getElementById("viernes1").disabled=false;
                    document.getElementById("viernes2").disabled=false;
                }else if(value==true){
                    document.getElementById("viernes1").disabled=true;
                    document.getElementById("viernes2").disabled=true;
                }
            }
            function sabado(value)
            {
                if(value==false)
                {
                    document.getElementById("sabado1").disabled=false;
                    document.getElementById("sabado2").disabled=false;
                }else if(value==true){
                    document.getElementById("sabado1").disabled=true;
                    document.getElementById("sabado2").disabled=true;
                }
            }
            function domingo(value)
            {
                if(value==false)
                {
                    document.getElementById("domingo1").disabled=false;
                    document.getElementById("domingo2").disabled=false;
                }else if(value==true){
                    document.getElementById("domingo1").disabled=true;
                    document.getElementById("domingo2").disabled=true;
                }
            }
            function festivos(value)
            {
                if(value==false)
                {
                    document.getElementById("festivos1").disabled=false;
                    document.getElementById("festivos2").disabled=false;
                }else if(value==true){
                    document.getElementById("festivos1").disabled=true;
                    document.getElementById("festivos2").disabled=true;
                }
            }
            function falert(value)
            {
                var val = document.getElementById('dialunes').alert(val);
            }
    </script>

<script>
    function validar() {
    var a0, a1, a2, b0, b1, b2, c1, c2, d1, d2, e1, e2, f1, f2, g1, g2, h1, h2 ;
    //lunes
    a0 = document.getElementById("lunes24"). value;
    a1 = document.getElementById("lunes1"). value;
    a2 = document.getElementById("lunes2"). value;
    //martes
    b0 = document.getElementById("martes24"). value;
    b1 = document.getElementById("martes1"). value;
    b2 = document.getElementById("martes2"). value;
    //miercoles
    c1 = document.getElementById("miercoles1"). value;
    c2 = document.getElementById("miercoles2"). value;
    //jueves
    d1 = document.getElementById("jueves1"). value;
    d2 = document.getElementById("jueves2"). value;
    //viernes
    e1 = document.getElementById("viernes1"). value;
    e2 = document.getElementById("viernes2"). value;
    //sabados
    f1 = document.getElementById("sabado1"). value;
    f2 = document.getElementById("sabado2"). value;
    //domingos
    g1 = document.getElementById("domingo1"). value;
    g2 = document.getElementById("domingo2"). value;
    //festivos
    h1 = document.getElementById("festivos1"). value;
    h2 = document.getElementById("festivos2"). value;

    //lunes
    if (isNaN(a1) || a1 < 0 || a1 < 24) {
        text = "ok";
    } else {
        document.getElementById("lunes1"). value = "";
        alert("Ingrese los valores estalecidos\nnumeros entre (0 y 23.99)");
    }
    if (isNaN(a2) || a2 < 0 || a2 < 24) {
        text = "ok";
    } else {
        document.getElementById("lunes2"). value = "";
        alert("Ingrese los valores estalecidos\nnumeros entre (0 y 23.99)");
    }
    //martes
    if (isNaN(b1) || b1 < 0 || b1 < 24) {
        text = "ok";
    } else {
        document.getElementById("martes1"). value = "";
        alert("Ingrese los valores estalecidos\nnumeros entre (0 y 23.99)");
    }
    if (isNaN(b2) || b2 < 0 || b2 < 24) {
        text = "ok";
    } else {
        document.getElementById("martes2"). value = "";
        alert("Ingrese los valores estalecidos\nnumeros entre (0 y 23.99)");
    }
    //miercoles
    if (isNaN(c1) || c1 < 0 || c1 < 24) {
        text = "ok";
    } else {
        document.getElementById("miercoles1"). value = "";
        alert("Ingrese los valores estalecidos\nnumeros entre (0 y 23.99)");
    }
    if (isNaN(c2) || c2 < 0 || c2 < 24) {
        text = "ok";
    } else {
        document.getElementById("miercoles2"). value = "";
        alert("Ingrese los valores estalecidos\nnumeros entre (0 y 23.99)");
    }
    //jueves
    if (isNaN(d1) || d1 < 0 || d1 < 24) {
        text = "ok";
    } else {
        document.getElementById("jueves1"). value = "";
        alert("Ingrese los valores estalecidos\nnumeros entre (0 y 23.99)");
    }
    if (isNaN(d2) || d2 < 0 || d2 < 24) {
        text = "ok";
    } else {
        document.getElementById("jueves2"). value = "";
        alert("Ingrese los valores estalecidos\nnumeros entre (0 y 23.99)");
    }
    //viernes
    if (isNaN(e1) || e1 < 0 || e1 < 24) {
        text = "ok";
    } else {
        document.getElementById("viernes1"). value = "";
        alert("Ingrese los valores estalecidos\nnumeros entre (0 y 23.99)");
    }
    if (isNaN(e2) || e2 < 0 || e2 < 24) {
        text = "ok";
    } else {
        document.getElementById("viernes2"). value = "";
        alert("Ingrese los valores estalecidos\nnumeros entre (0 y 23.99)");
    }
    //sabados
    if (isNaN(f1) || f1 < 0 || f1 < 24) {
        text = "ok";
    } else {
        document.getElementById("sabado1"). value = "";
        alert("Ingrese los valores estalecidos\nnumeros entre (0 y 23.99)");
    }
    if (isNaN(f2) || f2 < 0 || f2 < 24) {
        text = "ok";
    } else {
        document.getElementById("sabado2"). value = "";
        alert("Ingrese los valores estalecidos\nnumeros entre (0 y 23.99)");
    }
    //domingos
    if (isNaN(g1) || g1 < 0 || g1 < 24) {
        text = "ok";
    } else {
        document.getElementById("domingo1"). value = "";
        alert("Ingrese los valores estalecidos\nnumeros entre (0 y 23.99)");
    }
    if (isNaN(g2) || g2 < 0 || g2 < 24) {
        text = "ok";
    } else {
        document.getElementById("domingo2"). value = "";
        alert("Ingrese los valores estalecidos\nnumeros entre (0 y 23.99)");
    }
    //festivos
    if (isNaN(h1) || h1 < 0 || h1 < 24) {
        text = "ok";
    } else {
        document.getElementById("festivos1"). value = "";
        alert("Ingrese los valores estalecidos\nnumeros entre (0 y 23.99)");
    }
    if (isNaN(h2) || h2 < 0 || h2 < 24) {
        text = "ok";
    } else {
        document.getElementById("festivos2"). value = "";
        alert("Ingrese los valores estalecidos\nnumeros entre (0 y 23.99)");
    }
}
</script>
<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
<script>
                    var lat;
                    var long;
                    $(document).ready(function () {
                        $('#nombre_punto').val('');
                        $('#direccion').val('');
                        $('#parking').val('');
                        $('#ciudad').val('');
                        $('#crear_punto').css('display', 'none');
                        $.ajax({
                            url: 'http://dev.api.mensajerosurbanos.com/cities?status=1',
                            type: 'GET',
                            beforeSend: function () {
                            },
                            success: function (response) {
                                $("#resultado").html(response);
                                for (var i = 0; i < response.data.length; i++) {
                                    var ciudad = response.data[i];
                                    $('#ciudad').append(new Option(ciudad.name, ciudad.name_geoapps, true, false));
                                }
                            }
                        });
                        $('#miboton').click(function () {
                            var username = $("#username").val();
                            var password = $("#password").val();
                            var espacios = false;
                            var cont = 0;
                            if (!username == '' || !password == '') {
                                while (!espacios && (cont < username.length)) {
                                    if (username.charAt(cont) == " ")
                                        espacios = true;
                                    cont++;
                                }

                                if (espacios) {
                                    alert("El username no puede tener espacios");
                                    return false;
                                }

                                if (password.length < 6) {
                                    alert("El password debe tener mas de seis caracteres");
                                    return false;
                                }
                            } else {
                                alert('Llene los campos');
                                return false;
                            }

                        });
                    });
                    function initMap() {
                        var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 11,
                            center: {lat: 4.710988599999999, lng: -74.072092},
                            mapTypeId: 'terrain'
                        });
                        $('#search').click(function () {
                            var data = {
                                address: $('#direccion').val(),
                                city: $('#ciudad').val()};
                            $.ajax({
                                url: '/domicilios/buscarDireccion',
                                data: {data1: data},
                                type: 'post', //en este caso
                                dataType: 'html',
                                beforeSend: function () {
                                    $("#resultado").html("Buscando, espere por favor...");
                                },
                                success: function (response) {
                                    $("#resultado").html("");
                                    response = JSON.parse(response);
                                    lat = (response.data.coordinates[1]);
                                    long = response.data.coordinates[0];
                                    map.setCenter({lat: lat, lng: long});
                                    map.setZoom(18);
                                    var marker = new google.maps.Marker({
                                        position: {lat: lat, lng: long},
                                        map: map
                                    });
                                    for (var i = 0; i < markers.length; i++) {
                                        markers[i].setMap(null);
                                    }
                                    markers = [];
                                    markers.push(marker);
                                    $("div.demo-container").html('');
                                    jQuery("#direccion").css("border", "");
                                    $('#crear_punto').css('display', 'block');
                                },
                                error: function (error) {
                                    $("#resultado").html("");
                                    for (var i = 0; i < markers.length; i++) {
                                        markers[i].setMap(null);
                                    }
                                    markers = [];
                                    jQuery("#direccion").css("border", "1px solid red");
                                    $("div.demo-container").html('Direccion no valida');
                                    $("#crear_punto").css('display', 'none');
                                }
                            });
                        });
                        var markers = [];
                        $('#crear_punto').click(function () {
                            crearPunto();
                            
                        });
                    }
                    function crearPunto() {
                        if ($('#nombre_punto').val()=='') {
                            jQuery("#nombre_punto").css("border", "1px solid red");
                            jQuery("#parking").css("border", "");
                        } else {
                        var data = {
                            nombre: $('#nombre_punto').val(),
                            address: $('#direccion').val(),
                            lat: lat,
                            long: long,
                            empresa_id: {{$empresa->id}},
                            user_create: 1,
                            user_modify: 1,
                            city: $('#ciudad').val(),
                            parking: $('#parking').val()};
                        $.ajax({
                            url: '/domicilios/crearPuntos',
                            data: {puntos: data},
                            type: 'post',
                            dataType: 'html',
                            success: function (response) {
                                location.reload();
                            },
                            error: function (error) {
                                $("#resultado").html("No se pudo crear el punto, intentelo nuevamente");
                            }
                        });
                    }
                    }


                    function abre() {
                        comprueba = document.getElementById("desaparece").style.display;
                        if (comprueba == 'none')
                            document.getElementById("desaparece").style.display = "block";
                        else
                            document.getElementById("desaparece").style.display = "none";
                    }
                    function cierra() {
                        comprueba = document.getElementById("desaparece").style.display;
                        if (comprueba == 'block')
                            document.getElementById("desaparece").style.display = "none";
                        else
                            document.getElementById("desaparece").style.display = "block";
                    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDONz_SC-y9biqWqhtxpLvzmChJnDobm5E&callback=initMap">
</script>

