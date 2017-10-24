<div class="modal fade modal-slide-in-left " aria-hidden="true" role="dialog" tabindex="-1" id="modal-view-{{$pd->id}}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Nombre Punto {{$pd->id}}.<b>{{$pd->nombre}}</b></h4>
        </div>
        <div class="modal-body">
             {!! Form::open(array('url' => 'domicilios/tiempos', $pd->id ,'method'=>'POST','autocomplete'=>'off') ) !!}
                {{Form::token()}}
                <input type="hidden" value="{{$pd->id}}" name="id">
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
                    <td><input  type="number" required="" id="lunes1" name="lunes1" class="form-control" placeholder="Hora de apertura" name="apertura"></td>
                    <td><input  type="number" required="" id="lunes2" name="lunes2" class="form-control" placeholder="Hora de cierre" name="cierre"></td>
                </tr>
                <tr>
                    <td>Martes</td>
                    <td><input type="checkbox" name="24" value="24" onchange="martes(this.checked);"></td>
                    <td><input type="number" required="" id="martes1" class="form-control" placeholder="Hora de apertura" name="martes1"></td>
                    <td><input type="number" required="" id="martes2" class="form-control" placeholder="Hora de cierre" name="martes2"></td>
                </tr>
                <tr>
                    <td>Miercoles</td>
                    <td><input type="checkbox" name="24" value="24" onchange="miercoles(this.checked);"></td>
                    <td><input type="number" required="" id="miercoles1" class="form-control" placeholder="Hora de apertura" name="miercoles1"></td>
                    <td><input type="number" required="" id="miercoles2" class="form-control" placeholder="Hora de cierre" name="miercoles2"></td>
                </tr>
                <tr>
                    <td>Jueves</td>
                    <td><input type="checkbox" name="24" value="24" onchange="jueves(this.checked);"></td>
                    <td><input type="number" required="" id="jueves1" class="form-control" placeholder="Hora de apertura" name="jueves1"></td>
                    <td><input type="number" required="" id="jueves2" class="form-control" placeholder="Hora de cierre" name="jueves2"></td>
                </tr>
                <tr>
                    <td>Viernes</td>
                    <td><input type="checkbox" name="24" value="24" onchange="viernes(this.checked);"></td>
                    <td><input type="number" required="" id="viernes1" class="form-control" placeholder="Hora de apertura" name="viernes1"></td>
                    <td><input type="number" required="" id="viernes2" class="form-control" placeholder="Hora de cierre" name="viernes2"></td>
                </tr>
                <tr>
                    <td>Sabados</td>
                    <td><input type="checkbox" name="24" value="24" onchange="sabado(this.checked);"></td>
                    <td><input type="number" required="" id="sabado1" class="form-control" placeholder="Hora de apertura" name="sabado1"></td>
                    <td><input type="number" required="" id="sabado2" class="form-control" placeholder="Hora de cierre" name="sabado2"></td>
                </tr>
                <tr>
                    <td>Domingos</td>
                    <td><input type="checkbox" name="24" value="24" onchange="domingo(this.checked);"></td>
                    <td><input type="number" required="" id="domingo1" class="form-control" placeholder="Hora de apertura" name="domingo1"></td>
                    <td><input type="number" required="" id="domingo2" class="form-control" placeholder="Hora de cierre" name="domingo2"></td>
                </tr>
                <tr>
                    <td>Festivos</td>
                    <td><input type="checkbox" name="24" value="24" onchange="festivos(this.checked);"></td>
                    <td><input type="number" required="" id="festivos1" class="form-control" placeholder="Hora de apertura" name="festivos1"></td>
                    <td><input type="number" required="" id="festivos2" class="form-control" placeholder="Hora de cierre" name="festivos2"></td>
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


