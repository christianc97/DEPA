<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
@extends('layouts.admin')

@section('titulo')
<h3 class="box-title">Perfil</h3>
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
        @foreach($usuario as $u)
        <div class='form-group'>
            <label for='identificacion'>identificacion: </label>
            {{$u->cedula}}
        </div>
        <div class='form-group'>
            <label for='nombre1'>Nombre 1: </label>
            {{$u->nombre1}}
        </div>
        <div class='form-group'>
            <label for='nombre2'>Nombre 2: </label>
            {{$u->nombre2}}
        </div>
        <div class='form-group'>
            <label for='apellido1'>Apellido 1: </label>
            {{$u->apellido1}}
        </div>
        <div class='form-group'>
            <label for='apellido2'>Apellido 2: </label>
            {{$u->apellido2}}
        </div>
        <div class='form-group'>
            <label for='area'>Area: </label>
            {{$u->area}}
        </div>
        <div class='form-group'>
            <label for='nombre2'>Cargo: </label>
            {{$u->cargo}}
        </div>
        <div class='form-group'>
            <label for='fecha_nacimiento'>Fecha de nacimiento: </label>
            {{$u->fecha_nacimiento}}
        </div>
        <div class='form-group'>
            <label for='genero'>Genero: </label>
            {{$u->genero}}
        </div>

    </div>
</div>
<div class='row1 align-right'>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class='form-group'>
            <label for='telefono'>Telefono: </label>
            {{$u->telefono}}
        </div>
        <div class='form-group'>
            <label for='celular'>Celular: </label>
           {{$u->celular}}
        </div>
        <div class='form-group'>
            <label for='direccion'>Dirección: </label>
            {{$u->direccion}}
        </div>
        <div class='form-group'>
            <label for='email'>Email: </label>
            {{$u->email}}
        </div>
        <div class='form-group'>
            <label for='eps'>EPS: </label>
            {{$u->eps}}
        </div>
        <div class='form-group'>
            <label for='afp'>AFP: </label>
            {{$u->afp}}
        </div>
        <div class='form-group'>
            <label for='email_corporativo'>Email corporativo: </label>
            {{$u->correo_corporativo}}
        </div>
        <div class='form-group'>
            <label for='area'>Ciudad: </label>
            {{$u->sucursal}}
        </div>
        <div class='form-group'>
            <label for='fecha_ingreso'>Fecha ingreso: </label>
            {{$u->fecha_ingreso}}
        </div>
        @endforeach
        <div class="form-group">
            <a href="{{URL::action('PerfilController@edit',$u->id)}}"><button class="btn btn-primary" type="button">Editar</button></a>
        </div>
    </div>
</div>
@endsection
