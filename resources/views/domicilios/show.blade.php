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
                <button class="btn btn-box-tool" onclick="abre();"><i class="fa fa-plus"></i></button>
                <button class="btn btn-box-tool" onclick="cierra();"><i class="fa fa-minus"></i></button>
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
                    @include('domicilios.modal')
                    @endforeach
                </tbody>
            </table>
        </div>
        <hr/>
    </div>


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
                <th></th>

                </thead>
                <tbody>
                    @foreach($puntos_domicilios as $pd)
                    <tr>
                        <td>{{$pd->id}}</td>
                        <td>{{$pd->nombre}}</td>
                        <td>{{$pd->direccion}}</td>
                        <td>{{$pd->ciudad}}</td>
                        <td>{{$pd->parking}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <hr/>
    </div>
</div>

@endsection
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

