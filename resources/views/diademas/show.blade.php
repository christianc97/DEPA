<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
@extends('layouts.admin')
@section('titulo')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  

<h3 class="box-title"><span class="glyphicon glyphicon-headphones"></span> Diadema <strong>{{$diadema->codigo_d}}</strong></h3>
@endsection

@section('content')
<div class="col-lg-5 col-md-3 col-sm-3 col-xs-12">
    <div class="table-responsive">
        <table class="table table-condensed table-hover table-bordered table-striped">
        <caption class="text text-info"><span class="glyphicon glyphicon-info-sign"></span> Sobre la diadema</caption>
        <tr class="info">
        <th>Codigo</th>
        <th>Fecha Compra</th>
        </tr>
        <tr>
			@foreach($diademas_asignadas as $da)
			<td>{{$da->codigo_d}}</td>
			<td>{{$da->fecha_compra}}</td>
			@endforeach
		</tr>
		</table>
    </div>
</div>
<!---->
<div class="col-lg-10 col-md-3 col-sm-3 col-xs-12">
<hr>
</div>
<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
    <h4>Diadema <strong>{{$diadema->codigo_d}}</strong> asignada a: <b>@foreach ($equipos as $e) {{$e->codigo}} @endforeach</b></h4>
    <div class="table-responsive">
    <table class="table table-condensed table-hover table-bordered table-striped">
        @if (count($equipos)>0)
               <tr class="info">
                <th>N°</th>
                <th>Codigo</th>
                <th>Tipo</th>
                <th>Modelo</th>
                <th>Serial</th>
                <th>Os instalado</th>
                <th>Fecha de asignacion</th>
                </tr>
                <input type="hidden" value="{{$var=0}}"/>
                @foreach ($equipos as $e)
                    <tr >
                        <td>{{++$var}}</td>
                        <td>{{$e->codigo}}</td>
                        <td>{{$e->tipo}}</td>
                        <td>{{$e->modelo}}</td>
                        <td>{{$e->serial}}</td>
                        <td>{{$e->os_instalado}}</td>
                        <td>{{$e->fecha_asignacion}}</td>
                    </tr>
                @endforeach
            </table>
         @else
         <table class="table table-condensed table-hover table-bordered table-striped">
         Esta diadema no esta asignada a ningun equipo
         </table>
         @endif
    </div>
</div>
<!---->
<div class="col-lg-10 col-md-3 col-sm-3 col-xs-12">
<hr>
</div>

<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
    <h4> <span class="glyphicon glyphicon-book"></span> Agregar nota</h4>
    {!! Form::open(array('url' => 'diademas/show','method'=>'POST','autocomplete'=>'off') ) !!}
    {{Form::token()}}
    <input type="hidden" name="id_diadema" value="{{$diadema->id_diadema}}"/>
    <div class="table-responsive">
        <textarea class="form-control" name="nota" rows="3" required="" autofocus=""></textarea>
    </div>
   <br>
    <button class="btn btn-primary">Agregar</button>
	<a href="{{asset('diademas')}}"><button type="button" class="btn btn-danger">Volver</button></a>
    {!! Form::close() !!}
</div>
<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">

    <h4>Notas de la diadema <b>{{$diadema->codigo_d}}</b> </h4>
    <div class="table-responsive">
        @if (count($historial)>0)
    <table class="table table-condensed table-hover table-bordered table-striped">
            <thead>
            <td class="info">N°</td>
            <td class="info">Descripcion</td>
            <td class="info">Usuario</td>
            <td class="info">fecha de creacion</td>
            </thead>
            <input type="hidden" value="{{$var=0}}">
            @foreach($historial as $history)
            <tr>
            	<td>{{++$var}}</td>
                <td>{{$history->nota}}</td>
                <td>{{$history->nombre1}} {{$history->apellido1}}</td>
                <td>{{$history->created_at}}</td>
            </tr>
            @endforeach
        </table>
       @else
       Esta diadema no tiene notas <span class="glyphicon glyphicon-book"></span>
       @endif
</div>
</div>
<!---->

@endsection