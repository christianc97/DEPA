<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-edit-{{$pd->id}}">
    {!! Form::open(array('url' => 'domicilios/editNombrePunto', $pd->id ,'method'=>'POST','autocomplete'=>'off') ) !!}
                {{Form::token()}}
                <input type="hidden"  value="{{$pd->id}}" name="id">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Editar Nombre Punto:<b> {{$pd->nombre}}</b> </h4>
            </div>
            <div class="modal-body">
                Nuevo Nombre:
                <input class="form-control" placeholder="Nuevo Nombre" id="nuevopunto" name="nuevopunto" required="" value="{{$pd->nombre}}">
                Nueva Zona <small class="text text-warning">(opcional)</small>:
                <input class="form-control" placeholder="Nueva Zona (opcional)" id="nuevazona" name="nuevazona" value="{{$pd->zone}}">
                <br>
                <p>Nombre de Punto actual: <b>{{$pd->nombre}}</b></p>
                <p>Nombre de Zona actual: @if ($pd->zone == "")<b class="text text-danger">Zona no registrada</b>@else<b>{{$pd->zone}}</b>@endif</p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Aceptar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
    {{Form::Close()}}
</div>
