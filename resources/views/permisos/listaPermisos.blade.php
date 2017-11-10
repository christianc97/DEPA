<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

@extends('layouts.admin')
@section('titulo')
<h3 class="box-title">Personal</h3>
@endsection

@section('content')
<div class="row1">
</div>
<div class="row1">
    <div id="personal_activo" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 tabcontent">
        <div class="table-responsive">
            <table id="tablausuarios" class="table table-bordered">
                <thead>
                <th >Nombres</th>
                <th>permiso</th>
                <th>permiso</th>
                <th>permiso</th>
                <th>permiso</th>
                <th>permiso</th>
                <th>permiso</th>
                <th>permiso</th>
                <th>permiso</th>
                </thead>
                @foreach ($permisos as $u)
                <tbody>
                    <tr>
                        <td width="50">{{$u->nombre1}} {{$u->nombre2}} {{$u->apellido1}} {{$u->apellido2}}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        
                          </td>
                    </tr>
                </tbody>
                 @endforeach
            </table>
        </div>
    </div>
</div>

@endsection
<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>

