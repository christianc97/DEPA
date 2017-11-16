<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$gi->id_grupo}}">
    {{Form::Open(Array('action'=>array('GruposEliteController@destroy', $gi->id_grupo),'method'=>'delete'))}}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Confimacion eliminar punto <b>{{$gi->nombre_punto}}</b> </h4>
            </div>
            <div class="modal-body">
                <p>¿Esta Seguro que desea eliminar al punto <b>{{$gi->nombre_punto}}</b> asociado al grupo <b>{{$gi->nombre_grupo}}</b> ?</p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Aceptar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
    {{Form::Close()}}
    
</div>
