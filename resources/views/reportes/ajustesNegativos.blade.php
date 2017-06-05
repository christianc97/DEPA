<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<table id="mitabla" class="table table-condensed table-hover table-bordered table-striped">
    @if (count($ajustes)>0)

    <thead>
    <th class="info">#</th>
    <th class="info">Id</th>
    <th class="info">Username</th>
    <th class="info">Email</th>
    <th class="info">Nombre</th>
    <th class="info">Descuento</th>
</thead>
<input type="hidden" value="{{$var=0}}"/>

@foreach ($ajustes as $ajus)
<tr>
    <td>{{++$var}}</td>
    <td>{{$ajus->id}}</td>
    <td>{{$ajus->username}}</td>
    <td>{{$ajus->email}}</td>
    <td>{{$ajus->nombre}}</td>
    <td>{{$ajus->descuento}}</td>
</tr>
@endforeach
@else
No hay datos
@endif
</table>
