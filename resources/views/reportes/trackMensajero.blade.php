<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
@extends('layouts.admin')
@section('titulo')
<h3 class="box-title">Track Mensajero</h3>
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
<div>
    {!! Form::open(array('method'=>'POST','autocomplete'=>'off') ) !!}
    {{Form::token()}}
    <table class="tabledata">
        <tr>
            <td>
                <b>Id servicio 
                    @if(!empty($id_m))
                    {{$id_m}}
                    @endif
                </b>
            </td>
            <td>
                <input type="number" id="id_mensajero" name="id_mensajero" class="form-control"/>
            </td>
        </tr>
        {!! Form::close() !!}
        <tr>
            <td></td>
            <td colspan="2"> 
                <a href=""><button id="miboton" class="btn btn-primary"><i class="fa fa-motorcycle" hidden="true"></i> Mostrar ruta</button></a>
            </td>
        </tr>
    </table>
</div>
<div id="map"></div>
<div class='row1 align-left'>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
        <table class="tabledata">
            <tr>
                <td><img src="http://maps.google.com/mapfiles/ms/icons/green-dot.png"/> Inicio del track</td>
            </tr>
            <tr>
                <td><img src="http://maps.google.com/mapfiles/ms/icons/red-dot.png"/> Recorrido</td>
            </tr>
            <tr>
                <td><img src="http://maps.google.com/mapfiles/ms/icons/blue-dot.png"/> Paradas</td>
            </tr>
        </table>
    </div>
</div>
<div class='row1 align-right'>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <table id="mitabla" class="table table-condensed table-hover table-bordered table-striped">
            <thead>
                <td>Parada</td>
                <td>Dirección</td>
            </thead>
            @if(isset($paradas))
            @foreach($paradas as $p)
            <tr>
                <td>{{$p->tipo_task_places}}</td>
                <td>{{$p->direccion}}</td>
            </tr>
            @endforeach
            @endif
        </table>
    </div>
</div>
<script>
    function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 11,
                center: {lat: 4.710988599999999, lng: - 74.072092},
                mapTypeId: 'terrain'
            });
            var flightPlanCoordinates = [
            ];
            var lineSymbol = {
                path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW
            };
            var mark = true;
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
            var icon = {
            url: "http://maps.google.com/mapfiles/ms/icons/green-dot.png", // url
                    scaledSize: new google.maps.Size(40, 40), // scaled size
            };
            var paradas = {
            url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png", // url
                    scaledSize: new google.maps.Size(40, 40), // scaled size
            };
            var marker = new google.maps.Marker({
                position: {
                lat: flightPlanCoordinates[0].lat,
                lng: flightPlanCoordinates[0].lng
            },
                map: map,
                icon: icon,
                zIndex: 99999,
                title: flightPlanCoordinates[0].time
            });
            @if (isset($paradas))
            @foreach($paradas as $p)
            var marker = new google.maps.Marker({
                position: {
                lat: {{$p -> lat}},
                lng: {{$p -> long}}
                },
                icon: paradas,
                zIndex: 99999,
                map: map,
                title: 'parada: {{$p->tipo_task_places}} {{$p->direccion}}'

            });
            @endforeach
            @endif
            var flightPath = new google.maps.Polyline({
                path: flightPlanCoordinates,
                icons: [{
                icon: lineSymbol,
                offset: '100%'
            }],
                geodesic: true,
                strokeColor: '#FF0000',
                strokeOpacity: 1.0,
                strokeWeight: 2
            });
            @if (isset($track))
                var bounds = new google.maps.LatLngBounds();
                for (var i = 0; i < flightPlanCoordinates.length; i++) {
                     bounds.extend(flightPlanCoordinates[i]);
                     flightPath.setMap(map);
                };
            @endif

            map.fitBounds(bounds);
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDONz_SC-y9biqWqhtxpLvzmChJnDobm5E&callback=initMap">
</script>
@endsection
