<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
@extends('layouts.admin')
@section('titulo')
<h3 class="box-title">Puntos Domicilio Cali</h3>
<a href="puntosdomicilios/mapa"><button class="btn btn-success btn-lg pull-right"><i class="fa fa-map-marker" aria-hidden="true"></i>  Puntos Bogota</button></a> 
<a href="puntosdomicilios/mapa"><button class="btn btn-success btn-lg pull-right"><i class="fa fa-map-marker" aria-hidden="true"></i>  Puntos Barranquilla</button></a>
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
<div id="map"></div>



@endsection
