<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
@extends('layouts.admin')
@section('titulo')
<h3 class="box-title">Permisos del usuario</h3>
@endsection

@section('content')
<div class='row1 align-right'>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="table-responsive">
            <table id="tablausuarios" class="table table-condensed table-hover display">
                <thead>
                <th>#</th>
                <th>Nombre permisos</th>
                <th></th>
                <th colspan="2">Opciones</th>

                </thead>
                <input type="hidden" value="{{$var=0}}"/>
                @foreach ($permisos as $p)
                <tbody>
                    <tr>
                        <td>{{++$var}}</td>
                        <td>{{$p->nombre_permiso}}</td>
                        <td>
                            @if($p->permisos_id)
                            <i class="fa fa-check" aria-hidden="true"></i>
                        </td>
                        <td>
                            <a href=""><button  class="btn btn-danger" type="submit"><i class="fa fa-times" aria-hidden="true"></i></button></a>
                        </td>
                        @else
                        <td>
                            <a href=""><button  class="btn btn-info" type="submit"><i class="fa fa-check-circle" aria-hidden="true"></i></button></a>
                        </td>

                        @endif
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection