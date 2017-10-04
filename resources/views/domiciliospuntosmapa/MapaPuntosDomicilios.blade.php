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

  <h3>Ciudades disponibles</h3><br>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <a href="/puntosdomicilios/MapaBogota">
  <div class="media">
    <div class="media-left media-top">
      <img src="https://openclipart.org/image/2400px/svg_to_png/177208/location-icon.png" class="media-object" style="width:80px">
    </div>
    <div class="media-body">
      <h4 class="media-heading">Bogota</h4>
    </div>
  </div>
  <hr>
  <a href="/puntosdomicilios/MapaCali">
  <div class="media">
    <div class="media-left media-middle">
      <img src="https://openclipart.org/image/2400px/svg_to_png/177208/location-icon.png" class="media-object" style="width:80px">
    </div>
    <div class="media-body">
      <h4 class="media-heading">Cali</h4>
    </div>
  </div>
  </a>
  <hr>
  <a href="/puntosdomicilios/MapaBarranquilla">
  <div class="media">
    <div class="media-left media-bottom">
     <img src="https://openclipart.org/image/2400px/svg_to_png/177208/location-icon.png" class="media-object" style="width:80px">
    </div>
    <div class="media-body">
      <h4 class="media-heading">Barranquilla</h4>
    </div>
  </div>
  </a>
  <hr>
  <a href="/puntosdomicilios/MapaMedellin">
  <div class="media">
    <div class="media-left media-bottom">
     <img src="https://openclipart.org/image/2400px/svg_to_png/177208/location-icon.png" class="media-object" style="width:80px">
    </div>
    <div class="media-body">
      <h4 class="media-heading">Medellin</h4>
    </div>
  </div>
  </a>
  <hr>
  <a href="/puntosdomicilios/MapaVillavicencio">
  <div class="media">
    <div class="media-left media-bottom">
     <img src="https://openclipart.org/image/2400px/svg_to_png/177208/location-icon.png" class="media-object" style="width:80px">
    </div>
    <div class="media-body">
      <h4 class="media-heading">Villavicencio</h4>
    </div>
  </div>
  </a>
  <hr>
  <a href="/puntosdomicilios/MapaCartagena">
  <div class="media">
    <div class="media-left media-bottom">
     <img src="https://openclipart.org/image/2400px/svg_to_png/177208/location-icon.png" class="media-object" style="width:80px">
    </div>
    <div class="media-body">
      <h4 class="media-heading">Cartagena</h4>
    </div>
  </div>
  </a>
  <hr>
  <a href="/puntosdomicilios/MapaSantaMarta">
  <div class="media">
    <div class="media-left media-bottom">
     <img src="https://openclipart.org/image/2400px/svg_to_png/177208/location-icon.png" class="media-object" style="width:80px">
    </div>
    <div class="media-body">
      <h4 class="media-heading">Santa Marta</h4>
    </div>
  </div>
  </a>
</div>



@endsection
