<we!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
@extends('layouts.admin')

@section('titulo')
<h3 class="box-title">Domicilios urbanos empresas</h3>
@endsection

@section('content')
<div class="row1">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h4>Crear Nueva empresa <a href="domicilios/create"><i class="fa fa-plus"></i></a></h4>
    </div>
</div>
<div class="row1">
    <div id="personal_activo" class="col-lg-6 col-md-6 col-sm-6 col-xs-12 tabcontent">
        <div class="table-responsive">
            <table id="tablausuarios" class="table table-condensed table-hover display">
                <thead>
                <th>#</th>
                <th>id</th>
                <th>Nombre</th>
                <th>mu ref</th>
                <th>Tms</th>

                </thead>
                <input type="hidden" value="{{$var=0}}"/>
                @foreach ($domicilios_empresas as $de)
                <tbody>
                    <tr>
                        <td>{{++$var}}</td>
                        <td>{{$de->id}}</td>
                        <td>{{$de->nombre}}</td>
                        <td>{{$de->mu_ref}}</td>
                        <td>{{$de->tms}}</td>
                        <td>
                            <a href="{{URL::action('DomiciliosUrbanosController@show',$de->id)}}"><button class="btn btn-info">Ver empresa</button></a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection