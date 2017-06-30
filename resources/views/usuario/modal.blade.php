<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$u->id}}">
    {{Form::Open(Array('action'=>array('UserController@destroy', $u->id),'method'=>'delete'))}}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Desea eliminar al usuario {{$u->nombre1}} {{$u->nombre2}} {{$u->apellido1}} {{$u->apellido2}}</h4>
            </div>
            <div class="modal-body">
                <p>¿Esta Seguro que desea eliminar al usuario {{$u->nombre1}} {{$u->nombre2}} {{$u->apellido1}} {{$u->apellido2}}?</p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Aceptar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
    {{Form::Close()}}
    
</div>
