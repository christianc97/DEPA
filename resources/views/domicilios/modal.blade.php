<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$ud->id}}">
    {{Form::Open(Array('action'=>array('DomiciliosUrbanosController@destroy', $ud->id),'method'=>'delete'))}}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Editar contraseña {{$ud->password_reset_token}}</h4>
            </div>
            <div class="modal-body">
                Nueva Contraseña:
                <input autofocus="" class="form-control" placeholder="Nueva Contraseña" value="" id="newpassword" name="newpassword" required="">
                <br>
                <p>Contraseña actual: <b>{{$ud->password_reset_token}}</b></p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Aceptar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
    {{Form::Close()}}
    
</div>
