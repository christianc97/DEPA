<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<style>
    /* Style the tab */
    div.tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
    }

    /* Style the buttons inside the tab */
    div.tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
    }

    /* Change background color of buttons on hover */
    div.tab button:hover {
        background-color: #ddd;
    }

    /* Create an active/current tablink class */
    div.tab button.active {
        background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
    }
</style>
@extends('layouts.admin')
@section('titulo')
<h3 class="box-title">Personal</h3>
@endsection

@section('content')
<div class="row1">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h4>Crear Nuevo usuario <a href="usuario/create"><i class="fa fa-plus"></i></a></h4>
    </div>
</div>
<div class="tab">
    <button class="tablinks" onclick="personal(event, 'personal_activo')">Personal activo</button>
    <button class="tablinks" onclick="personal(event, 'personal_completo')">Personal</button>
</div>
<div class="row1">
    <div id="personal_activo" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 tabcontent">
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
<div class="row1">
    <div id="personal_completo" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 tabcontent">
        <div class="table-responsive">
            <table id="tablausuarios" class="table table-condensed table-hover display">
                <thead>
                <th>#</th>
                <th>Cedula</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Area</th>
                <th>Cargo</th>
                <th>Fecha nacimiento</th>
                <th>Telefono</th>
                <th>Sucursal</th>
                <th>Genero</th>
                <th>Celular</th>
                <th>Dirección</th>
                <th>Email</th>
                <th>Username</th>
                <th>correo corporativo</th>
                <th>EPS</th>
                <th>AFP</th>

                <th>fecha inicio</th>
                <th>fecha retiro</th>
                <th colspan="2">Opciones</th>

                </thead>
                <input type="hidden" value="{{$var=0}}"/>
                @foreach ($usuarios_todos as $u)
                <tbody>
                    <tr>
                        <td>{{++$var}}</td>
                        <td>{{$u->cedula}}</td>
                        <td>{{$u->nombre1}} {{$u->nombre2}}</td>
                        <td>{{$u->apellido1}} {{$u->apellido2}}</td>
                        <td>{{$u->area}}</td>
                        <td>{{$u->cargo}}</td>
                        <td>{{$u->fecha_nacimiento}}</td>
                        <td>{{$u->telefono}}</td>
                        <td>{{$u->sucursal}}</td>
                        <td>{{$u->genero}}</td>
                        <td>{{$u->celular}}</td>
                        <td>{{$u->direccion}}</td>
                        <td>{{$u->email}}</td>
                        <td>{{$u->username}}</td>
                        <td>{{$u->correo_corporativo}}</td>
                        <td>{{$u->eps}}</td>
                        <td>{{$u->afp}}</td>
                        <td>{{$u->fecha_ingreso}}</td>
                        <td>{{$u->fecha_finalizacion_contrato}}</td>

                        <td>
                            <a href="{{URL::action('UserController@edit',$u->id)}}"><button class="btn btn-info"><i class="fa fa-pencil"></i> Editar</button></a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
<script>
    function personal(evt, personal) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(personal).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>
