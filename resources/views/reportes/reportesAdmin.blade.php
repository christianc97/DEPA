<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<head>
    <link rel='stylesheet' href="{{asset('css/estilos.css')}}">
</head>
@extends('layouts.admin')
@section('titulo')
<h3 class="box-title">Reportes admin</h3>
@endsection
@section('content')

{!! Form::open(array('url' => 'reportes/reportesAdmin','method'=>'POST','autocomplete'=>'off') ) !!}
{{Form::token()}}
<div class="table-responsive ">
    <table class="table table-condensed table-hover table-bordered table-striped">

        <thead>
        <th class="info">Id</th>
        <th class="info">Username</th>
        <th class="info">Superuser</th>
        <th class="info">Create_at</th>
        <th class="info">Nombre</th>
        <th class="info">Telefono</th>
        <th class="info">Permisos</th>
        <th class="info">Email</th>
        <th class="info">Lastvisit_at</th>
        </thead>
        @foreach ($admin as $ad)
        <tr>
            <td>{{$ad->id}}</td>
            <td>{{$ad->username}}</td>
            <td>{{$ad->superuser}}</td>
            <td>{{$ad->create_at}}</td>
            <td>{{$ad->nombre}}</td>
            <td>{{$ad->telefono}}</td>
            <td>{{$ad->Permisos}}</td>
            <td>{{$ad->email}}</td>
            <td>{{$ad->lastvisit_at}}</td>
        </tr>
        @endforeach
    </table>
    <a href="{{asset('reporteAdmin')}}"><button  class="btn btn-success fa fa-file-excel-o"> Exportar a Excel</button></a>
    {!! Form::close() !!}
</div>



@endsection