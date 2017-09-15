<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
@extends('layouts.admin')

@section('titulo')
<h3 class="box-title">Asignar Diadema <b>{{$diadema->codigo_d}} </b></h3>
@endsection

@section('content')

<div class='row1 align-right'>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="table-responsive">
            <table id="tablausuarios" class="table table-condensed table-hover display">
             @if (count($equipos)>0)
             <caption>Diadema asignada a: <b>@foreach ($equipos as $e) {{$e->codigo}} @endforeach</b></caption>
                <thead>
                <th>#</th>
                <th>Codigo</th>
                <th>Tipo</th>
                <th>Modelo</th>
                <th>Serial</th>
                <th>Os instalado</th>
                <th>Fecha de asignacion</th>

                </thead>
                <input type="hidden" value="{{$var=0}}"/>
                @foreach ($equipos as $e)
                <tbody>
                    <tr>
                        <td>{{++$var}}</td>
                        <td>{{$e->codigo}}</td>
                        <td>{{$e->tipo}}</td>
                        <td>{{$e->modelo}}</td>
                        <td>{{$e->serial}}</td>
                        <td>{{$e->os_instalado}}</td>
                        <td>{{$e->fecha_asignacion}}</td>
                        <td>
                            <!-- {{Form::Open(array('action'=>array('AsignarDiademasController@destroy',$diadema->id_diadema),'method'=>'delete'))}}-->
                            {{Form::Open(Array('action'=>array('AsignarDiademasController@destroy', $e->id_equipos),'method'=>'delete'))}}
                            <a href=""><input type="hidden" name='id_equipos' value="{{$e->id_equipos}}"><button  class="btn btn-danger" type="submit"><i class="fa fa-times" aria-hidden="true"></i> Desasignar</button></a>
                            {{Form::Close()}}
                        </td>
                    </tr>
                </tbody>
                @endforeach
                @else
                <tr>
                    <div class="alert alert-info">
                        <strong>Informacion!</strong> Aun no esta asignada a ningun equipo.
                    </div>
                </tr>
                @endif
            </table>
        </div>
    </div>
</div>
<div class='row1 align-right'>
    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
        {!! Form::open(array('url' => 'asignardiademas/store','method'=>'POST','autocomplete'=>'off') ) !!}
        {{Form::token()}}
        <div class="form-group">
            <div class="input-group">
                <input type='text'  class="form-control" id="codigo" name='codigo' placeholder="Buscar..." value="" autofocus="">
                <span class="input-group-btn">
                    <button type="button" id='miboton' class='btn btn-primary'>Buscar</button>
                </span>
                <input type="hidden" id='id' name='id' value="{{$diadema->id_diadema}}"/>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
<div class='row1 align-left'>
    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
        <div class="table-responsive ">
            <span id="resultado">
                @if(session('computador_ya_asignado'))
                <h5 style='color:red'>{{session('computador_ya_asignado')}}</h5>

                @endif
                @if(session('computador_asignado'))
                <h5 style='color:#179b2b'>{{session('computador_asignado')}}</h5>
                
                @endif
                @if(session('computador_desasignado'))
                <h5 style='color:#179b2b'>{{session('computador_desasignado')}}</h5>

                @endif

            </span>
            <a href="{{asset('diademased')}}"><button  class="btn btn-danger" type="submit">volver</button></a>
        </div>
    </div>
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
                "codigo": $("#codigo").val(),
                "id": $("#id").val()
            };
            $.ajax({
                data: parametros,
                 url: '/asignardiademas/diademas',
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

