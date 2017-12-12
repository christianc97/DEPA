<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
@extends('layouts.admin')

@section('titulo')
<h3 class="box-title">Equipos</h3>
@endsection

@section('content')

<div class="row1">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h4>Crear Equipo <a href="equipos/create"><i class="fa fa-plus"></i></a></h4>
    </div>
</div>
<div class="row1">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 tabcontent">
        <div class="table-responsive">
            <table id="tablausuarios" class="table table-condensed table-hover display">
                <thead>
                <th>#</th>
                <th>Codigo</th>
                <th>Tipo</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Serial</th>
                <th>Fecha Compra</th>
                <th>OS original</th>
                <th>OS instalado</th>
                <th>OS licenciado</th>
                <th>Procesador</th>
                <th>Arquitectura</th>
                <th>Capacidad Ram(GB)</th>
                <th>Tipo Ram</th>
                <th>Tamaño Ram</th>
                <th>Capacidad hdd(GB)</th>
                <th>Tipo hdd</th>
                <th>Tamaño hdd</th>
                <th>Conector hdd</th>
                <th>Video integrada</th>
                <th>Video externa</th>
                <th>Red fisica</th>
                <th>Red wireless</th>
                <th>Bluetooth</th>
                <th>Pantalla (Pulgadas)</th>
                <th>Tactil</th>
                <th>Camara</th>
                <th>Parlantes</th>
                <th>Unidad_cd</th>
                <th>Microfono</th>
                <th>Contraseña</th>
                <th colspan="2">Opciones</th>

                </thead>
                <input type="hidden" value="{{$var=0}}"/>
                @foreach ($equipos as $e)
                <tbody>
                    <tr>
                        <td>{{++$var}}</td>
                        <td>{{$e->codigo}}</td>
                        <td>{{$e->tipo}}</td>
                        <td>{{$e->marca}}</td>
                        <td>{{$e->modelo}}</td>
                        <td>{{$e->serial}}</td>
                        <td>{{$e->fecha_compra}}</td>
                        <td>{{$e->os_original}}</td>
                        <td>{{$e->os_instalado}}</td>
                        <td>{{$e->os_licenciado}}</td>
                        <td>{{$e->procesador}}</td>
                        <td>{{$e->arquitectura}}</td>
                        <td>{{$e->capacidad_ram}}</td>
                        <td>{{$e->tipo_ram}}</td>
                        <td>{{$e->tamaño_ram}}</td>
                        <td>{{$e->capacidad_hdd}}</td>
                        <td>{{$e->tipo_hdd}}</td>
                        <td>{{$e->tamaño_hdd}}</td>
                        <td>{{$e->conector_hdd}}</td>
                        <td>{{$e->video_integrada}}</td>
                        <td>{{$e->video_externa}}</td>
                        <td>{{$e->red_fisica}}</td>
                        <td>{{$e->red_wireless}}</td>
                        <td>{{$e->bluetooth}}</td>
                        <td>{{$e->pantalla_pulgadas}}</td>
                        <td>{{$e->tactil}}</td>
                        <td>{{$e->camara}}</td>
                        <td>{{$e->parlantes}}</td>
                        <td>{{$e->microfono}}</td>
                        <td>{{$e->unidad_cd}}</td>
                        <td>{{$e->password}}</td>
                        <td><a href="{{URL::action('EquiposController@show',$e->id_equipos)}}"><button class="btn btn-info"> Ver</button></a></td>
                        <td>
                            <a href="{{URL::action('EquiposController@edit',$e->id_equipos)}}"><button class="btn btn-info"><i class="fa fa-pencil"></i> Editar</button></a>
                        </td>
                        <td>
                            <a href="" data-target="#modal-delete-{{$e->id_equipos}}" data-toggle="modal"><button class="btn btn-danger"><span class="fa fa-trash-o"></span> Eliminar</button></a>
                        </td>
                    </tr>
                </tbody>
                @include('equipos.modal')
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
