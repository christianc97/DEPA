<!DOCTYPE html>
<meta charset="utf-8">
@extends('layouts.admin')

@section('titulo')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">    
    <h3 class="box-title"><i class="fa fa-users" aria-hidden="true"></i> Grupos Elite</h3>
    @foreach ($permisoAsociar as $pa)
        @if ($pa->permisos_id == 28)        

                    <a href="" data-target="#modal-create-{{$pa->permisos_id}}" data-toggle="modal">
                        <button class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Asociar Puntos</button>
                    </a>
        @endif
    @endforeach
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
                <th>Telefono Mensajero</th>
                <th>Acción</th>

                </thead>
                <input type="hidden" value="{{$var=0}}"/>
               @foreach ($gruposElite as $ge)
                <tbody>
                    <tr>
                        <td>{{++$var}}</td>
                        <td>@if($pa->permisos_id == 28) <a href="{{URL::action('GruposEliteController@show',$ge->idGrupo)}}">{{$ge->name}}</a> @else {{$ge->name}}@endif</td>
                        <td>{{$ge->tbl_users_id}}</td>
                        <td>{{$ge->nombres}}</td>
                        <td>{{$ge->apellidos}}</td>
                        <td><a href="SIP:03{{$ge->celular}}">{{$ge->celular}}</a></td>
                        <td>
                        <a href="http://admin.mensajerosurbanos.com/recursos/{{$ge->id}}" target="_blank"><button class="btn btn-info" data-toggle="tooltip" title="Ver"><span class="glyphicon glyphicon-eye-open"></span> </button></a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
@foreach ($gruposElite as $ge)
    @include('reportes.modalAsociarPuntos')
@endforeach
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
@endsection

