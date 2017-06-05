<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
@extends('layouts.admin')
@section('titulo')
<h3 class="box-title">Reportes Horas de juego </h3>
@endsection

@section('content')
{!! Form::open(array('url' => 'reportes/reportesHoraJuego','method'=>'POST','autocomplete'=>'off') ) !!}
{{Form::token()}}
<div>
    <table class="tabledata">
        <thead>
        <td>

        </td>
        <td>
            Fecha
        </td>
        <td>
            Hora
        </td>
        </thead>
        <tr>
            <td><b>Fecha inicio</b></td>
            <td><input class="form-control" value="" id="fecha_inicio" name="fecha_inicio" type="date" onchange="agregar();"></td>
            <td><input class="form-control" value="" id="hora_inicio" name="hora_inicio" type="time"</td>
        </tr>
        <tr>
            <td><b>Fecha final</b></td>
            <td><input class="form-control" value="" id="fecha_fin" name="fecha_fin" type="date"></td>
            <td><input class="form-control" value="" id="hora_fin" name="hora_fin" type="time"</td>
        </tr>
        <tr>
            <td>
                <b>Tipo de servicio</b>
            </td>
            <td>
                <select id="ts" name="ts" class="form-control btn btn-primary">
                    <option value="">Todos</option>
                    <option value="1">Express</option>
                    <option value="4">Domicilios</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><b>Ciudad</b></td>
            <td><select id="ciudad" name="ciudad" class="form-control btn btn-primary">

                </select></td>
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
            <td>
                <b>Incluir servicios de activación</b>
            </td>
            <td>
                <input type="checkbox"  name="servicios_activacion" checked/>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button class="btn btn-info fa fa-file-text-o" type="button" id='miboton'> Mostrar</button>
            </td>
            <td>
                <a href="{{asset('HoraJuegoController')}}"><button  class="btn btn-success fa fa-file-excel-o"> Exportar a Excel</button></a>
            </td>
        </tr>


    </table>
</div>
{!! Form::close() !!}
<div class="table-responsive ">
    <span id="resultado"></span>
</div>
<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
<script>
                function agregar() {
                    $('#fecha_fin').val($('#fecha_inicio').val());
                }
                ;
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
                        if ($("#fecha_inicio").val() == '' || $("#fecha_fin").val() == '' || $("#hora_inicio").val() == '' || $("#hora_fin").val() == '') {

                            alert('llene los campos');
                        } else {
                            var parametros = {
                                "fecha_inicio": $("#fecha_inicio").val(),
                                "hora_inicio": $("#hora_inicio").val(),
                                "fecha_fin": $("#fecha_fin").val(),
                                "hora_fin": $("#hora_fin").val(),
                                "tipo_servicio": $("#ts").val(),
                                "ciudad": $("#ciudad").val(),
                                "id_empresa": $("#id_empresa").val(),
                                "servicios_activacion": $('input:checkbox[name=servicios_activacion]:checked').val()
                            };
                            $.ajax({
                                data: parametros,
                                url: 'http://10.10.100.100/reportes/horasJuego',
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
