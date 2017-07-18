<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<div class='row1 align-left'>
    <table id="tablausuarios" class="table table-condensed table-hover display">
        @if (count($equipos)>0)
        <thead>
        <th>#</th>
        <th>Codigo</th>
        <th>Tipo</th>
        <th>Modelo</th>
        <th>Serial</th>
        <th>Os instalado</th>

        </thead>
        <input type="hidden" value="{{$var=0}}"/>
        @foreach ($equipos as $e)
        <tbody>
            <tr>
                <td>{{++$var}}</td>
                <td>{{$e->codigo}}</td>
                <td>{{$e->tipo}}</td>
                <td>{{$e->modelo}}</td>
                <td>{{$e->serial}}</td>
                <td>{{$e->os_instalado}}</td>
            </tr>
        </tbody>
    </table>
    <h3>Personas asignadas a este equipo</h3>
    <table id="tablausuarios" class="table table-condensed table-hover display">
        @if (count($equipos_asignados)>0)
        <thead>
        <th>#</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Area</th>
        <th>Fecha de asignacion</th>

        </thead>
        <input type="hidden" value="{{$var=0}}"/>
        @foreach ($equipos_asignados as $ea)
        <tbody>
            <tr>
                <td>{{++$var}}</td>
                <td>{{$ea->nombre1}} {{$ea->nombre2}}</td>
                <td>{{$ea->apellido1}} {{$ea->apellido2}}</td>
                <td>{{$ea->area}}</td>
                <td>{{$ea->fecha_asignacion}}</td>
            </tr>
        </tbody>
        @endforeach
        @else
        No hay personas asignadas a este equipo
        @endif
    </table>
    {!!Form::model($usuario,['method'=>'PATCH','route'=>['asignarEquipos.update',$usuario->id]])!!}
    {{Form::token()}}
    <a href=""><input type="hidden" name='id_equipos' value="{{$e->id_equipos}}"><button  class="btn btn-success" type="submit">Asignar equipo</button></a>
    {{Form::close()}}
    @endforeach
    @else
    No hay equipos con este codigo
    @endif

</div>
