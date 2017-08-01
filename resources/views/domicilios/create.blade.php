<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
@extends('layouts.admin')

@section('titulo')
<h3 class="box-title">Crear nueva empresa</h3>
@endsection

@section('content')
<div>
    {!! Form::open(array('url' => 'domicilios/create','method'=>'POST','autocomplete'=>'off') ) !!}
    {{Form::token()}}
    <table class="tabledata">
        <tr>
            <td><b>Ingrese id de la empresa</b></td>
            <td><input class="form-control" value="" id="id_empresa" name="id_empresa" type="number"></td>
            <td colspan="2"> 
                <button id="miboton" class="btn btn-primary" type="button">Consultar empresa</button>
            </td>
        </tr>        
    </table>
    {!! Form::close() !!}
</div>
<div class="table-responsive ">
    <span id="resultado">
        @if(session('empresa_creada'))
        <h5 style='color:#179b2b'>{{session('empresa_creada')}}</h5>
        @endif
    </span>
</div>
@endsection
<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
<script>
$(document).ready(function () {
    $('#miboton').click(function () {
        if ($("#id_empresa").val() == '') {
            alert('llene los campos');
        } else {
            var parametros = {
                "id_empresa": $("#id_empresa").val()
            };
            $.ajax({
                data: parametros,
                url: '/domicilios/empresa',
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