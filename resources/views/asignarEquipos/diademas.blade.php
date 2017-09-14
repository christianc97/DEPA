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
    {!!Form::model($usuario,['method'=>'PATCH','route'=>['asignarEquipos.update',$usuario->id]])!!}
    {{Form::token()}}
    <a href=""><input type="hidden" name='id_equipos' value="{{$e->id_equipos}}"><button  class="btn btn-success" type="submit">Asignar a equipo</button></a>
    {{Form::close()}}
    @endforeach
    @else
    No hay equipos con este codigo
    @endif

</div>
