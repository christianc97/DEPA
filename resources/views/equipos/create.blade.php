<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
@extends('layouts.admin')

@section('titulo')
<h3 class="box-title">Crear nuevo equipo</h3>
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

        {!! Form::open(array('url'=>'equipos','method'=>'POST','autocomplete'=>'off'))!!}
        {{Form::token()}}
        <div class='form-group'>
            <label for='codigo'>Codigo</label>
            <center><input type="text" name="codigo" class="form-control" placeholder="Codigo"></center>
        </div>
        <div class='form-group'>
            <label for='tipo'>Tipo</label>
            <select class="form-control" name="tipo" value="">
                <option value="portatil">Portatil</option>
                <option value="all in one">All in One</option>
                <option value="escritorio">escritorio</option>
            </select>
        </div>
        <hr/>
        <div class='form-group'>
            <label for='marca'>Marca</label>
            <input type="text" name="marca" class="form-control" placeholder="Marca">
        </div>
        <div class='form-group'>
            <label for='modelo'>modelo</label>
            <input type="text" name="modelo" class="form-control" placeholder="Modelo">
        </div>
        <div class='form-group'>
            <label for='serial'>Serial</label>
            <input type="text" name="serial" class="form-control" placeholder="Serial">
        </div>
        <div class='form-group'>
            <label for='serial'>Fecha de Compra</label>
            <input type="date" name="fecha_compra" class="form-control">
        </div>
        <hr/>
        <label for='os_original'>Sistema Operativo</label>
        <hr/>
        <div class='form-group'>
            <label for='os_original'>Original</label>
            <select class="form-control" name="os_original" value="">
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
            <label for='procesador'>Procesador</label>
            <input type="text" name="procesador" class="form-control" placeholder="Procesador">
        </div>
        <div class='form-group'>
            <label for='arquitectura'>Arquitectura</label>
            <input type="text" name="arquitectura" class="form-control" placeholder="Arquitectura">
        </div>
        <hr/>
        <label for='os_original'>RAM </label>
            <br/>
        <div class='form-group'>
            <label for='capacidad_ram'>Capacidad(GB)</label>
            <center><input type="text" name="capacidad_ram" class="form-control" placeholder="Capacidad ram"></center>
        </div>
        <div class='form-group'>
            <label for='tipo_ram'>Tipo</label>
            <input type="text" name="tipo_ram" class="form-control" placeholder="Tipo ram">
        </div>
        <div class='form-group'>
            <label for='tamaño_ram'>Tamaño</label>
            <input type="text" name="tamaño_ram" class="form-control" placeholder="Tamaño ram">
        </div>
        <hr/>
        <label for='os_original'>HDD</label>
            <br/>
        <div class='form-group'>
            <label for='capacidad_hdd'>Capacidad(GB)</label>
            <input type="text" name="capacidad_hdd" class="form-control" placeholder="Capacidad hdd">
        </div>
        <div class='form-group'>
            <label for='tipo_hdd'>Tipo</label>
            <input type="text" name="tipo_hdd" class="form-control" placeholder="Tipo hdd">
        </div>
        <div class='form-group'>
            <label for='tamaño_hdd'>Tamaño</label>
            <input type="text" name="tamaño_hdd" class="form-control" placeholder="Tamaño hdd">
        </div>
        <div class='form-group'>
            <label for='conector_hdd'>Conector</label>
            <input type="text" name="conector_hdd" class="form-control" placeholder="Conector hdd">
        </div>
        <hr/>
        <label for='os_original'>Video</label>
            <br/>
        <div class='form-group'>
            <label for='video_integrada'>Integrada</label>
            <input type="text" name="video_integrada" class="form-control" placeholder="Video integrada">
        </div>
        <div class='form-group'>
            <label for='video_externa'>Externa</label>
            <input type="text" name="video_externa" class="form-control" placeholder="Video externa">
        </div>
        <hr/>
        <label for='os_original'>Conectividad</label>
            <br/>
        <div class='form-group'>
            <label for='red_fisica'>Red fisica</label>
            <select class="form-control" name="red_fisica" value="">
                <option value="si">Si</option>
                <option value="no">No</option>
                <option value=""></option>
            </select>
        </div>
        <div class='form-group'>
            <label for='red_wireless'>Red wireless</label>
            <select class="form-control" name="red_wireless" value="">
                <option value="si">Si</option>
                <option value="no">No</option>
                <option value=""></option>
            </select>
        </div>
        <div class='form-group'>
            <label for='bluetooth'>Bluetooth</label>
            <select class="form-control" name="bluetooth" value="">
                <option value="si">Si</option>
                <option value="no">No</option>
                <option value=""></option>
            </select>
        </div>
        <hr/>
        <label for='os_original'>Pantalla</label>
            <br/>
        <div class='form-group'>
            <label for='pantalla_pulgadas'>Pantalla (pulgadas)</label>
            <input type="text" name="pantalla_pulgadas" class="form-control" placeholder="Pantalla (pulgadas)">
        </div>
        <hr/>
        <label for='os_original'>Perifericos</label>
            <br/>
        <div class='form-group'>
            <label for='tactil'>Tactil</label>
            <select class="form-control" name="tactil" value="">
                <option value="si">Si</option>
                <option value="no">No</option>
                <option value=""></option>
            </select>
        </div>
        <div class='form-group'>
            <label for='camara'>Camara</label>
            <select class="form-control" name="camara" value="">
                <option value="si">Si</option>
                <option value="no">No</option>
                <option value=""></option>
            </select>
        </div>
        <div class='form-group'>
            <label for='parlantes'>Parlantes</label>
            <select class="form-control" name="parlantes" value="">
                <option value="si">Si</option>
                <option value="no">No</option>
                <option value=""></option>
            </select>
        </div>
        <div class='form-group'>
            <label for='microfono'>Microfono</label>
            <select class="form-control" name="microfono" value="">
                <option value="si">Si</option>
                <option value="no">No</option>
                <option value=""></option>
            </select>
        </div>
        <div class='form-group'>
            <label for='unidad_cd'>Unidad cd</label>
            <select class="form-control" name="unidad_cd" value="">
                <option value="si">Si</option>
                <option value="no">No</option>
                <option value=""></option>
            </select>
        </div>
            <hr/>
        <div class='form-group'>
            <label for='password'>Contraseña pc</label>
            <input type="text" name="password" class="form-control" placeholder="Contraseña pc">
        </div>
        <div class="form-group">
            <a href=""><button  class="btn btn-primary" type="submit">Guardar</button></a>
            <a href="{{asset('equipos')}}"><button class="btn btn-danger" type="button">Cancelar</button></a>
        </div>

        {{Form::close()}}
    </div>
</div>
@endsection
