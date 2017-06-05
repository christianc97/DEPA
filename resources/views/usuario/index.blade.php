<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

@extends('layouts.admin')
@section('titulo')
<h3 class="box-title">Personal</h3>
@endsection

@section('content')
<div class="row1">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <h4>Crear Nuevo usuario <a href="usuario/create"><i class="fa fa-plus"></i></a></h4>
    </div>
</div>
<div class="row1">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table id="tablausuarios" class="table table-condensed table-hover display">
                <thead>
                <th>#</th>
                <th>Cedula</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Area</th>
                <th>Cargo</th>
                <th>Sucursal</th>
                <th>Genero</th>
                <th>Celular</th>
                <th>correo corporativo</th>
                <th>fecha inicio</th>
                <th>fecha retiro</th>
                <th colspan="2">Opciones</th>

                </thead>
                <input type="hidden" value="{{$var=0}}"/>
                @foreach ($usuarios as $u)
                <tbody>
                    <tr>
                        <td>{{++$var}}</td>
                        <td>{{$u->cedula}}</td>
                        <td>{{$u->nombre1}} {{$u->nombre2}}</td>
                        <td>{{$u->apellido1}} {{$u->apellido2}}</td>
                        <td>{{$u->area}}</td>
                        <td>{{$u->cargo}}</td>
                        <td>{{$u->sucursal}}</td>
                        <td>{{$u->genero}}</td>
                        <td>{{$u->celular}}</td>
                        <td>{{$u->correo_corporativo}}</td>
                        <td>{{$u->fecha_ingreso}}</td>
                        <td>{{$u->fecha_finalizacion_contrato}}</td>

                        <td>
                            <a href="{{URL::action('UserController@edit',$u->id)}}"><button class="btn btn-info"><i class="fa fa-pencil"></i> Editar</button></a>
                        </td>
                        <td>
                            <a href="" data-target="#modal-delete-{{$u->id}}" data-toggle="modal"><button class="btn btn-danger"><span class="fa fa-trash-o"></span> Eliminar</button></a>
                        </td>
                    </tr>
                </tbody>
                @include('usuario.modal')
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>