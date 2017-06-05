<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<head>
    <!-- ... -->
    <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.theme.min.css')}}">
    <link rel='stylesheet' href="{{asset('css/estilos.css')}}">
</head>

@extends('layouts.admin')
@section('titulo')
<h3 class="box-title">Reportes servicios activación de Chía</h3>
@endsection
@section('content')


{!! Form::open(array('url' => 'reportes/reportesChia','method'=>'POST','autocomplete'=>'off') ) !!}
{{Form::token()}}
<div>

    <table class="tabledata">
        <tr>
            <td >
                <b>Fecha inicio</b>
            </td>
            <td colspan="3" >
                <div class='input-group date'>
                    <input value="" type='date' name="fecha_inicio" id='fecha_inicio' class="form-control"/>
                    <span class="input-group-addon">
                        <span class="fa fa-calendar"></span>
                    </span>
                </div>
            </td>

        </tr>
        <tr>
            <td >
                <b>Fecha fin</b>
            </td>
            <td colspan="3">
                <div class='input-group date'>
                    <input value="" type='date' name="fecha_final" id='fecha_final' class="form-control"/>
                    <span class="input-group-addon">
                        <span class="fa fa-calendar"></span>
                    </span>
                </div>
            </td>

        </tr>
        <tr>
            <td></td>
            <td>
                <button class="btn btn-info fa fa-file-text-o" type="button" id='miboton'> Mostrar</button>
            </td>
            <td>
                <a href="{{asset('ServActivChia')}}"><button  class="btn btn-success fa fa-file-excel-o"> Exportar a Excel</button></a>
            </td>
        </tr>
    </table>
</div><br/>
{!! Form::close() !!}

<div class="table-responsive ">
<span id="resultado"></span>
</div>
<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
<script>
$(document).ready(function () {
    $('#miboton').click(function () {
        if ($("#fecha_inicio").val() == '' || $("#fecha_final").val() == '') {

            alert('llene los campos');
        } else {
            var parametros = {
                "fecha_inicio": $("#fecha_inicio").val(),
                "fecha_final": $("#fecha_final").val()
            };
            $.ajax({
                data: parametros,
                url: 'http://10.10.100.100/reportes/recibir',
                type: 'post',
                beforeSend: function () {
                    $("#resultado").html("Procesando, espere por favor...");
                },
                success: function (response) {
                    $("#resultado").html(response);
                }
            });
        }
    });
});
</script>
@endsection
