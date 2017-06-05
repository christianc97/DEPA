<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
@extends('layouts.admin')
@section('titulo')
<h3 class="box-title">Listado de mensajeros</h3>
@endsection

@section('content')
<div>
    {!! Form::open(array('method'=>'POST','autocomplete'=>'off') ) !!}
    {{Form::token()}}
    <table class="tabledata" >
        <tr>
            <td><b>Ciudad</b></td>
            <td>
                <select id="ciudad" name="ciudad" class="form-control btn btn-primary"></select>
            </td>
        </tr>
        <tr>
            <td>
                <b>Estado del mensajero</b>
            </td>
            <td>
                <select id="estado_servicio" name="estado_mensajero" class="form-control btn btn-primary">
                    <option value="1,3">Activos y bloqueados</option>
                    <option value="3">Pre-registrados</option>
                </select>
            </td>
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
<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
<script>
$(document).ready(function () {
    $.ajax({
        url: 'http://dev.api.mensajerosurbanos.com/cities?status=2',
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
});

</script>
@endsection