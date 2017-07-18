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
    {!! Form::open(array('url' => 'asignarEquipos/equipos','method'=>'POST','autocomplete'=>'off') ) !!}
    {{Form::token()}}
    <div class="form-group">
            <div class="input-group">
                <input type='text'  class="form-control b" id="codigo" name='codigo' placeholder="Buscar..." value="">
                <span class="input-group-btn">
                    <button type="button" id='miboton' class='btn btn-primary'>Buscar</button>
                </span>
            </div>
        </div>
    {!! Form::close() !!}
</div>

<div class="table-responsive ">
    <span id="resultado"></span>
</div>
<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
<script>
$(document).ready(function () {
    $('#miboton').click(function () {
        if ($("#codigo").val() == '') {
            alert('llene los campos');
        } else {
            var parametros = {
                "codigo": $("#codigo").val()
            };
            $.ajax({
                data: parametros,
                url: '/asignarEquipos/equipos',
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