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
<h3 class="box-title">Equipo {{$equipos->codigo}}</h3>
@endsection

@section('content')
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    <div class="table-responsive">
        <table class="table table-condensed table-hover table-bordered table-striped">
            <tr>
                <td><b>Codigo: </b></td>
                <td>{{$equipos->codigo}}</td>
            </tr>
            <tr>
                <td><b>Tipo: </b></td>
                <td>{{$equipos->tipo}}</td>
            </tr>
            <tr>
                <td><b>Marca: </b></td>
                <td>{{$equipos->marca}}</td>
            </tr>
            <tr>
                <td><b>Modelo: </b></td>
                <td>{{$equipos->modelo}}</td>
            </tr>
            <tr>
                <td><b>Serial: </b></td>
                <td>{{$equipos->serial}}</td>
            </tr>
            <tr>
                <td><b>Os Original: </b></td>
                <td>{{$equipos->os_original}}</td>
            </tr>
            <tr>
                <td><b>Os instalado: </b></td>
                <td>{{$equipos->os_instalado}}</td>
            </tr>   
            <tr>
                <td><b>Os licenciado: </b></td>
                <td>{{$equipos->os_licenciado}}</td>
            </tr>
            <tr>
                <td><b>Procesador: </b></td>
                <td>{{$equipos->procesador}}</td>
            </tr>
            <tr>
                <td><b>Arquitectura: </b></td>
                <td>{{$equipos->arquitectura}}</td>
            </tr>
            <tr>
                <td><b>Capacidad Ram (gb): </b></td>
                <td>{{$equipos->capacidad_ram}}</td>
            </tr>
            <tr>
                <td><b>Tipo ram: </b></td>
                <td>{{$equipos->tipo_ram}}</td>
            </tr>
            <tr>
                <td><b>Tamaño ram: </b></td>
                <td>{{$equipos->tamaño_ram}}</td>
            </tr>
            <tr>
                <td><b>Capacidad hdd (gb): </b></td>
                <td>{{$equipos->capacidad_hdd}}</td>
            </tr>
            <tr>
                <td><b>Tipo hdd: </b></td>
                <td>{{$equipos->tipo_hdd}}</td>
            </tr>
            <tr>
                <td><b>Tamaño hdd: </b></td>
                <td>{{$equipos->tamaño_hdd}}</td>
            </tr>
            <tr>
                <td><b>conector hdd: </b></td>
                <td>{{$equipos->conector_hdd}}</td>
            </tr>
            <tr>
                <td><b>Video integrada: </b></td>
                <td>{{$equipos->video_integrada}}</td>
            </tr>
            <tr>
                <td><b>Video externa: </b></td>
                <td>{{$equipos->video_externa}}</td>
            </tr>
            <tr>
                <td><b>Red fisica: </b></td>
                <td>{{$equipos->red_fisica}}</td>
            </tr>
            <tr>
                <td><b>Red wireless: </b></td>
                <td>{{$equipos->red_wireless}}</td>
            </tr>
            <tr>
                <td><b>Bluetooth: </b></td>
                <td>{{$equipos->bluetooth}}</td>
            </tr>
            <tr>
                <td><b>Pantalla(pulgadas): </b></td>
                <td>{{$equipos->pantalla_pulgadas}}</td>
            </tr>
            <tr>
                <td><b>Tactil: </b></td>
                <td>{{$equipos->tactil}}</td>
            </tr>
            <tr>
                <td><b>Camara: </b></td>
                <td>{{$equipos->camara}}</td>
            </tr>
            <tr>
                <td><b>Parlantes: </b></td>
                <td>{{$equipos->parlantes}}</td>
            </tr>
            <tr>
                <td><b>Microfono: </b></td>
                <td>{{$equipos->microfono}}</td>
            </tr>
            <tr>
                <td><b>Unidad cd: </b></td>
                <td>{{$equipos->unidad_cd}}</td>
            </tr>
            <tr>
                <td><b>MAC LAN: </b></td>
                <td>{{$equipos->mac_lan}}</td>
            </tr>
            <tr>
                <td><b>MAC WIFI: </b></td>
                <td>{{$equipos->mac_wifi}}</td>
            </tr>
            <tr>
                <td><b>Extencion Jitsi: </b></td>
                <td>{{$equipos->ext_jitsi}}</td>
            </tr>
            <tr>
                <td><b>Area: </b></td>
                <td>{{$equipos->area}}</td>
            </tr>
            <tr>
                <td><b>Password: </b></td>
                <td>{{$equipos->password}}</td>
            </tr>
        </table>
    </div>
</div>
<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
    <h4>Personas asignadas</h4>
    <div class="table-responsive">
        @if (count($equipos_asignados)>0)
        <table class="table table-condensed table-hover table-bordered table-striped">
            <thead>
            <td class="info">Nombres</td>
            <td class="info">Apellidos</td>
            <td class="info">Area</td>
            <td class="info">Fecha de asignación</td>
            </thead>
            @foreach($equipos_asignados as $ea)
            <tr>
                <td>{{$ea->nombre1}} {{$ea->nombre2}}</td>
                <td>{{$ea->apellido1}} {{$ea->apellido2}}</td>
                <td>{{$ea->area}}</td>
                <td>{{$ea->fecha_asignacion}}</td>
            </tr>
            @endforeach
        </table>
         @else
         Este equipo no tiene usuarios asignados
         @endif
    </div>
</div>
<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
    <h4>Agregar nota</h4>
    {!! Form::open(array('url' => 'equipos/show','method'=>'POST','autocomplete'=>'off') ) !!}
    {{Form::token()}}
    <input type="hidden" name="id_equipos" value="{{$equipos->id_equipos}}"/>
    <div class="table-responsive">
        <textarea class="form-control" name="descripcion" rows="3" required=""></textarea>
    </div>
    <button class="btn btn-primary">Agregar</button>
    {!! Form::close() !!}
</div>
<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
    <h4>Historial del equipo {{$equipos->codigo}}</h4>
    <div class="table-responsive">
        @if (count($historial)>0)
    <table class="table table-condensed table-hover table-bordered table-striped">
            <thead>
            <td class="info">Descripcion</td>
            <td class="info">Usuario</td>
            <td class="info">fecha de creacion</td>
            </thead>
            @foreach($historial as $history)
            <tr>
                <td>{{$history->descripcion}}</td>
                <td>{{$history->nombre1}} {{$history->apellido1}}</td>
                <td>{{$history->created_at}}</td>
            </tr>
            @endforeach
        </table>
       @else
       Este equipo no tiene historial
       @endif
</div>
</div>

@endsection