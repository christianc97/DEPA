<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
@extends('layouts.admin')

@section('titulo')
<h3 class="box-title">Editar direccion de Empresa: <b>{{$empresa->nombre}}</b></h3>
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

        {!!Form::model($empresa,['method'=>'PATCH','route'=>['domiciliosUsuarios.update',$empresa->id]])!!}
        {{Form::token()}}
        <div class='form-group'>
            <label for='codigo'>Id Empresa:</label>
            <center><input type="text" name="codigo" value="{{$empresa->id}}" class="form-control" placeholder="Id Empresa" readonly=""></center>
        </div>
        <div class='form-group'>
            <label for='codigo'>Nombre Empresa:</label>
            <center><input type="text" name="codigo" value="{{$empresa->nombre}}" class="form-control" placeholder="Nombre Empresa" readonly=""></center>
        </div>
        <div class='form-group'>
            <label for='codigo'>Direccion Empresa:</label> <i class="fa fa-pencil" aria-hidden="true"></i>
            <center><input type="text" name="direccion" value="{{$empresa->direccion}}" class="form-control" placeholder="Direccion Empresa" required=""></center>
        </div>
        <div class="form-group">
            <a href=""><button  class="btn btn-primary" type="submit">Guardar</button></a>
            <a href="{{asset('domiciliosUsuarios')}}"><button class="btn btn-danger" type="button">Cancelar</button></a>
        </div>
        {{Form::close()}}
    </div>
</div>
@endsection
