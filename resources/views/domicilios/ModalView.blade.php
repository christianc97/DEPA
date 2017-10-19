<div class="modal fade modal-slide-in-left " aria-hidden="true" role="dialog" tabindex="-1" id="modal-view-{{$pd->id}}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3 class="modal-title">Nombre Punto <b>{{$pd->nombre}}</b></h3>
        </div>
        <div class="modal-body">
            <p>
                <label class="label label-primary">Lunes:</label>&ensp;
                <b>24 horas:</b>
                <input type="checkbox">&ensp;
                <b>Hora apertura:</b> 
                <input type="time" name="">&ensp;
                <b>Hora cierre:</b>
                <input type="time" name="">
            </p>
                <hr>
          <div class="form-group">
            <div class="clearfix">
                <p>
                <label class="label label-success">Martes:</label>&ensp;
                <b>24 horas:</b>
                <input type="checkbox">&ensp;
                <b>Hora apertura:</b> 
                <input type="time" name="">&ensp;
                <b>Hora cierre:</b>
                <input type="time" name="">
            </p>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger " data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary">Guardar</button>
        </div>
                
      </div>
    </div>
</div>
