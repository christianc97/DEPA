<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
@extends('layouts.admin')

@section('titulo')
<h3 class="box-title">Vistas task</h3>
@endsection

@section('content')
<div>
    {!! Form::open(array('url' => 'reportes/reportesVistasTask','method'=>'POST','autocomplete'=>'off') ) !!}
    {{Form::token()}}
    <table class="tabledata">
        <tr>
            <td><b>Id del servicio: </b></td>

            <td><input type="number" id="id_task" name="id_task" class="form-control"></td>
            <td><button class="btn btn-info fa fa-file-text-o" type="button" id='miboton'> Mostrar</button></td>
            <td>o</td>
            <td><button class="btn btn-success fa fa fa-bicycle" id="mostrarTrack" type="button"> Ver en el track</button></td>
        </tr>
        {!! Form::close() !!}
    </table>

</div>

<div class="table-responsive ">
    <span id="resultado"></span>
</div>
<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
<script>
$(document).ready(function () {
    $('#miboton').click(function () {
        if ($("#id_task").val() == '') {
            alert('llene los campos');
        } else {
            var parametros = {
                "id_task": $("#id_task").val()
            };
            $.ajax({
                data: parametros,
                url: '/reportes/vistasTask',
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
$('#mostrarTrack').click(function () {
    var id_task = $("#id_task").val();
    var url = "/reportes/trackMensajero/"+id_task;
    location.href = url;
})
</script>
@endsection