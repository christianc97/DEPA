<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<link rel="stylesheet" href="{{asset('css/bootstrap-toggle.min.css')}}">
@extends('layouts.admin')
@section('titulo')
<h3 class="box-title">Editar usuario {{$usuario->nombre1}} {{$usuario->nombre2}} {{$usuario->apellido1}} {{$usuario->apellido2}}</h3>
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

        {!!Form::model($usuario,['method'=>'PATCH','route'=>['usuario.update',$usuario->id]])!!}
        {{Form::token()}}
        <div class='form-group'>
            <label for='identificacion'>identificacion</label>
            <center><input type="number" name="cedula" class="form-control" value="{{$usuario->cedula}}" placeholder="identificacion"></center>
        </div>
        <div class='form-group'>
            <label for='nombre1'>Nombre 1</label>
            <input type="text" name="nombre1" class="form-control" value="{{$usuario->nombre1}}" placeholder="primer nombre">
        </div>
        <div class='form-group'>
            <label for='nombre2'>Nombre 2</label>
            <input type="text" name="nombre2" class="form-control" value="{{$usuario->nombre2}}" placeholder="segundo nombre">
        </div>
        <div class='form-group'>
            <label for='apellido1'>Apellido 1</label>
            <input type="text" name="apellido1" class="form-control" value="{{$usuario->apellido1}}" placeholder="primer apellido">
        </div>
        <div class='form-group'>
            <label for='apellido2'>Apellido 2</label>
            <input type="text" name="apellido2" class="form-control" value="{{$usuario->apellido2}}" placeholder="segundo apellido">
        </div>
        <div class='form-group'>
            <label for='area'>Area</label>
            <select class="form-control" name="area" value="">
                <option value="{{$usuario->area}}">{{$usuario->area}}</option>
                <option value="operaciones">Operaciones</option>
                <option value="tecnologia">Tecnologia</option>
                <option value="comercial">Comercial</option>
                <option value="recursos humanos" >Recursos Humanos</option>
                <option value="marketing">Marketing</option>
                <option value="data science">data science</option>
                <option value="administrativa">Administrativa</option>
                <option value="financiera">Financiera</option>
                <option value="vinculacion">Vinculacion</option>
            </select>
        </div>
        <div class='form-group'>
            <label for='nombre2'>Cargo</label>
            <input type="text" value="{{$usuario->cargo}}" name="cargo" class="form-control" placeholder="cargo">
        </div>
        <div class='form-group'>
            <label for='fecha_nacimiento'>Fecha de nacimiento</label>
            <input type="date" value="{{$usuario->fecha_nacimiento}}" name="fecha_nacimiento" class="form-control">
        </div>
        <div class='form-group'>
            <label for='genero'>Genero</label>
            <select class="form-control" name="genero" value="" >
                <option value="{{$usuario->genero}}">{{$usuario->genero}}</option>
                <option value="m">Masculino</option>
                <option value="f">Femenino</option>
            </select>
        </div>

        <div class='form-group'>
            <label for='contrasena'>contraseña</label>
            <input type="text" value="{{$usuario->cedula}}" name="contrasena" class="form-control">
        </div>

    </div>
</div>
<div class='row1 align-right'>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class='form-group'>
            <label for='telefono'>Telefono</label>
            <input type="number" name="telefono" class="form-control" value="{{$usuario->telefono}}" placeholder="telefono">
        </div>
        <div class='form-group'>
            <label for='celular'>Celular</label>
            <input type="text" name="celular" class="form-control" value="{{$usuario->celular}}" placeholder="celular">
        </div>
        <div class='form-group'>
            <label for='direccion'>Dirección</label>
            <input type="text" name="direccion" class="form-control" value="{{$usuario->direccion}}" placeholder="dirección">
        </div>
        <div class='form-group'>
            <label for='email'>Email</label>
            <input type="email" name="email" class="form-control" value="{{$usuario->email}}" placeholder="email">
        </div>
        <div class='form-group'>
            <label for='eps'>EPS</label>
            <input type="text" name="eps" class="form-control" value="{{$usuario->eps}}" placeholder="eps">
        </div>
        <div class='form-group'>
            <label for='afp'>AFP</label>
            <input type="text" name="afp" class="form-control" value="{{$usuario->afp}}" placeholder="afp">
        </div>
        <div class='form-group'>
            <label for='email_corporativo'>Email corporativo</label>
            <input type="email" name="correo_corporativo" class="form-control" value="{{$usuario->correo_corporativo}}" placeholder="email corporativo">
        </div>
        <div class='form-group'>
            <label for='area'>Ciudad</label>
            <select class="form-control" name="sucursal" value="">
                <option value="{{$usuario->sucursal}}">{{$usuario->sucursal}}</option>
                <option value="bogota">Bogotá</option>
                <option value="cali">Cali</option>
                <option value="barranquilla">Barranquilla</option>
                <option value="cartagena">Cartagena</option>
                <option value="santa marta">Santa marta</option>
                <option value="bucaramanga">Bucaramanga</option>
            </select>
        </div>
        <div class='form-group'>
            <label for='fecha_ingreso'>Fecha ingreso</label>
            <input type="date" name="fecha_ingreso" class="form-control" value="{{$usuario->fecha_ingreso}}" placeholder="fecha ingreso">
        </div>
        <div class='form-group'>
            <label for='fecha_ingreso'>Fecha retiro</label>
            <input type="date" name="fecha_finalizacion_contrato" class="form-control" value="{{$usuario->fecha_finalizacion_contrato}}" placeholder="fecha retiro">
        </div>
        <div class="form-group">
            <a href=""><button  class="btn btn-primary" type="submit">Guardar</button></a>
            <a href="{{asset('usuario')}}"><button class="btn btn-danger" type="button">Cancelar</button></a>
        </div>
        {{Form::close()}}
    </div>
</div>
<div class='row1 align-right'>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="table-responsive">
            <table id="tablausuarios" class="table table-condensed table-hover display">
                <thead>
                <th>#</th>
                <th>Nombre permiso</th>
                <th></th>

                </thead>
                <input type="hidden" value="{{$var=0}}"/>
                @foreach ($permisos as $p)
                <tbody>
                    <tr>
                        <td>{{++$var}}</td>
                        <td>{{$p->nombre_permiso}}</td>
                        <td>
                            @if($p->permisos_id)
                            <i class="fa fa-check" aria-hidden="true"></i>
                        </td>
                        @else

                        @endif
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
<div class='row1 align-right'>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <a href="{{URL::action('PermisosController@edit',$usuario->id)}}"><button  class="btn btn-info" type="submit">Permisos</button></a>
        <a href="{{URL::action('asignarEquiposController@edit',$usuario->id)}}"><button class="btn btn-info">Asignar Equipo</button></a>
    </div>
</div>
@endsection
