<!DOCTYPE html>
<meta charset="utf-8">
@extends('layouts.admin')
@section('titulo')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <h3 class="box-title"><i class="fa fa-users" aria-hidden="true"></i> Grupos Elite </h3>
@endsection
@section('content')
                <table class="table table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Nombre Grupo</th>
                        <th>Nombre Punto</th>
                        <th></th>
                    </thead>
                    <input type="hidden" value="{{$var=0}}"/>
                    <tbody>
                        @if(!empty($gruposinfo))
                        @foreach($gruposinfo as $gi)
                       <tr>
                           <td>{{$gi->id_grupo}}</td>
                           <td>{{$gi->nombre_grupo}}</td>
                           <td>{{$gi->nombre_punto}}</td>
                           <td><a href="" data-target="#modal-delete-{{$gi->id_grupo}}" data-toggle="modal">
                        <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</button>
                    </a></td>
                       </tr>
                       @endforeach
                    @else 
                        <tr class="active">
                           <td></td>
                           <td><h5 class="text text-danger">No hay informacion Asociada</h5></td>
                           <td> <a href="{{url ('reportes/GruposElite')}}"><button class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Asociar punto</button></a></td>
                        </tr>
                    @endif              
                    </tbody>
                </table>
@foreach ($gruposinfo as $gi)
    @include('reportes.modalEliminarInfoGrupo')
@endforeach
@endsection
