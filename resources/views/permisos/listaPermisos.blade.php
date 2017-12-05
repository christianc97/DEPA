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
    <div class="container-fluid">
        <table class="table table-hover table-bordered">
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
                        @if(empty($p->permisos))
                            <a href="{{URL::action('PermisosController@edit',$p->id)}}" target="_blank"><l class="text text-danger">Usuario sin permisos</l></a>
                        @endif
                        <a href="{{URL::action('PermisosController@edit',$p->id)}}" target="_blank" style="text-decoration: none; color: black">{{$p->permisos}}</a>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
@endsection
<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>

