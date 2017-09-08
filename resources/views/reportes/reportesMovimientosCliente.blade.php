<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
@extends('layouts.admin')
@section('titulo')
<h3 class="box-title">Movimientos Cliente</h3>
@endsection

@section('content')
{!! Form::open(array('url' => 'reportes/reportesMovimientosCliente','method'=>'POST','autocomplete'=>'off') ) !!}
{{Form::token()}}
<div>

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
                <input type="number" name='idEmpresa' id='idEmpresa' class="form-control"/>
            </td>
        </tr>
        <tr>
             <td></td>
            <td colspan="2"> 
                <a href="{{asset('reportesMovimientoCliente')}}"><button id="miboton"  class="btn btn-success fa fa-file-excel-o"> Exportar a Excel</button></a>
            </td>
        </tr>
    </table>
</div><br/>
{!! Form::close() !!}

<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
<script>
$(document).ready(function () {
    $('#miboton').click(function () {
        if ($("#fecha_inicio").val() == '' || $("#fecha_fin").val() == '' || $("#idEmpresa").val() == '') {
            event.preventDefault();
            alert('Llene todos los campos');
        }
    });
});
</script>

@endsection
