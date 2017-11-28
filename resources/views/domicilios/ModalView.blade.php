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
            <div class="container-fluid">

              <div class="row">
                <div class="col-sm-6" ><span class="glyphicon glyphicon-pencil"></span> Indicaciones</div>
                <div class="col-sm-5">
                    <table class="table table-hover table-bordered" style="width: 35%">
                <tr>
                   <th class="col-sm-2">Dias</th>
                   <th>Hora apertura</th>
                   <th >Hora cierre</th>
                </tr>
                <tr id="schedule">

                    <td>Lunes</td>
                    <td><input type="number" style="width: 90px" required="" title="valor entre 1 y 23.99" id="lunes1-{{$pd->id}}" class="form-control" name="lunes1" min="1" max="23.99" step="any"></td>
                    <td><input type="number" style="width: 90px" required="" title="valor entre 1 y 23.99" id="lunes2-{{$pd->id}}" class="form-control" name="lunes2" min="1" max="23.99" step="any"></td>
                </tr>
                <tr>
                    <td>Martes</td>
                    <td><input type="number" style="width: 90px" required="" title="valor entre 1 y 23.99" id="martes1-{{$pd->id}}" class="form-control" name="martes1" min="1" max="23.99" step="any"></td>
                    <td><input type="number" style="width: 90px" required="" title="valor entre 1 y 23.99" id="martes2-{{$pd->id}}" class="form-control" name="martes2" min="1" max="23.99" step="any"></td>
                </tr>
                <tr>
                    <td>Miercoles</td>
                    <td><input type="number" style="width: 90px" required="" title="valor entre 1 y 23.99" id="miercoles1-{{$pd->id}}" class="form-control" name="miercoles1" min="1" max="23.99" step="any"></td>
                    <td><input type="number" style="width: 90px" required="" title="valor entre 1 y 23.99" id="miercoles2-{{$pd->id}}" class="form-control" name="miercoles2" min="1" max="23.99" step="any"></td>
                </tr>
                <tr>
                    <td>Jueves</td>
                    <td><input type="number" style="width: 90px" required="" title="valor entre 1 y 23.99" id="jueves1-{{$pd->id}}" class="form-control" name="jueves1" min="1" max="23.99" step="any"></td>
                    <td><input type="number" style="width: 90px" required="" title="valor entre 1 y 23.99" id="jueves2-{{$pd->id}}" class="form-control" name="jueves2" min="1" max="23.99" step="any"></td>
                </tr>
                <tr>
                    <td>Viernes</td>
                    
                    <td><input type="number" style="width: 90px" required="" title="valor entre 1 y 23.99" id="viernes1-{{$pd->id}}" class="form-control" name="viernes1" min="1" max="23.99" step="any"></td>
                    <td><input type="number" style="width: 90px" required="" title="valor entre 1 y 23.99" id="viernes2-{{$pd->id}}" class="form-control" name="viernes2" min="1" max="23.99" step="any"></td>
                </tr>
                <tr>
                    <td>Sabados</td>
                    <td><input type="number" style="width: 90px" required="" title="valor entre 1 y 23.99" id="sabado1-{{$pd->id}}" class="form-control" name="sabado1" min="1" max="23.99" step="any"></td>
                    <td><input type="number" style="width: 90px" required="" title="valor entre 1 y 23.99" id="sabado2-{{$pd->id}}" class="form-control" name="sabado2" min="1" max="23.99" step="any"></td>
                </tr>
                <tr>
                    <td>Domingos</td>
                    <td><input type="number" style="width: 90px" required="" title="valor entre 1 y 23.99" id="domingo1-{{$pd->id}}" class="form-control" name="domingo1" min="1" max="23.99" step="any"></td>
                    <td><input type="number" style="width: 90px" required="" title="valor entre 1 y 23.99" id="domingo2-{{$pd->id}}" class="form-control" name="domingo2" min="1" max="23.99" step="any"></td>
                </tr>
                <tr>
                    <td>Festivos</td>                    
                    <td><input type="number" style="width: 90px" required="" title="valor entre 1 y 23.99" id="festivos1-{{$pd->id}}" class="form-control" name="festivos1" min="1" max="23.99" step="any"></td>
                    <td><input type="number" style="width: 90px" required="" title="valor entre 1 y 23.99" id="festivos2-{{$pd->id}}" class="form-control" name="festivos2" min="1" max="23.99" step="any"></td>
                </tr>
            </table>
                </div>                
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger " data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>        
        {!! Form::close() !!}
      </div>
    </div>
</div>

