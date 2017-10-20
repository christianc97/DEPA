<div class="modal fade modal-slide-in-left " aria-hidden="true" role="dialog" tabindex="-1" id="modal-view-{{$pd->id}}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3 class="modal-title">Nombre Punto <b>{{$pd->nombre}}</b></h3>
        </div>
        <div class="modal-body">
             {!! Form::open(array('url' => 'domicilios/crearjsonhoras','method'=>'POST','autocomplete'=>'off') ) !!}
                {{Form::token()}}
            <table class="table table-hover">
                <tr>
                   <th>Dias</th>
                   <th>24 Horas</th>
                   <th>Hora apertura</th>
                   <th>Hora cierre</th>
                </tr>
                <tr>
                    <td>Lunes</td>
                    <td><input type="checkbox" name="24" value="24" onchange="lunes(this.checked);"></td>
                    <td><input type="number" id="lunes1" class="form-control" placeholder="Hora de apertura" name="apertura"></td>
                    <td><input type="number" id="lunes2" class="form-control" placeholder="Hora de cierre" name="cierre"></td>
                </tr>
                <tr>
                    <td>Martes</td>
                    <td><input type="checkbox" name="24" value="24" onchange="martes(this.checked);"></td>
                    <td><input type="number" id="martes1" class="form-control" placeholder="Hora de apertura" name="apertura"></td>
                    <td><input type="number" id="martes2" class="form-control" placeholder="Hora de cierre" name="cierre"></td>
                </tr>
                <tr>
                    <td>Miercoles</td>
                    <td><input type="checkbox" name="24" value="24" onchange="miercoles(this.checked);"></td>
                    <td><input type="number" id="miercoles1" class="form-control" placeholder="Hora de apertura" name="apertura"></td>
                    <td><input type="number" id="miercoles2" class="form-control" placeholder="Hora de cierre" name="cierre"></td>
                </tr>
                <tr>
                    <td>Jueves</td>
                    <td><input type="checkbox" name="24" value="24" onchange="jueves(this.checked);"></td>
                    <td><input type="number" id="jueves1" class="form-control" placeholder="Hora de apertura" name="apertura"></td>
                    <td><input type="number" id="jueves2" class="form-control" placeholder="Hora de cierre" name="cierre"></td>
                </tr>
                <tr>
                    <td>Viernes</td>
                    <td><input type="checkbox" name="24" value="24" onchange="viernes(this.checked);"></td>
                    <td><input type="number" id="viernes1" class="form-control" placeholder="Hora de apertura" name="apertura"></td>
                    <td><input type="number" id="viernes2" class="form-control" placeholder="Hora de cierre" name="cierre"></td>
                </tr>
                <tr>
                    <td>Sabados</td>
                    <td><input type="checkbox" name="24" value="24" onchange="sabado(this.checked);"></td>
                    <td><input type="number" id="sabado1" class="form-control" placeholder="Hora de apertura" name="apertura"></td>
                    <td><input type="number" id="sabado2" class="form-control" placeholder="Hora de cierre" name="cierre"></td>
                </tr>
                <tr>
                    <td>Domingos</td>
                    <td><input type="checkbox" name="24" value="24" onchange="domingo(this.checked);"></td>
                    <td><input type="number" id="domingo1" class="form-control" placeholder="Hora de apertura" name="apertura"></td>
                    <td><input type="number" id="domingo2" class="form-control" placeholder="Hora de cierre" name="cierre"></td>
                </tr>
                <tr>
                    <td>Festivos</td>
                    <td><input type="checkbox" name="24" value="24" onchange="festivos(this.checked);"></td>
                    <td><input type="number" id="festivos1" class="form-control" placeholder="Hora de apertura" name="apertura"></td>
                    <td><input type="number" id="festivos2" class="form-control" placeholder="Hora de cierre" name="cierre"></td>
                </tr>
            </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger " data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary" >Guardar</button>
        </div>        
        {!! Form::close() !!}
      </div>
    </div>
</div>


