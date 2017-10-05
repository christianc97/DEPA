<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
@extends('layouts.admin')
@section('titulo')
<h3 class="box-title">Puntos Domicilios</h3>
@endsection

@section('content')
<style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #map {
        height: 100vh;

    }
    /* Optional: Makes the sample page fill the window. */
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
</style>

@section('content')
<style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #map {
        height: 100vh;

    }
    /* Optional: Makes the sample page fill the window. */
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
    label{
      font-size: 18px;
    }
</style>
<p>
  Ciudades Disponibles: &nbsp;
  <input type="button" class="btn btn-success " onclick="bogota(); this.style.background = '#337ab7'" value="Bogota">
  <input type="button" class="btn btn-success " onclick="cali(); this.style.background = '#337ab7'" value="Cali">
  <input type="button" class="btn btn-success " onclick="barranquilla(); this.style.background = '#337ab7'" value="Barranquilla">
  <input type="button" class="btn btn-success " onclick="medellin(); this.style.background = '#337ab7'" value="Medellin">
  <input type="button" class="btn btn-success " onclick="villavicencio(); this.style.background = '#337ab7'" value="Villavicencio">
  <input type="button" class="btn btn-success " onclick="cum_soacha(); this.style.background = '#337ab7'" value="Cum_Soacha">
  <input type="button" class="btn btn-success " onclick="cartagena(); this.style.background = '#337ab7'" value="Cartagena">
  <input type="button" class="btn btn-success " onclick="sta_marta(); this.style.background = '#337ab7'" value="Sta_marta">
</p>
<div id="map"></div>
<!-- Bogota -->
<script>
    function bogota() {
      
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
            
            @foreach($bogota as $p)
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
                title: ' Id: {{$p->id}} Ciudad: {{$p->ciudad}}',


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
            
            @foreach($bogota as $p)
            var marker = new google.maps.Marker({
                position: {
                lat: {{$p -> lat}},
                lng: {{$p -> long}}
                },
                icon: paradas,
                zIndex: 99999,
                map: map,
                title: 'Id: {{$p->id}} Ciudad: {{$p->ciudad}}'

            });
            @endforeach
            
            var flightPath = new google.maps.Polyline({
                path: flightPlanCoordinates,
                strokeOpacity: 1.0,
                strokeWeight: 2
                
               
            });
            @if (isset($bogota))
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

<!-- cali -->
<script>
    function cali() {
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
            
            @foreach($cali as $p)
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
                title: 'Id: {{$p->id}} Ciudad: {{$p->ciudad}}',


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
            
            @foreach($cali as $p)
            var marker = new google.maps.Marker({
                position: {
                lat: {{$p -> lat}},
                lng: {{$p -> long}}
                },
                icon: paradas,
                zIndex: 99999,
                map: map,
                title: 'Id: {{$p->id}} Ciudad: {{$p->ciudad}}'

            });
            @endforeach
            
            var flightPath = new google.maps.Polyline({
                path: flightPlanCoordinates,
                strokeOpacity: 1.0,
                strokeWeight: 2
                
               
            });
            @if (isset($cali))
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

<!--  api de google maps-->
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDONz_SC-y9biqWqhtxpLvzmChJnDobm5E&callback=bogota">
</script>

@endsection
