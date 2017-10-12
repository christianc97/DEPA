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
<style type="text/css">
  .table-fixed thead,
.table-fixed tfoot{
  width: 100%;
}

.table-fixed tbody {
  height: 550px;
  overflow-y: auto;
  width: 100%;
}


.table-fixed tbody{
  display: block;
}

.table-fixed thead > tr> th {
  float: left;
}
</style>

<div class="container">                                                                                   
  <div class="table-responsive">          
  <table class="table table-fixed">
          <thead>
            <tr>
              <th >Id</th>
              <th class="col-md-1" style="width:10%">Empresa mu</th>
              <th class="col-md-1" style="width:15%">Nombre empresa</th>
              <th class="col-md-2" style="width:15%">Direcion</th>
              <th class="col-md-2" style="width:13%">Username</th>
              <th class="col-md-2" style="width:13%">Password</th>
              <th class="col-md-2" style="width:13%">Ciudad</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($domicilios_usuarios as $du)
            <tr>
              <td >{{$du->id}}</td>
              <td class="col-xs-2"><a href="http://admin.mensajerosurbanos.com/empresas/{{$du->empresa_mu}}"  target="_blank">{{$du->empresa_mu}}</a></td>
              <td class="col-xs-3">{{$du->nombre_empresa}}</td>
              <td class="col-xs-2">{{$du->direccion}}</td>
              <td class="col-xs-2">{{$du->username}}</td>
              <td class="col-xs-2">{{$du->password_reset_token}}</td>
              <td class="col-xs-3">{{$du->ciudad}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

@endsection
