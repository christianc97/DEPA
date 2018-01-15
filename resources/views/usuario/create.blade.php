<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
@extends('layouts.admin')

@section('titulo')
<h3 class="box-title">Crear usuario</h3>
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

        {!! Form::open(array('url'=>'usuario','method'=>'POST','autocomplete'=>'off'))!!}
        {{Form::token()}}
        <div class='form-group'>
            <label for='identificacion'>identificacion</label>
            <center><input type="number" name="cedula" class="form-control" placeholder="identificacion"></center>
        </div>
        <div class='form-group'>
            <label for='nombre1'>Primer Nombre</label>
            <input type="text" name="nombre1" class="form-control" placeholder="primer nombre">
        </div>
        <div class='form-group'>
            <label for='nombre2'>Segundo Nombre</label>
            <input type="text" name="nombre2" class="form-control" placeholder="segundo nombre">
        </div>
        <div class='form-group'>
            <label for='apellido1'>Primer Apellido</label>
            <input type="text" name="apellido1" class="form-control" placeholder="primer apellido">
        </div>
        <div class='form-group'>
            <label for='apellido2'>Segundo Apellido</label>
            <input type="text" name="apellido2" class="form-control" placeholder="segundo apellido">
        </div>
        <div class='form-group'>
            <label for='area'>Area</label>
            <select class="form-control" name="area" value="">
                <option value="operaciones">Operaciones</option>
                <option value="tecnologia">Tecnologia</option>
                <option value="comercial">Comercial</option>
                <option value="recursos Humanos" >Recursos Humanos</option> 
                <option value="marketing">Marketing</option>
                <option value="data science">data science</option>
                <option value="administrativa">Administrativa</option>
                <option value="financiera">Financiera</option>
                <option value="vinculacion">Vinculacion</option>
                <option value="sac">SAC</option>
            </select>
        </div>
        <div class='form-group'>
            <label for='nombre2'>Cargo</label>
            <input type="text" name="cargo" class="form-control" placeholder="cargo">
        </div>
        <div class='form-group'>
            <label for='fecha_nacimiento'>Fecha de nacimiento</label>
            <input type="date" name="fecha_nacimiento" class="form-control">
        </div>
        <div class='form-group'>
            <label for='genero'>Genero</label>
            <select class="form-control" name="genero" value="" placeholder="genero">
                <option value="m">Masculino</option>
                <option value="f">Femenino</option>
            </select>
        </div>
        <div class='form-group'>
            <label for='telefono'>Telefono</label>
            <input type="number" name="telefono" class="form-control" placeholder="telefono">
        </div>
    </div>
</div>
<div class='row1 align-right'>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class='form-group'>
            <label for='celular'>Celular</label>
            <input type="text" name="celular" class="form-control" placeholder="celular">
        </div>
        <div class='form-group'>
            <label for='direccion'>Dirección</label>
            <input type="text" name="direccion" class="form-control" placeholder="dirección">
        </div>
        <div class='form-group'>
            <label for='email'>Email</label>
            <input type="email" name="email" class="form-control" placeholder="email">
        </div>
        <div class='form-group'>
            <label for='eps'>EPS</label>
            <input type="text" name="eps" class="form-control" placeholder="eps">
        </div>
        <div class='form-group'>
            <label for='afp'>AFP</label>
            <input type="text" name="afp" class="form-control" placeholder="afp">
        </div>
        <div class='form-group'>
            <label for='email_corporativo'>Email corporativo</label>
            <input type="email" name="correo_corporativo" class="form-control" placeholder="email corporativo">
        </div>
        <div class='form-group'>
            <label for='area'>Ciudad</label>
            <select class="form-control" name="sucursal" value="">
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
            <input type="date" name="fecha_ingreso" class="form-control" placeholder="fecha ingreso">
        </div>
        <div class="form-group">
            <a href=""><button  class="btn btn-primary" type="submit">Guardar</button></a>
            <a href="{{asset('usuario')}}"><button class="btn btn-danger" type="button">Cancelar</button></a>
        </div>
        {{Form::close()}}
    </div>
</div>

@endsection
