<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
@extends('layouts.admin')
@section('titulo')
<h3 class="box-title">Cantidad de mensajero que han comprado servicios desde las versiones de la app las ultimas 24 horas</h3>
@endsection

@section('content')
{!! Form::open(array('url' => 'reportes/reportesAdmin','method'=>'POST','autocomplete'=>'off') ) !!}
{{Form::token()}}
<div class="table-responsive  col-lg-4 col-md-4 col-sm-4 col-xs-12">
    <table class="table table-condensed table-hover table-bordered table-striped">

        <thead>
        <th class="info">#</th>
        <th class="info">Descripcion</th>
        <th class="info">mensajeros</th>
        </thead>
        <input type="hidden" value="{{$var=0}}"/>
        @foreach ($app as $ap)
        <tr>
            <td>{{++$var}}</td>
            <td>{{$ap->descripcion}}</td>
            <td>{{$ap->mensajeros}}</td>
        </tr>
        @endforeach
    </table>
    {!! Form::close() !!}
</div>
@endsection
