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
                <input type="hidden"  value="{{$pd->id}}" name="id">
            <table class="table table-hover">
                <tr>
                   <th>Dias</th>
                   <th>24 Horas</th>
                   <th>Hora apertura</th>
                   <th>Hora cierre</th>
                </tr>
                <tr>
                    <td>Lunes</td>
                    <td><input type="checkbox" name="lunes24" id="lunes24"  value="0-0"  onchange="lunes(this.checked);"></td>
                    <td><input type="number" style="width: 80px" step="any" required="" id="lunes1" class="form-control" name="lunes1"></td>
                    <td><input type="number" style="width: 80px" step="any" required="" id="lunes2" class="form-control" name="lunes2"></td>
                </tr>
                <tr>
                    <td>Martes</td>
                    <td><input type="checkbox" name="martes24" id="martes24"  value="0-0"  onchange="martes(this.checked);"></td>
                    <td><input type="number" style="width: 80px"   step="any" required="" id="martes1" class="form-control" name="martes1"></td>
                    <td><input type="number" style="width: 80px"   step="any" required="" id="martes2" class="form-control" name="martes2"></td>
                </tr>
                <tr>
                    <td>Miercoles</td>
                    <td><input type="checkbox" name="miercoles24"  value="0-0"  onchange="miercoles(this.checked);"></td>
                    <td><input type="number" style="width: 80px"   step="any" required="" id="miercoles1" class="form-control" name="miercoles1"></td>
                    <td><input type="number" style="width: 80px"   step="any" required="" id="miercoles2" class="form-control" name="miercoles2"></td>
                </tr>
                <tr>
                    <td>Jueves</td>
                    <td><input type="checkbox" name="jueves24"  value="0-0"  onchange="jueves(this.checked);"></td>
                    <td><input type="number" style="width: 80px"   step="any" required="" id="jueves1" class="form-control" name="jueves1"></td>
                    <td><input type="number" style="width: 80px"   step="any" required="" id="jueves2" class="form-control" name="jueves2"></td>
                </tr>
                <tr>
                    <td>Viernes</td>
                    <td><input type="checkbox" name="viernes24"  value="0-0"  onchange="viernes(this.checked);"></td>
                    <td><input type="number" style="width: 80px"   step="any" required="" id="viernes1" class="form-control" name="viernes1"></td>
                    <td><input type="number" style="width: 80px"   step="any" required="" id="viernes2" class="form-control" name="viernes2"></td>
                </tr>
                <tr>
                    <td>Sabados</td>
                    <td><input type="checkbox" name="sabados24"  value="0-0"  onchange="sabado(this.checked);"></td>
                    <td><input type="number" style="width: 80px"   step="any" required="" id="sabado1" class="form-control" name="sabado1"></td>
                    <td><input type="number" style="width: 80px"   step="any" required="" id="sabado2" class="form-control" name="sabado2"></td>
                </tr>
                <tr>
                    <td>Domingos</td>
                    <td><input type="checkbox" name="domingos24"  value="0-0"  onchange="domingo(this.checked);"></td>
                    <td><input type="number" style="width: 80px"   step="any" required="" id="domingo1" class="form-control" name="domingo1"></td>
                    <td><input type="number" style="width: 80px"   step="any" required="" id="domingo2" class="form-control" name="domingo2"></td>
                </tr>
                <tr>
                    <td>Festivos</td>
                    <td><input type="checkbox" name="festivos24"  value="0-0"  onchange="festivos(this.checked);"></td>
                    <td><input type="number" style="width: 80px"   step="any" required="" id="festivos1" class="form-control" name="festivos1"></td>
                    <td><input type="number" style="width: 80px"   step="any" required="" id="festivos2" class="form-control" name="festivos2"></td>
                </tr>
            </table>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-warning" >Limpiar</button>
          <button type="button" class="btn btn-danger " data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary" onclick="validar();">Guardar</button>
        </div>        
        {!! Form::close() !!}
      </div>
    </div>
</div>

