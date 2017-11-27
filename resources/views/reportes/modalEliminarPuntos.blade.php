<div class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" id="viewmodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Puntos asociados</h4>
            </div>
            <div class="modal-body">
                <table class="table table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Id Grupo</th>
                        <th>Nombre Grupo</th>
                        <th>Nombre Punto</th>
                        <th></th>
                    </thead>
                    <input type="hidden" value="{{$var=0}}"/>
                    <tbody id="tabla-puntos">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                
                <button type="button" class="btn btn-primary" data-dismiss="modal"> Cancelar </button>
            </div>
        </div>
    </div>
</div>
