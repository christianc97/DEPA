<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
@extends('layouts.admin')

@section('titulo')
<h3 class="box-title">Domicilios urbanos puntos</h3>

@endsection

@section('content')
<div class="row1">
    <div id="personal_activo" class="col-lg-8 col-md-8 col-sm-8 col-xs-12 tabcontent">
        <div class="table-responsive">
            <table id="tablausuarios" class="table table-condensed table-hover display">
                <thead>
                <th>Id</th>
                <th>Nombre punto</th>
                <th>Direccion</th>
                <th>Ciudad</th>
                <th>Nombre empresa</th> 
                <th>Parking</th>
                <th></th>

                </thead>
                @foreach ($domicilios_puntos as $dp)
                <tbody>
                    <tr>
                        <td>{{$dp->id}}</td>
                        <td>{{$dp->nombre}}</td>
                        <td>{{$dp->direccion}}</td>
                        <td>{{$dp->ciudad}}</td>
                        <td><a href="domicilios/{{$dp->empresa_id}}">{{$dp->nombre}}</a></td>
                        <td>{{$dp->parking}}</td>
                        <td><a href="{{URL::action('DomiciliosPuntosController@show',$dp->id)}}"><button class="btn btn-success">Ver en mapa</button></a></td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection