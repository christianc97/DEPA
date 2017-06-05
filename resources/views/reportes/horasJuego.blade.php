<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<table id="mitabla" class="table table-condensed table-hover table-bordered table-striped">
    @if (count($horasJuego)>0)

    <thead>
    <th class="info">#</th>
    <th class="info">Id</th>
    <th class="info">Username</th>
    <th class="info">Nombre</th>
    <th class="info">Ciudad</th>
    <th class="info">Celular daviplata</th>
    <th class="info">Cantidad servicios</th>
    <th class="info">Distancia</th>
    <th class="info">Valor total</th>
</thead>
<input type="hidden" value="{{$var=0}}"/>

@foreach ($horasJuego as $hj)
<tr>
    <td>{{++$var}}</td>
    <td>{{$hj->id}}</td>
    <td>{{$hj->username}}</td>
    <td>{{$hj->nombre}}</td>
    <td>{{$hj->ciudad}}</td>
    <td>{{$hj->celular_daviplata}}</td>
    <td>{{$hj->cantidad_servicios}}</td>
    <td>{{$hj->distancia}}</td>
    <td>{{$hj->valor_total}}</td>
</tr>
@endforeach
@else
No hay datos
@endif
</table>

