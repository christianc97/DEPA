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
        var map= {
        center:new google.maps.LatLng(4.710988599999999,- 74.072092),
        zoom:11,
        mapTypeId: 'terrain'
        };
        var map = new google.maps.Map(document.getElementById("map"),map);
        @foreach($bogota as $pb)
            var icon = {
            url: "https://openclipart.org/image/2400px/svg_to_png/234416/Red-Button.png", // url
                    scaledSize: new google.maps.Size(15, 15), // scaled size
            };
        var marker = new google.maps.Marker({
                position: {
                lat: {{$pb -> lat}},
                lng: {{$pb -> long}},
            },
                icon: icon,
                map: map,
            });
        google.maps.event.addListener(marker,'click',function() {
        var infowindow = new google.maps.InfoWindow({
          content: '<b>Nombre:</b> {{$pb->nombre}}<br> <b>Id Empresa:</b> {{$pb->empresa_id}} <br> <b>Empresa:</b> {{$pb->empresa_id}} <br> <b>Direccion:</b> {{$pb->direccion}}',
            });
          infowindow.open(map,marker);
          });
        @endforeach
        event.preventDefault();
        }
</script>

<script>
    function cali() {
        var map= {
        center:new google.maps.LatLng(3.451944, -76.531167),
        zoom:11,
        mapTypeId: 'terrain'
        };
        var map=new google.maps.Map(document.getElementById("map"),map);
        @foreach($cali as $pc)
            var icon = {
            url: "https://openclipart.org/image/2400px/svg_to_png/234416/Red-Button.png", // url
                    scaledSize: new google.maps.Size(15, 15), // scaled size
            };
        var marker = new google.maps.Marker({
                position: {
                lat: {{$pc -> lat}},
                lng: {{$pc -> long}},
            },
                icon: icon,
                map: map,
            });
        google.maps.event.addListener(marker,'click',function() {
        var infowindow = new google.maps.InfoWindow({
          content: '<b>Nombre:</b> {{$pc->nombre}}<br> {{$pc->ciudad}} <br> <b>Direccion:</b> {{$pc->direccion}}',
            });
          infowindow.open(map,marker);
          });
        @endforeach
        event.preventDefault();
        }
</script>
<script >
    function barranquilla() {
        var map= {
        center:new google.maps.LatLng(11.004025, -74.809437),
        zoom:11,
        mapTypeId: 'terrain'
        };
        var map=new google.maps.Map(document.getElementById("map"),map);
        @foreach($barranquilla as $pbr)
            var icon = {
            url: "https://openclipart.org/image/2400px/svg_to_png/234416/Red-Button.png", // url
                    scaledSize: new google.maps.Size(15, 15), // scaled size
            };
        var marker = new google.maps.Marker({
                position: {
                lat: {{$pbr -> lat}},
                lng: {{$pbr -> long}},
            },
                icon: icon,
                map: map,
            });
        google.maps.event.addListener(marker,'click',function() {
        var infowindow = new google.maps.InfoWindow({
          content: '<b>Nombre:</b> {{$pbr->nombre}}<br> {{$pbr->ciudad}} <br> <b>Direccion:</b> {{$pbr->direccion}}',
            });
          infowindow.open(map,marker);
          });
        @endforeach
        event.preventDefault();
        }
</script>

<script >
    function medellin() {
        var map= {
        center:new google.maps.LatLng(6.252633, -75.564466),
        zoom:11,
        mapTypeId: 'terrain'
        };
        var map=new google.maps.Map(document.getElementById("map"),map);
        @foreach($medellin as $pm)
            var icon = {
            url: "https://openclipart.org/image/2400px/svg_to_png/234416/Red-Button.png", // url
                    scaledSize: new google.maps.Size(15, 15), // scaled size
            };
        var marker = new google.maps.Marker({
                position: {
                lat: {{$pm -> lat}},
                lng: {{$pm -> long}},
            },
                icon: icon,
                map: map,
            });
        google.maps.event.addListener(marker,'click',function() {
        var infowindow = new google.maps.InfoWindow({
          content: '<b>Nombre:</b> {{$pm->nombre}}<br> {{$pm->ciudad}} <br> <b>Direccion:</b> {{$pm->direccion}}',
            });
          infowindow.open(map,marker);
          });
        @endforeach
        event.preventDefault();
        }
</script>
<script >
    function villavicencio() {
        var map= {
        center:new google.maps.LatLng(4.151466, -73.636183),
        zoom:11,
        mapTypeId: 'terrain'
        };
        var map=new google.maps.Map(document.getElementById("map"),map);
        @foreach($villavicencio as $pv)
            var icon = {
            url: "https://openclipart.org/image/2400px/svg_to_png/234416/Red-Button.png", // url
                    scaledSize: new google.maps.Size(15, 15), // scaled size
            };
        var marker = new google.maps.Marker({
                position: {
                lat: {{$pv -> lat}},
                lng: {{$pv -> long}},
            },
                icon: icon,
                map: map,
            });
        google.maps.event.addListener(marker,'click',function() {
        var infowindow = new google.maps.InfoWindow({
          content: '<b>Nombre:</b> {{$pv->nombre}}<br> {{$pv->ciudad}} <br> <b>Direccion:</b> {{$pv->direccion}}',
            });
          infowindow.open(map,marker);
          });
        @endforeach
        event.preventDefault();
        }
</script>

<script >
    function cum_soacha() {
        var map= {
        center:new google.maps.LatLng(4.57549,-74.2312017),
        zoom:13,
        mapTypeId: 'terrain'
        };
        var map=new google.maps.Map(document.getElementById("map"),map);
        @foreach($cum_soacha as $pcs)
            var icon = {
            url: "https://openclipart.org/image/2400px/svg_to_png/234416/Red-Button.png", // url
                    scaledSize: new google.maps.Size(15, 15), // scaled size
            };
        var marker = new google.maps.Marker({
                position: {
                lat: {{$pcs -> lat}},
                lng: {{$pcs -> long}},
            },
                icon: icon,
                map: map,
            });
        google.maps.event.addListener(marker,'click',function() {
        var infowindow = new google.maps.InfoWindow({
          content: '<b>Nombre:</b> {{$pcs->nombre}}<br> {{$pcs->ciudad}} <br> <b>Direccion:</b> {{$pcs->direccion}}',
            });
          infowindow.open(map,marker);
          });
        @endforeach
        event.preventDefault();
        }
</script>

<script >
    function cartagena() {
        var map= {
        center:new google.maps.LatLng(10.391417, -75.476254),
        zoom:11,
        mapTypeId: 'terrain'
        };
        var map=new google.maps.Map(document.getElementById("map"),map);
        @foreach($cartagena as $pcta)
            var icon = {
            url: "https://openclipart.org/image/2400px/svg_to_png/234416/Red-Button.png", // url
                    scaledSize: new google.maps.Size(15, 15), // scaled size
            };
        var marker = new google.maps.Marker({
                position: {
                lat: {{$pcta -> lat}},
                lng: {{$pcta -> long}},
            },
                icon: icon,
                map: map,
            });
        google.maps.event.addListener(marker,'click',function() {
        var infowindow = new google.maps.InfoWindow({
          content: '<b>Nombre:</b> {{$pcta->nombre}}<br> {{$pcta->ciudad}} <br> <b>Direccion:</b> {{$pcta->direccion}}',
            });
          infowindow.open(map,marker);
          });
        @endforeach
        event.preventDefault();
        }
</script>

<script >
    function sta_marta() {
        var map= {
        center:new google.maps.LatLng(11.2315668,-74.1999066),
        zoom:13,
        mapTypeId: 'terrain'
        };
        var map=new google.maps.Map(document.getElementById("map"),map);
        @foreach($sta_marta as $psmt)
            var icon = {
            url: "https://openclipart.org/image/2400px/svg_to_png/234416/Red-Button.png", // url
                    scaledSize: new google.maps.Size(15, 15), // scaled size
            };
        var marker = new google.maps.Marker({
                position: {
                lat: {{$psmt -> lat}},
                lng: {{$psmt -> long}},
            },
                icon: icon,
                map: map,
            });
        google.maps.event.addListener(marker,'click',function() {
        var infowindow = new google.maps.InfoWindow({
          content: '<b>Nombre:</b> {{$psmt->nombre}}<br> {{$psmt->ciudad}} <br> <b>Direccion:</b> {{$psmt->direccion}}',
            });
          infowindow.open(map,marker);
          });
        @endforeach
        event.preventDefault();
        }
</script>


<!--  api de google maps-->
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDONz_SC-y9biqWqhtxpLvzmChJnDobm5E&callback=bogota">
</script>

@endsection
