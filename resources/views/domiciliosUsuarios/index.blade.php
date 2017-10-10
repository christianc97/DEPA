<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
@extends('layouts.admin')

@section('titulo')
<h3 class="box-title">Domicilios urbanos usuarios</h3>
@endsection

@section('content')
<div class="container">
  <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Empresa mu</th>
        <th>Nombre empresa</th>
        <th>Direcion</th>
        <th>Usuario mu</th>
        <th>Username</th>
        <th>Password</th>
        <th>Ciudad</th>
      </tr>
    </thead>
    <tbody>
         <tr>
        <input type="hidden" value="{{$var=0}}"/>
        @foreach ($domicilios_usuarios as $du)
        <td>{{$du->id}}</td>
        <td><a href="http://admin.mensajerosurbanos.com/empresas/{{$du->empresa_mu}}"  target="_blank">{{$du->empresa_mu}}</a></td>
        <td>{{$du->nombre_empresa}}</td>
        <td>{{$du->direccion}}</td>
        <td>{{$du->usuario_mu}}</td>
        <td>{{$du->username}}</td>
        <td>{{$du->password_reset_token}}</td>
        <td>{{$du->ciudad}}</td>
      </tr>
    </tbody>
    @endforeach
  </table>
  </div>
</div>

@endsection
