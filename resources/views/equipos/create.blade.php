<!DOCTYPE html>

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
            <center><input type="text" name="codigo"  class="form-control" placeholder="Codigo" required=""></center>
        </div>
        <div class='form-group'>
            <label for='tipo'>Tipo</label>
            <select class="form-control" name="tipo" value="">
                
                <option value="portatil">Portatil</option>
                <option value="all in one">All in One</option>
                <option value="escritorio">Escritorio</option>
            </select>
        </div>
        <hr/>
        <div class='form-group'>
            <label for='marca'>Marca</label>
            <input type="text" name="marca" class="form-control" placeholder="Marca" required="">
        </div>
        <div class='form-group'>
            <label for='modelo'>modelo</label>
            <input type="text" name="modelo" class="form-control" placeholder="Modelo">
        </div>
        <div class='form-group'>
            <label for='serial'>Serial</label>
            <input type="text" name="serial"  class="form-control" placeholder="Serial" required="">
        </div>
        <div class='form-group'>
            <label for='serial'>Fecha Compra</label>
            <input type="date" name="fecha_compra"  class="form-control">
        </div>
        <hr/>
        <label for='os_original'>Sistema Operativo</label>
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
            <label for='apellido1'>Procesador</label>
            <input type="text" name="procesador"  class="form-control" placeholder="Procesador">
        </div>
        <div class='form-group'>
            <label for='apellido2'>Arquitectura</label>
            <input type="text" name="arquitectura"  class="form-control" placeholder="Arquitectura">
        </div>
        <hr/>
        <label for='capacidad_ram'>RAM</label>
        <div class='form-group'>
            <label for='capacidad_ram'>Capacidad(GB)</label>
            <center><input type="text" name="capacidad_ram"  class="form-control" placeholder="Capacidad ram"></center>
        </div>
        <div class='form-group'>
            <label for='tipo_ram'>Tipo</label>
            <input type="text" name="tipo_ram" class="form-control" placeholder="Tipo ram">
        </div>
        <div class='form-group'>
            <label for='tamaño_ram'>Tamaño</label>
            <input type="text" name="tamaño_ram"  class="form-control" placeholder="Tamaño ram">
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <label for='capacidad_ram'>HDD</label>
        <div class='form-group'>
            <label for='capacidad_hdd'>Capacidad(GB)</label>
            <input type="text" name="capacidad_hdd"  class="form-control" placeholder="Capacidad hdd">
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
        <label for='capacidad_ram'>Video</label>
        <div class='form-group'>
            <label for='video_integrada'>Integrada</label>
            <input type="text" name="video_integrada" class="form-control" placeholder="Video integrada">
        </div>
        <div class='form-group'>
            <label for='video_externa'>Externa</label>
            <input type="text" name="video_externa" class="form-control" placeholder="Video externa">
        </div>
        <hr/>
        <label for='capacidad_ram'>Conectividad</label>
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
            <input type="text" name="red_wireless" class="form-control" placeholder="Red wireless">
        </div>
        <div class='form-group'>
            <label for='bluetooth'>Bluetooth</label>
            <input type="text" name="bluetooth" class="form-control" placeholder="Bluetooth">
        </div>
        <hr/>
        <div class='form-group'>
            <label for='pantalla_pulgadas'>Pantalla (pulgadas)</label>
            <input type="text" name="pantalla_pulgadas" class="form-control" placeholder="Pantalla (pulgadas">
        </div>
        
        <label for='capacidad_ram'>Perifericos</label>
        <div class='form-group'>
            <label for='tactil'>Tactil</label>
            <input type="text" name="tactil" class="form-control" placeholder="tactil">
        </div>
        <div class='form-group'>
            <label for='camara'>Camara</label>
            <input type="text" name="camara" class="form-control" placeholder="Camara">
        </div>
        <div class='form-group'>
            <label for='parlantes'>Parlantes</label>
            <input type="text" name="parlantes" class="form-control" placeholder="Parlantes">
        </div>
        <div class='form-group'>
            <label for='microfono'>Microfono</label>
            <input type="text" name="microfono" class="form-control" placeholder="Microfono">
        </div>
        <div class='form-group'>
            <label for='unidad_cd'>Unidad cd</label>
            <input type="text" name="unidad_cd" class="form-control" placeholder="Unidad cd">
        </div>
        <hr/>
        
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <label for='capacidad_ram'>MAC LAN</label>
        <div class='form-group'>
            <label for='capacidad_hdd'>(Internet cable)</label>
            <input type="text" name="mac_lan"  class="form-control" placeholder="Ethernet direccion(IPv4)" >
        </div>
        <label for='capacidad_ram'>MAC WIFI</label>
        <div class='form-group'>
            <input type="text" name="mac_wifi" class="form-control" placeholder="WIFI (wireless) direccion(IPv4)" >
        </div>
        <label for='capacidad_ram'>Extension Jitsi</label>
        <div class='form-group'>
            <input type="number" name="ext_jitsi" class="form-control" placeholder="Extension Jitsi" >
        </div>
        <div class='form-group'>
            <label for='os_licenciado'>Area</label>
            <select class="form-control" name="area" value="">
                <option value="2">Operaciones</option>
                <option value="3">SAC</option>
                <option value="4">DataScience</option>
                <option value="5">Tecnologia</option>
                <option value="6">Comercial</option>
                <option value="7">Financiera</option>
                <option value="8">Recursos Humanos</option>
                <option value="9">Vinculacion</option>
                <option value="1">Ninguno</option>
            </select>
        </div>
        <div class='form-group'>
            <label for='password'>Contraseña</label>
            <input type="text" name="password" class="form-control" placeholder="Contraseña">
        </div>
        <div class="form-group">
            <a href=""><button  class="btn btn-primary btn-block" type="submit">Guardar</button></a>
            <br>
            <a href="{{asset('equipos')}}"><button class="btn btn-danger btn-block" type="button">Cancelar</button></a>
        </div>
    </div>

        {{Form::close()}}
    

</div>
@endsection
