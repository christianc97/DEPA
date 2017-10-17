<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<meta charset="utf-8">
@extends('layouts.admin')

@section('titulo')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">    
<h3 class="box-title"><i class="fa fa-users" aria-hidden="true"></i> Grupos Elite</h3>
@endsection

@section('content')
<meta charset="utf-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="row1">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 tabcontent">
        <div class="table-responsive">
            <table id="tablausuarios" class="table table-condensed table-hover display">
            <!-- <caption><h4>Diademas</h4></caption> -->
                <thead>
                <th>N°</th>
                <th>Nombre grupo</th>
                <th>Id Mensajero</th>
                <th>Nombres Mensajero</th>
                <th>Apellidos Mensajero</th>
                <th>Acciones</th>

                </thead>
                <input type="hidden" value="{{$var=0}}"/>
               @foreach ($gruposElite as $ge)
                <tbody>
                    <tr>
                        <td>{{++$var}}</td>
                        <td>{{$ge->name}}</td>
                        <td>{{$ge->tbl_users_id}}</td>
                        <td>{{$ge->nombres}}</td>
                        <td>{{$ge->apellidos}}</td>
                        <td>
                        <a href="http://admin.mensajerosurbanos.com/recursos/{{$ge->id}}" target="_new"><button class="btn btn-info" data-toggle="tooltip" title="Ver"><span class="glyphicon glyphicon-eye-open"></span> </button></a>

                         <a href="http://admin.mensajerosurbanos.com/recursos/update/{{$ge->id}}" target="_blank"><button class="btn btn-success" data-toggle="tooltip" title="Editar"><span class="glyphicon glyphicon-edit"></span> </button></a>

                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
<!-- tooltip actions button-->
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
@endsection
