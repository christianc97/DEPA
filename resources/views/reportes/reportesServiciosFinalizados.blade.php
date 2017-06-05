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
<h3 class="box-title">Reportes Servicios del mensajero </h3>
@endsection
@section('content')


{!! Form::open(array('url' => 'reportes/reportesServiciosFinalizados','method'=>'POST','autocomplete'=>'off') ) !!}
{{Form::token()}}
<table class="tabledata">
    <tr>
        <td>
            <b>Estado del servicio</b>
        </td>
        <td>
            <select id="es" name="es" class="form-control btn btn-primary">
                <option value="5,7">Finalizado</option>
                <option value="6">Cancelado</option>
                <option value="5,6,7">Todos</option>
            </select>
        </td>
    </tr>
    <tr>        
        <td>
            <b>Tipo de pago</b>
        </td>
        <td>
            <select id="tp" name="tp" class="form-control btn btn-primary">

                <option value="1">Efectivo</option>
                <option value="">Todos</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>
            <b>Id del mensajero</b>            
        </td>
        <td>
            <input id="im" name="im" type="number" class="form-control">
        </td>
    </tr>
    <tr>
        <td rowspan="2">
            <button type="submit" class="btn btn-success fa fa-file-excel-o"> Exportar a Excel</button>
        </td>
    </tr>
</table>
{!! Form::close() !!}
@endsection
