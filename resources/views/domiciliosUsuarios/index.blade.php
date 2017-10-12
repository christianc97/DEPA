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
  height: 500px;
  overflow-y: auto;
  width: 100%;
}


.table-fixed tbody{
  display: block;
}
.table-fixed tfoot{
  display: block;
}

.table-fixed thead > tr> th,
.table-fixed tfoot > tr> td{
  float: left;
  border-bottom-width: 0;
}
</style>

    <div class="panel panel-default">
      <div class="panel-body">
        <table class="table table-fixed">
          <thead>
            <tr>
              <th class="col-xs-1">Id</th>
              <th class="col-xs-1">Empresa mu</th>
              <th class="col-xs-2">Nombre empresa</th>
              <th class="col-xs-2">Direcion</th>
              <th class="col-xs-2">Username</th>
              <th class="col-xs-2">Password</th>
              <th class="col-xs-1">Ciudad</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($domicilios_usuarios as $du)
            <tr>
              <td class="col-xs-1">{{$du->id}}</td>
              <td class="col-xs-1"><a href="http://admin.mensajerosurbanos.com/empresas/{{$du->empresa_mu}}"  target="_blank">{{$du->empresa_mu}}</a></td>
              <td class="col-xs-2">{{$du->nombre_empresa}}</td>
              <td class="col-xs-2">{{$du->direccion}}</td>
              <td class="col-xs-2">{{$du->username}}</td>
              <td class="col-xs-2">{{$du->password_reset_token}}</td>
              <td class="col-xs-1">{{$du->ciudad}}</td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <td class="col-xs-2">Total 1</td>
              <td class="col-xs-2">Total 2</td>
              <td class="col-xs-2">Total 3</td>
              <td class="col-xs-2">Total 4</td>
              <td class="col-xs-2">Total 5</td>
              <td class="col-xs-2">Total 6</td>
            </tr>
          </tfoot>
        </table>
      </div>

@endsection
