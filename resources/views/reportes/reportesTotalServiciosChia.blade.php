<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
@extends('layouts.admin')
@section('titulo')
<h3 class="box-title">Total servicios finalizados en Chía de Farmatodo</h3>
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
        {!! Form::close() !!}
        <tr>
            <td></td>
            <td colspan="2"> 
                <a href=""><button id="miboton"  class="btn btn-success fa fa-file-excel-o"> Exportar a Excel</button></a>
            </td>
        </tr>
    </table>

</div>
@endsection
<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
<script>
$(document).ready(function () {

    var hoy = new Date();
    var ddsem = hoy.getDate() - 7;
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
    sem = yyyy + '-' + mm + '-' + ddsem;
    $("#fecha_inicio").val(sem);
    $("#fecha_fin").val(hoy);

});

</script>
