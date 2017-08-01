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
        <div class="table-responsive">
            <h3 class="box-title">Crear nuevo usuario</h3>
            <table id="tablausuarios" class="table table-condensed table-hover display">
                <thead>
                <th>Username</th>
                <th>Password</th>
                <th>Usuario en mensajeros urbanos</th>
                <th></th>

                </thead>
                <tbody>
                    <tr>
                        {!! Form::open(array('url' => 'domicilios/show','method'=>'POST','autocomplete'=>'off') ) !!}
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
                        <td>{{$ud->password_reset_token}}</td>
                        <td>{{$ud->mu_ref}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <hr/>
    </div>
    <div class="col-lg-10 col-md-6 col-sm-6 col-xs-12">
        <div class="table-responsive">
            <h3 class="box-title">Nuevo punto</h3>
            <table id="tablausuarios" class="table table-condensed table-hover display">
                <thead>
                <th>Ciudad</th>
                <th>Direccion</th>
                <th></th>

                </thead>
                <tbody>
                    <tr>
                        <td>
                            <select class="form-control" id="ciudad">
                            </select>
                        </td>
                        <td><input class="form-control" type="text" id='direccion' name='direccion'></td>
                        
                        <td><button id="mibotons" class="btn btn-info" type="button">Buscar</button></td>

                    </tr>
                </tbody>
            </table>
            <div id="map"></div>
        </div>
    </div>
</div>
@endsection
<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
<script>
$(document).ready(function () {
    $.ajax({
        url: 'http://dev.api.mensajerosurbanos.com/cities?status=1',
        type: 'GET',
        beforeSend: function () {
        },
        success: function (response) {
            $("#resultado").html(response);
            for (var i = 0; i < response.data.length; i++) {
                var ciudad = response.data[i];
                $('#ciudad').append(new Option(ciudad.name, ciudad.id, true, true));
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
            center: {lat: 4.710988599999999, lng: - 74.072092},
            mapTypeId: 'terrain'
    });
        var flightPlanCoordinates = [
        ];
    @if (isset($track))
    @foreach($track as $t)
            flightPlanCoordinates.push({
            lat: {{$t -> lat}},
            lng: {{$t -> long}}
            });
        var marker = new google.maps.Marker({
        position: {
            lat: {{$t -> lat}},
            lng: {{$t -> long}}
            },
            map: map,
            title: '{{$t->time}}'
        });
    @endforeach
    @endif
        var flightPath = new google.maps.Polyline({
            path: flightPlanCoordinates,
            geodesic: true,
            strokeColor: '#FF0000',
            strokeOpacity: 1.0,
            strokeWeight: 2
        });
    @if (isset($track))
            var bounds = new google.maps.LatLngBounds();
            for (var i = 0; i < flightPlanCoordinates.length; i++) {
            bounds.extend(flightPlanCoordinates[i]);
            };
    @endif
            
    flightPath.setMap(map);
    map.fitBounds(bounds);
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDONz_SC-y9biqWqhtxpLvzmChJnDobm5E&callback=initMap">
</script>

