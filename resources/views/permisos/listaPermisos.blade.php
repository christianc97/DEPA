<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

@extends('layouts.admin')
@section('titulo')
<h3 class="box-title">Permisos asignados a los usuarios</h3>
@endsection

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <div class="container-fluid">
        <table class="table table-hover ">
            <thead>
                <tr>
                    <th>N°</th>
                    <th class="col-sm-2">Nombres</th>
                    <th>Permisos</th>
                </tr>
            </thead>
            <input type="hidden" value="{{$var=0}}"/>
            @foreach($permisos as $p)
            <tbody>
                <tr>
                    <td>{{++$var}}</td>
                    <td><a href="{{URL::action('UserController@edit',$p->id)}}" target="_blank">{{$p->nombre}} {{$p->apellido}}</a></td>
                    <td>
                        @if($p->permisos == "")
                            <a href="{{URL::action('PermisosController@edit',$p->id)}}" target="_blank"><l class="text text-danger">Usuario sin permisos</l></a>
                        @endif
                        {{$p->permisos}} <a href="{{URL::action('PermisosController@edit',$p->id)}}" target="_blank"><span class="glyphicon glyphicon-pencil"></span></a>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
@endsection
<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>

