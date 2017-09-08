<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<div class='row1 align-left'>
    <table id="tablausuarios" class="table table-condensed table-hover display">
        @if (count($diademas)>0)
        <thead>
        <th>N°</th>
        <th>Codigo</th>
        <th>Fecha Compra</th>
        </thead>
        <input type="hidden" value="{{$var=0}}"/>
        @foreach ($diademas as $d)
        <tbody>
            <tr>
                <td>{{++$var}}</td>
                <td>{{$d->codigo}}</td>
                <td>{{$d->fecha_compra}}</td>
            </tr>
        </tbody>
    </table>
    <h3>Diademas asignadas a este equipo</h3>
    <table id="tablausuarios" class="table table-condensed table-hover display">
        @if (count($diademas_asignadas)>0)
        <thead>
        <th>#</th>
        <th>Codigo</th>
        <th>Fecha de Compra</th>
        </thead>
        <input type="hidden" value="{{$var=0}}"/>
        @foreach ($diademas_asignadas as $da)
        <tbody>
            <tr>
                <td>{{++$var}}</td>
                <td>{{$da->codigo}}</td>
                <td>{{$da->fecha_compra}}</td>
            </tr>
        </tbody>
        @endforeach
        @else
        <label class="label label-info">No hay personas asignadas a este equipo</label>
        @endif
    </table>
    {!!Form::model($diadema,['method'=>'PATCH','route'=>['asignardiademas.update',$diadema->id_diadema]])!!}
    {{Form::token()}}
    <a href=""><input type="hidden" name='id_diademas' value="{{$d->id_diadema}}"><button  class="btn btn-success" type="submit">Asignar equipo</button></a>
    {{Form::close()}}
    @endforeach
    @else
    <label class="label label-danger">No hay equipos con este codigo</label>
    @endif

</div>
