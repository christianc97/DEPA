<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<link rel="stylesheet" href="{{asset('css/bootstrap-toggle.min.css')}}">
@extends('layouts.admin')
@section('titulo')
<h3 class="box-title">Editar Diadema</h3>
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

        {!!Form::model($diadema,['method'=>'PATCH','route'=>['diademasList.update',$diadema->id_diadema]])!!}
        {{Form::token()}}
        <div class='form-group'>
            <label for='codigo_d'>Codigo</label>
            <input type="text" name="codigo_d" class="form-control" value="{{$diadema->codigo_d}}" placeholder="primer nombre">
        </div>        
        <div class='form-group'>
            <label for='fecha_compra'>Fecha compra</label>
            <input type="date" name="fecha_compra" class="form-control" value="{{$diadema->fecha_compra}}" placeholder="fecha ingreso">
        </div>
        <div class="form-group">
            <a href=""><button  class="btn btn-primary" type="submit">Guardar</button></a>
            <a href="{{asset('diademasList')}}"><button class="btn btn-danger" type="button">Cancelar</button></a>
        </div>
        {{Form::close()}}
    </div>

@endsection
