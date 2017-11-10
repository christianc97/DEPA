<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-view-{{$pa->id_grupo}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title"> Informacion Punto Asociado <span class="glyphicon glyphicon-map-marker"></span></h4>
            </div>
            <div class="modal-body">
                <p>Nombre Grupo:</p>
                <input type="" readonly="" value="{{$pa->nombre_grupo}}" name="idgrupo" class="form-control">
                <p>Nombre Punto:</p>
                <input type="" readonly="" value="{{$pa->nombre_punto}}" name="idgrupo" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cerrar</button>
            </div>
        </div>
    </div>
</div>
