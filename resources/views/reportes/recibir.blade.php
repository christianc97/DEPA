<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<table class="table table-condensed table-hover table-bordered table-striped">


    @if (count($activacionChia)>0)
    <thead>
    <th class="info">#</th>
    <th class="info">Fecha inicio real</th>
    <th class="info">Hora inicio real</th>
    <th class="info">Fecha final real</th>
    <th class="info">Hora final real</th>
    <th class="info">Ciudad</th>
    <th class="info">Id punto</th>
    <th class="info">Punto</th>
    <th class="info">Nombre</th>
</thead>
<input type="hidden" value="{{$var=0}}"/>
@foreach ($activacionChia as $ac)
<tr>
    <th>{{++$var}}</th>
    <th>{{$ac->fecha_inicio_real}}</th>
    <th>{{$ac->hora_inicio_real}}</th>
    <th>{{$ac->fecha_final_real}}</th>
    <th>{{$ac->hora_final_real}}</th>
    <th>{{$ac->ciudad}}</th>
    <th>{{$ac->idpunto}}</th>
    <th>{{$ac->punto}}</th>
    <th>{{$ac->nombre}}</th>

</tr>
@endforeach
@else 
No hay datos

@endif
</table>