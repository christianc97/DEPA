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
                <b>Id servicio</b>
            </td>
            <td>
                <input type="number" id="id_mensajero" name="id_mensajero" class="form-control"/>
            </td>
        </tr>
        {!! Form::close() !!}
        <tr>
            <td></td>
            <td colspan="2"> 
                <a href=""><button id="miboton"  class="btn btn-primary"><i class="fa fa-motorcycle" hidden="true"></i> Mostrar ruta</button></a>
            </td>
        </tr>
    </table>
</div>


<div id="map"></div>
<script>
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
@endsection
