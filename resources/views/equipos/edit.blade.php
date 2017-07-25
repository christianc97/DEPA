<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
@extends('layouts.admin')

@section('titulo')
<h3 class="box-title">Editar Equipo {{$equipos->codigo}}</h3>
@endsection

@section('content')
<div class='row1 align-left'>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach 
            </ul>
        </div>
        @endif

        {!!Form::model($equipos,['method'=>'PATCH','route'=>['equipos.update',$equipos->id_equipos]])!!}
        {{Form::token()}}
        <div class='form-group'>
            <label for='codigo'>Codigo</label>
            <center><input type="text" name="codigo" value="{{$equipos->codigo}}" class="form-control" placeholder="Codigo"></center>
        </div>
        <div class='form-group'>
            <label for='tipo'>Tipo</label>
            <select class="form-control" name="tipo" value="">
                <option selected="disabled" value="{{$equipos->tipo}}">{{$equipos->tipo}}</option>
                <option value="portatil">Portatil</option>
                <option value="all in one">All in One</option>
                <option value="escritorio">Escritorio</option>
            </select>
        </div>
        <hr/>
        <div class='form-group'>
            <label for='marca'>Marca</label>
            <input type="text" name="marca" value="{{$equipos->marca}}" class="form-control" placeholder="Marca">
        </div>
        <div class='form-group'>
            <label for='modelo'>modelo</label>
            <input type="text" name="modelo" value="{{$equipos->modelo}}" class="form-control" placeholder="Modelo">
        </div>
        <div class='form-group'>
            <label for='serial'>Serial</label>
            <input type="text" name="serial" value="{{$equipos->serial}}" class="form-control" placeholder="Serial">
        </div>
        <hr/>
        <label for='os_original'>Sistema Operativo</label>
        <div class='form-group'>
            <label for='os_original'>Original</label>
            <select class="form-control" name="os_original" value="">
                <option selected="disabled" value="{{$equipos->os_original}}">{{$equipos->os_original}}</option>
                <option value="os x">OS X</option>
                <option value="windows 8 pro">Windows 8 PRO</option>
                <option value="windows 8.1 home">Windows 8.1 HOME</option>
                <option value="windows 10 pro">Windows 10 PRO</option>
                <option value="windows 10 home">Windows 10 HOME</option>
                <option value="linux mint">Linux mint</option>
            </select>
        </div>
        <div class='form-group'>
            <label for='os_instalado'>Instalado</label>
            <select class="form-control" name="os_instalado" value="">
                <option selected="disabled" value="{{$equipos->os_instalado}}">{{$equipos->os_instalado}}</option>
                <option value="os x">OS X</option>
                <option value="windows 8 pro">Windows 8 PRO</option>
                <option value="windows 8.1 home">Windows 8.1 HOME</option>
                <option value="windows 10 pro">Windows 10 PRO</option>
                <option value="windows 10 home">Windows 10 HOME</option>
                <option value="linux mint">Linux mint</option>
                <option value="ninguno">Ninguno</option>
            </select>
        </div>
        <div class='form-group'>
            <label for='os_licenciado'>Licenciado</label>
            <select class="form-control" name="os_licenciado" value="">
                <option selected="disabled" value="{{$equipos->os_licenciado}}">{{$equipos->os_licenciado}}</option>
                <option value="os x">OS X</option>
                <option value="windows 8 pro">Windows 8 PRO</option>
                <option value="windows 8.1 home">Windows 8.1 HOME</option>
                <option value="windows 10 pro">Windows 10 PRO</option>
                <option value="windows 10 home">Windows 10 HOME</option>
                <option value="linux mint">Linux mint</option>
                <option value="ninguno">Ninguno</option>
            </select>
        </div>
        <hr/>
        <div class='form-group'>
            <label for='apellido1'>Procesador</label>
            <input type="text" name="procesador" value="{{$equipos->procesador}}" class="form-control" placeholder="Procesador">
        </div>
        <div class='form-group'>
            <label for='apellido2'>Arquitectura</label>
            <input type="text" name="arquitectura" value="{{$equipos->arquitectura}}" class="form-control" placeholder="Arquitectura">
        </div>
        <hr/>
        <label for='capacidad_ram'>RAM</label>
        <div class='form-group'>
            <label for='capacidad_ram'>Capacidad(GB)</label>
            <center><input type="text" name="capacidad_ram" value="{{$equipos->capacidad_ram}}" class="form-control" placeholder="Capacidad ram"></center>
        </div>
        <div class='form-group'>
            <label for='tipo_ram'>Tipo</label>
            <input type="text" name="tipo_ram" value="{{$equipos->tipo_ram}}" class="form-control" placeholder="Tipo ram">
        </div>
        <div class='form-group'>
            <label for='tamaño_ram'>Tamaño</label>
            <input type="text" name="tamaño_ram" value="{{$equipos->tamaño_ram}}" class="form-control" placeholder="Tamaño ram">
        </div>
        <hr/>
        <label for='capacidad_ram'>HDD</label>
        <div class='form-group'>
            <label for='capacidad_hdd'>Capacidad(GB)</label>
            <input type="text" name="capacidad_hdd" value="{{$equipos->capacidad_hdd}}" class="form-control" placeholder="Capacidad hdd">
        </div>
        <div class='form-group'>
            <label for='tipo_hdd'>Tipo</label>
            <input type="text" name="tipo_hdd" value="{{$equipos->tipo_hdd}}" class="form-control" placeholder="Tipo hdd">
        </div>
        <div class='form-group'>
            <label for='tamaño_hdd'>Tamaño</label>
            <input type="text" name="tamaño_hdd" value="{{$equipos->tamaño_hdd}}" class="form-control" placeholder="Tamaño hdd">
        </div>
        <div class='form-group'>
            <label for='conector_hdd'>Conector</label>
            <input type="text" name="conector_hdd" value="{{$equipos->conector_hdd}}" class="form-control" placeholder="Conector hdd">
        </div>
        <hr/>
        <label for='capacidad_ram'>Video</label>
        <div class='form-group'>
            <label for='video_integrada'>Integrada</label>
            <input type="text" name="video_integrada" value="{{$equipos->video_integrada}}" class="form-control" placeholder="Video integrada">
        </div>
        <div class='form-group'>
            <label for='video_externa'>Externa</label>
            <input type="text" name="video_externa" value="{{$equipos->video_externa}}" class="form-control" placeholder="Video externa">
        </div>
        <hr/>
        <label for='capacidad_ram'>Conectividad</label>
        <div class='form-group'>
            <label for='red_fisica'>Red fisica</label>
            <select class="form-control" name="red_fisica" value="">
                <option selected="disabled" value="{{$equipos->red_fisica}}">{{$equipos->red_fisica}}</option>
                <option value="si">Si</option>
                <option value="no">No</option>
                <option value=""></option>
            </select>
        </div>
        <div class='form-group'>
            <label for='red_wireless'>Red wireless</label>
            <input type="text" name="red_wireless" value="{{$equipos->red_wireless}}" class="form-control" placeholder="Red wireless">
        </div>
        <div class='form-group'>
            <label for='bluetooth'>Bluetooth</label>
            <input type="text" name="bluetooth" value="{{$equipos->bluetooth}}" class="form-control" placeholder="Bluetooth">
        </div>
        <hr/>
        <div class='form-group'>
            <label for='pantalla_pulgadas'>Pantalla (pulgadas)</label>
            <input type="text" name="pantalla_pulgadas" value="{{$equipos->pantalla_pulgadas}}" class="form-control" placeholder="Pantalla (pulgadas">
        </div>
        <hr/>
        <label for='capacidad_ram'>Perifericos</label>
        <div class='form-group'>
            <label for='tactil'>Tactil</label>
            <input type="text" name="tactil" value="{{$equipos->tactil}}" class="form-control" placeholder="tactil">
        </div>
        <div class='form-group'>
            <label for='camara'>Camara</label>
            <input type="text" name="camara" value="{{$equipos->camara}}" class="form-control" placeholder="Camara">
        </div>
        <div class='form-group'>
            <label for='parlantes'>Parlantes</label>
            <input type="text" name="parlantes" value="{{$equipos->parlantes}}" class="form-control" placeholder="Parlantes">
        </div>
        <div class='form-group'>
            <label for='microfono'>Microfono</label>
            <input type="text" name="microfono" value="{{$equipos->microfono}}" class="form-control" placeholder="Microfono">
        </div>
        <div class='form-group'>
            <label for='unidad_cd'>Unidad cd</label>
            <input type="text" name="unidad_cd" value="{{$equipos->unidad_cd}}" class="form-control" placeholder="Unidad cd">
        </div>
        <hr/>
        <div class='form-group'>
            <label for='password'>Contraseña</label>
            <input type="text" name="password" value="{{$equipos->password}}" class="form-control" placeholder="Contraseña">
        </div>
        <div class="form-group">
            <a href=""><button  class="btn btn-primary" type="submit">Guardar</button></a>
            <a href="{{asset('equipos')}}"><button class="btn btn-danger" type="button">Cancelar</button></a>
        </div>
        {{Form::close()}}
    </div>
</div>
@endsection
