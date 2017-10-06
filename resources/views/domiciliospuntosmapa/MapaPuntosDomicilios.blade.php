<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
@extends('layouts.admin')
@section('titulo')
<h3 class="box-title">Puntos Domicilios </h3>
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
    label{
      font-size: 18px;
    }
    a:active {
    color: red;
    } 
</style>
<p>
  Ciudades Disponibles: &nbsp;
  <a href="" class="btn navbar-btn"  onclick="bogota();">
  <label class="radio-inline">
    <i class="fa fa-map-marker" aria-hidden="true" ></i> Bogota
  </label>
  </a>
  <a href="" class="btn navbar-btn"  onclick="cali();">
  <label class="radio-inline">
    <i class="fa fa-map-marker" aria-hidden="true" ></i> Cali
  </label>
  </a>
  <a href="" class="btn navbar-btn" onclick="barranquilla();">
  <label class="radio-inline" >
    <i class="fa fa-map-marker" aria-hidden="true" ></i> Barranquilla
  </label>
  </a>
  <a href="" class="btn navbar-btn" onclick="medellin();">
  <label class="radio-inline" >
    <i class="fa fa-map-marker" aria-hidden="true"></i> Medellin
  </label>
  </a>
  <a href="" class="btn navbar-btn"  onclick="villavicencio();">
  <label class="radio-inline">
    <i class="fa fa-map-marker" aria-hidden="true" ></i> Villavicencio
  </label>
  </a>
  <a href="" class="btn navbar-btn"  onclick="cum_soacha();">
  <label class="radio-inline">
    <i class="fa fa-map-marker" aria-hidden="true" ></i> Cum_Soacha
  </label>
  </a>
  <a href="" class="btn navbar-btn"  onclick="cartagena();">
  <label class="radio-inline">
    <i class="fa fa-map-marker" aria-hidden="true" ></i> Cartagena
  </label>
  </a>
  <a href="" class="btn navbar-btn" onclick="sta_marta();">
  <label class="radio-inline" >
    <i class="fa fa-map-marker" aria-hidden="true" ></i> Sta_marta
  </label>
  </a>
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
                icon: "pinkball.png",
                map: map,
                title: ' Id: {{$p->id}} Ciudad: {{$p->ciudad}}',


            });
            
            @endforeach

            
            var icon = {
            url: "https://openclipart.org/image/2400px/svg_to_png/234416/Red-Button.png", // url
                    scaledSize: new google.maps.Size(25, 25), // scaled size
            };
            var paradas = {
            url: "https://openclipart.org/image/2400px/svg_to_png/234416/Red-Button.png", // url
                    scaledSize: new google.maps.Size(25, 25), // scaled size
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

            marker.setMap(map);
              google.maps.event.addListener(marker,'click', function() {
                var infowindow = new google.maps.InfoWindow({
                  content:"Id: {{$p->id}} Ciudad: {{$p->ciudad}}"
                });
              infowindow.open(map,marker);
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

            
            event.preventDefault();
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
                //title: '<b>Nombre:</b> {{$p->nombre}} <br> <b>Ciudad:</b> {{$p->ciudad}}',


            });
             var infowindow = new google.maps.InfoWindow({
                content: '<b>Nombre:</b> {{$p->nombre}} <br> <b>Telefono:</b> {{$p->telefono}} <br> <b>Ciudad:</b> {{$p->ciudad}}',
              });
              infowindow.open(map,marker);
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
                //title: '<b>Nombre:</b> {{$p->nombre}} <br> <b>Ciudad:</b> {{$p->ciudad}}'

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
            event.preventDefault();
    }
</script>

<!-- barranquilla -->
<script>
    function barranquilla() {
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
            
            @foreach($barranquilla as $p)
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
                //title: 'Id: {{$p->id}} Ciudad: {{$p->ciudad}}',


            });
             var infowindow = new google.maps.InfoWindow({
                content: '<b>Nombre:</b> {{$p->nombre}} <br> <b>Direccion:</b> {{$p->direccion}} <br> <b>Ciudad:</b> {{$p->ciudad}}',
              });
              infowindow.open(map,marker);
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
            
            @foreach($barranquilla as $p)
            var marker = new google.maps.Marker({
                position: {
                lat: {{$p -> lat}},
                lng: {{$p -> long}}
                },
                icon: paradas,
                zIndex: 99999,
                map: map,
                //title: 'Id: {{$p->id}} Ciudad: {{$p->ciudad}}'

            });
            @endforeach
            
            var flightPath = new google.maps.Polyline({
                path: flightPlanCoordinates,
                strokeOpacity: 1.0,
                strokeWeight: 2
                
               
            });
            @if (isset($barranquilla))
                var bounds = new google.maps.LatLngBounds();
                for (var i = 0; i < flightPlanCoordinates.length; i++) {
                     bounds.extend(flightPlanCoordinates[i]);
//                     flightPath.setMap(map);
                     flightPath.setMap(null);
                };
            @endif

            map.fitBounds(bounds);
            event.preventDefault();
    }
</script>

<!-- medellin -->
<script>
    function medellin() {
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
            
            @foreach($medellin as $p)
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
                //title: 'Id: {{$p->id}} Ciudad: {{$p->ciudad}}',


            });
             var infowindow = new google.maps.InfoWindow({
                content: '<b>Telefono:</b> {{$p->telefono}} <br> <b>Ciudad:</b> {{$p->ciudad}}',
              });
              infowindow.open(map,marker);
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
            
            @foreach($medellin as $p)
            var marker = new google.maps.Marker({
                position: {
                lat: {{$p -> lat}},
                lng: {{$p -> long}}
                },
                icon: paradas,
                zIndex: 99999,
                map: map,
                //title: 'Id: {{$p->id}} Ciudad: {{$p->ciudad}}'

            });
            @endforeach
            
            var flightPath = new google.maps.Polyline({
                path: flightPlanCoordinates,
                strokeOpacity: 1.0,
                strokeWeight: 2
                
               
            });
            @if (isset($medellin))
                var bounds = new google.maps.LatLngBounds();
                for (var i = 0; i < flightPlanCoordinates.length; i++) {
                     bounds.extend(flightPlanCoordinates[i]);
//                     flightPath.setMap(map);
                     flightPath.setMap(null);
                };
            @endif

            map.fitBounds(bounds);
            event.preventDefault();
    }
</script>

<!-- villavicencio -->
<script>
    function villavicencio() {
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
            
            @foreach($villavicencio as $p)
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
                //title: 'Id: {{$p->id}} Ciudad: {{$p->ciudad}}',


            });
             var infowindow = new google.maps.InfoWindow({
                content: '<b>Nombre:</b> {{$p->nombre}} <br> <b>Direccion:</b> {{$p->direccion}} <br> <b>Ciudad:</b> {{$p->ciudad}}',
              });
              infowindow.open(map,marker);
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
            
            @foreach($villavicencio as $p)
            var marker = new google.maps.Marker({
                position: {
                lat: {{$p -> lat}},
                lng: {{$p -> long}}
                },
                icon: paradas,
                zIndex: 99999,
                map: map,
                //title: 'Id: {{$p->id}} Ciudad: {{$p->ciudad}}'

            });
            @endforeach
            
            var flightPath = new google.maps.Polyline({
                path: flightPlanCoordinates,
                strokeOpacity: 1.0,
                strokeWeight: 2
                
               
            });
            @if (isset($villavicencio))
                var bounds = new google.maps.LatLngBounds();
                for (var i = 0; i < flightPlanCoordinates.length; i++) {
                     bounds.extend(flightPlanCoordinates[i]);
//                     flightPath.setMap(map);
                     flightPath.setMap(null);
                };
            @endif

            map.fitBounds(bounds);
            event.preventDefault();
    }
</script>
<!-- cum_soacha -->
<script>
    function cum_soacha() {
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
            
            @foreach($cum_soacha as $p)
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
                //title: 'Direccion: {{$p->direccion}} Ciudad: {{$p->ciudad}}',


            });
            var infowindow = new google.maps.InfoWindow({
                content: '<b>Nombre:</b> {{$p->nombre}} <br> <b>Direccion:</b> {{$p->direccion}} <br> <b>Ciudad:</b> {{$p->ciudad}}',
              });
              infowindow.open(map,marker);
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
                
                title: flightPlanCoordinates[0].time
            });
            
            @foreach($cum_soacha as $p)
            var marker = new google.maps.Marker({
                position: {
                lat: {{$p -> lat}},
                lng: {{$p -> long}}
                },
                icon: paradas,
                
                map: map,
                //title: 'Direccion: {{$p->direccion}} Ciudad: {{$p->ciudad}}'

            });
            @endforeach
            
            var flightPath = new google.maps.Polyline({
                path: flightPlanCoordinates,
                strokeOpacity: 1.0,
                strokeWeight: 2
                
               
            });
            @if (isset($cum_soacha))
                var bounds = new google.maps.LatLngBounds();
                for (var i = 0; i < flightPlanCoordinates.length; i++) {
                     bounds.extend(flightPlanCoordinates[i]);
//                     flightPath.setMap(map);
                     flightPath.setMap(null);
                };
            @endif


            map.fitBounds(bounds);
            event.preventDefault();
    }
</script>

<!-- cartagena -->
<script>
    function cartagena() {
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
            
            @foreach($cartagena as $p)
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
                //title: 'Id: {{$p->id}} Ciudad: {{$p->ciudad}}',


            });
             var infowindow = new google.maps.InfoWindow({
                content: '<b>Telefono:</b> {{$p->telefono}} <br> <b>Ciudad:</b> {{$p->ciudad}}',
              });
              infowindow.open(map,marker);
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
            
            @foreach($cartagena as $p)
            var marker = new google.maps.Marker({
                position: {
                lat: {{$p -> lat}},
                lng: {{$p -> long}}
                },
                icon: paradas,
                zIndex: 99999,
                map: map,
                //title: 'Id: {{$p->id}} Ciudad: {{$p->ciudad}}'

            });
            @endforeach
            
            var flightPath = new google.maps.Polyline({
                path: flightPlanCoordinates,
                strokeOpacity: 1.0,
                strokeWeight: 2
                
               
            });
            @if (isset($cartagena))
                var bounds = new google.maps.LatLngBounds();
                for (var i = 0; i < flightPlanCoordinates.length; i++) {
                     bounds.extend(flightPlanCoordinates[i]);
//                     flightPath.setMap(map);
                     flightPath.setMap(null);
                };
            @endif

            map.fitBounds(bounds);
            event.preventDefault();
    }
</script>

<!-- sta_marta -->
<script>
    function sta_marta() {
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
            
            @foreach($sta_marta as $p)
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
                //title: 'Id: {{$p->id}} Ciudad: {{$p->ciudad}}',


            });
             var infowindow = new google.maps.InfoWindow({
                content: '<b>Nombre:</b> {{$p->nombre}} <br> <b>Direccion:</b> {{$p->direccion}} <br> <b>Ciudad:</b> {{$p->ciudad}}',
              });
              infowindow.open(map,marker);
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
            
            @foreach($sta_marta as $p)
            var marker = new google.maps.Marker({
                position: {
                lat: {{$p -> lat}},
                lng: {{$p -> long}}
                },
                icon: paradas,
                zIndex: 99999,
                map: map,
                //title: 'Id: {{$p->id}} Ciudad: {{$p->ciudad}}'

            });
            @endforeach
            
            var flightPath = new google.maps.Polyline({
                path: flightPlanCoordinates,
                strokeOpacity: 1.0,
                strokeWeight: 2
                
               
            });
            @if (isset($sta_marta))
                var bounds = new google.maps.LatLngBounds();
                for (var i = 0; i < flightPlanCoordinates.length; i++) {
                     bounds.extend(flightPlanCoordinates[i]);
//                     flightPath.setMap(map);
                     flightPath.setMap(null);
                };
            @endif

            map.fitBounds(bounds);
            event.preventDefault();
    }
</script>

<!--  api de google maps-->
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDONz_SC-y9biqWqhtxpLvzmChJnDobm5E&callback=bogota">
</script>

@endsection
