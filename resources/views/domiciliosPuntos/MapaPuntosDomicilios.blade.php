<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
@extends('layouts.admin')
@section('titulo')
<h3 class="box-title">Puntos Domicilio <b>@foreach ($domicilios_puntos as $dp) {{$dp->nombre}} ({{$dp->id}}) @endforeach</b></h3>
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
<div id="map" style="height: 600px "></div>

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
            @foreach($domicilios_puntos as $dp)
                    flightPlanCoordinates.push({
                    lat: {{$dp -> lat}},
                    lng: {{$dp -> long}}
                 });
            var marker = new google.maps.Marker({
                position: {
                lat: {{$dp -> lat}},
                lng: {{$dp -> long}},
                
            },
                map: map,
                title: '{{$dp->direccion}} {{$dp->hora_apertura}} {{$dp->hora_cierre}}'

            });
            @endforeach
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
           
            @foreach($domicilios_puntos as $dp)
            var marker = new google.maps.Marker({
                position: {
                lat: {{$dp -> lat}},
                lng: {{$dp -> long}}
                },
                icon: paradas,
                zIndex: 99999,
                map: map,
                title:  'Parada: {{$dp->nombre}} {{$dp->direccion}} '
                

            });
            @endforeach
           
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

    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDONz_SC-y9biqWqhtxpLvzmChJnDobm5E&callback=initMap">
</script>



@endsection
