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

.table-fixed thead,
.table-fixed tbody,
.table-fixed tfoot,
.table-fixed tr,
.table-fixed td,
.table-fixed th {
  display: block;
}

.table-fixed tbody td,
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
              <th class="col-xs-2">Id</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($domicilios_usuarios as $du)
            <tr>
              <th class="col-xs-2">{{$du->id}}</th>
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
