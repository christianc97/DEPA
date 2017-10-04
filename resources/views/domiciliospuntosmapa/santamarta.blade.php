<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
@extends('layouts.admin')
@section('titulo')
<h3 class="box-title">Puntos Domicilios Santa Marta</h3>
<div class="dropdown pull-right">
    <button class="btn btn-success dropdown-toggle btn-lg pull-right" type="button" id="menu1" data-toggle="dropdown"><i class="fa fa-map-marker" aria-hidden="true"></i>  Ciudades 
    <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
      <li role="presentation"><a role="menuitem" tabindex="-1" href="/puntosdomicilios/MapaBogota">Bogota</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="/puntosdomicilios/MapaCali">Cali</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="/puntosdomicilios/MapaBarranquilla">Barranquilla</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="/puntosdomicilios/MapaMedellin">Medellin</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="/puntosdomicilios/MapaVillavicencio">Villavicencio</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="/puntosdomicilios/MapaCartagena">Cartagena</a></li>
    </ul>
  </div>
@endsection

@section('content')
<style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #map {
        height: 80vh;

    }
    /* Optional: Makes the sample page fill the window. */
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
</style>
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
            var lineSymbol = {
                path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW
            };
            var mark = true;
            
            @foreach($puntos as $p)
                    flightPlanCoordinates.push({
                    lat: {{$p -> lat}},
                    lng: {{$p -> long}}
                 });
            var marker = new google.maps.Marker({
                position: {
                lat: {{$p -> lat}},
                lng: {{$p -> long}},
                
            },
                map: map,
                title: '{{$p-> nombre}} {{$p-> ciudad}}',


            });
            @endforeach
            
            var icon = {
            url: "https://openclipart.org/image/2400px/svg_to_png/234416/Red-Button.png", // url
                    scaledSize: new google.maps.Size(40, 40), // scaled size
            };
            var paradas = {
            url: "https://openclipart.org/image/2400px/svg_to_png/234416/Red-Button.png", // url
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
            
            @foreach($puntos as $p)
            var marker = new google.maps.Marker({
                position: {
                lat: {{$p -> lat}},
                lng: {{$p -> long}}
                },
                icon: paradas,
                zIndex: 99999,
                map: map,
                title: '{{$p-> nombre}} {{$p-> ciudad}}'

            });
            @endforeach
            
            var flightPath = new google.maps.Polyline({
                path: flightPlanCoordinates,
                strokeOpacity: 1.0,
                strokeWeight: 2
                
               
            });
            @if (isset($puntos))
                var bounds = new google.maps.LatLngBounds();
                for (var i = 0; i < flightPlanCoordinates.length; i++) {
                     bounds.extend(flightPlanCoordinates[i]);
//                     flightPath.setMap(map);
                     flightPath.setMap(null);
                };
            @endif

            map.fitBounds(bounds);
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDONz_SC-y9biqWqhtxpLvzmChJnDobm5E&callback=initMap">
</script>



@endsection
