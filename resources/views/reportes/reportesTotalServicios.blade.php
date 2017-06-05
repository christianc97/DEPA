<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
@extends('layouts.admin')
@section('titulo')
<h3 class="box-title">reporte total de servicios</h3>
@endsection

@section('content')
<div>
    {!! Form::open(array('method'=>'POST','autocomplete'=>'off') ) !!}
    {{Form::token()}}
    <table class="tabledata" >
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
            <td colspan="2">
                <div class='input-group date'>
                    <input value="" type='date' name="fecha_fin" id='fecha_fin' class="form-control"/>
                    <span class="input-group-addon">
                        <span class="fa fa-calendar"></span>
                    </span>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <b>id Empresa</b>
            </td>
            <td>
                <input type="number" name='id_empresa' id='id_empresa' class="form-control"/>
            </td>
        </tr>
        <tr>
            <td><b>Ciudad</b></td>
            <td>
                <select id="ciudad" name="ciudad" class="form-control btn btn-primary"></select>
            </td>
        </tr>
        <tr>
            <td>
                <b>Estado del servicio</b>
            </td>
            <td>
                <select id="estado_servicio" name="estado_servicio" class="form-control btn btn-primary">
                    <option value="5,7">Finalizado</option>
                    <option value="">Todos</option>
                </select>
            </td>
        <tr>
            <td>
                <b>Incluir movimientos</b>
            </td>
            <td>
                <input type="checkbox" name="movimientos_cliente"/>
            </td>
        </tr>
        </tr>
        {!! Form::close() !!}
        <tr>
            <td></td>
            <td colspan="2"> 
                <a href=""><button id="miboton"  class="btn btn-success fa fa-file-excel-o"> Exportar a Excel</button></a>
            </td>
        </tr>

    </table>

</div><br/>
@yield('error')
<div class="table-responsive ">
    <span id="resultado"></span>
</div>
@endsection
<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
<script>
$(document).ready(function () {
    $.ajax({
        url: 'http://dev.api.mensajerosurbanos.com/cities?status=1',
        type: 'GET',
        beforeSend: function () {
        },
        success: function (response) {
            $("#resultado").html(response);
            for (var i = 0; i < response.data.length; i++) {
                var ciudad = response.data[i];
                $('#ciudad').append(new Option(ciudad.name, ciudad.id, true, true));
            }
            $('#ciudad').append(new Option('Todos', '', true, true));
        }
    });
    $('#miboton').click(function () {

        var parametros = {
            "fecha_inicio": $("#fecha_inicio").val(),
            "fecha_fin": $("#fecha_fin").val(),
            "id_empresa": $("#id_empresa").val(),
            "ciudad": $("#ciudad").val(),
            "estado_servicio": $("#estado_servicio").val()
        };
        $.ajax({
            data: parametros,
            url: 'http://10.10.100.100/reportes/totalServicios',
            type: 'post',
            beforeSend: function () {
                $("#resultado").html("Procesando, espere por favor...");
            },
            success: function (response) {
                $("#resultado").html(response);
            }
        });

    });
    var hoy = new Date();
    var dd = hoy.getDate() - 1;
    var mm = hoy.getMonth() + 1; //hoy es 0!
    var yyyy = hoy.getFullYear();
    if (dd < 10) {
        dd = '0' + dd;
    }
    if (mm < 10) {
        mm = '0' + mm;
    }
    hoy = yyyy + '-' + mm + '-' + dd;
    $("#fecha_fin").val(hoy);

});

</script>