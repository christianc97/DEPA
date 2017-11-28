<div class="modal fade modal-slide-in-left " aria-hidden="true" role="dialog" tabindex="-1" id="modal-view-{{$pd->id}}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Nombre Punto <b>{{$pd->id}}.{{$pd->nombre}}</b></h4>
        </div>
        <div class="modal-body">
             {!! Form::open(array('url' => 'domicilios/tiempos', $pd->id ,'method'=>'POST','autocomplete'=>'off') ) !!}
                {{Form::token()}}
                <input type="hidden"  value="{{$pd->id}}" name="id">
            <div class="container-fluid">

              <div class="row">
                <div class="col-sm-6" >
                    <h4><span class="glyphicon glyphicon-pencil"></span> Indicaciones</h4>
                   <dl>
                      <dt>1. Formato de horas </dt>
                      <dd>
                        <li>La hora de apertura: debe tener un valor mayor o igual 0.</li>
                        <li>La hora de cierre: debe tener un valor menor o igual a 24.</li>
                        <li>Las horas se trabajan en formato militar. <l class="text text-success" style="cursor: pointer; font-size: 13px">Ver formato</l></li>
                    </dd>
                    <img src="http://slideplayer.es/307938/2/images/3/12+6+11+1+0%2F24+La+hora+militar+23+13+2+10+22+14+9+21+15+3+20+16+8+4+19+17+18+7+5.jpg" class="img-responsive" width="300">
                    <dt>2. Uso de las horas </dt>
                      <dd>
                        <ul>
                            <b><li>Si el punto está cerrado</li></b>
                            1. La hora de apertura será 24.
                            <br>
                            2. La hora de cierre será 24.
                            <b><li>Si el punto está abierto todo el dia</li></b>
                            1. La hora de apertura será 0.
                            <br>
                            2. La hora de cierre será 0.
                        </ul>
                    </dd>
                    </dl>
                </div>
                <div class="col-sm-5">
                    <table class="table table-hover table-bordered" style="width: 35%">
                <tr>
                   <th class="col-sm-2">Dias</th>
                   <th>Hora apertura</th>
                   <th >Hora cierre</th>
                </tr>
                <tr id="schedule">
                    <td>Lunes</td>
                    <td><input type="number" style="width: 90px" required="" title="valor entre 0 y 24" id="" class="form-control" name="lunes1" min="0" max="24"></td>
                    <td><input type="number" style="width: 90px" required="" title="valor entre 0 y 24" id="" class="form-control" name="lunes2" min="0" max="24"></td>
                </tr>
                <tr>
                    <td>Martes</td>
                    <td><input type="number" style="width: 90px" required="" title="valor entre 0 y 24" id="" class="form-control" name="martes1" min="0" max="24"></td>
                    <td><input type="number" style="width: 90px" required="" title="valor entre 0 y 24" id="" class="form-control" name="martes2" min="0" max="24"></td>
                </tr>
                <tr>
                    <td>Miercoles</td>
                    <td><input type="number" style="width: 90px" required="" title="valor entre 0 y 24" id="" class="form-control" name="miercoles1" min="0" max="24"></td>
                    <td><input type="number" style="width: 90px" required="" title="valor entre 0 y 24" id="" class="form-control" name="miercoles2" min="0" max="24"></td>
                </tr>
                <tr>
                    <td>Jueves</td>
                    <td><input type="number" style="width: 90px" required="" title="valor entre 0 y 24" id="" class="form-control" name="jueves1" min="0" max="24"></td>
                    <td><input type="number" style="width: 90px" required="" title="valor entre 0 y 24" id="" class="form-control" name="jueves2" min="0" max="24"></td>
                </tr>
                <tr>
                    <td>Viernes</td>
                    <td><input type="number" style="width: 90px" required="" title="valor entre 0 y 24" id="" class="form-control" name="viernes1" min="0" max="24"></td>
                    <td><input type="number" style="width: 90px" required="" title="valor entre 0 y 24" id="" class="form-control" name="viernes2" min="0" max="24"></td>
                </tr>
                <tr>
                    <td>Sabados</td>
                    <td><input type="number" style="width: 90px" required="" title="valor entre 0 y 24" id="" class="form-control" name="sabado1" min="0" max="24"></td>
                    <td><input type="number" style="width: 90px" required="" title="valor entre 0 y 24" id="" class="form-control" name="sabado2" min="0" max="24"></td>
                </tr>
                <tr>
                    <td>Domingos</td>
                    <td><input type="number" style="width: 90px" required="" title="valor entre 0 y 24" id="" class="form-control" name="domingo1" min="0" max="24"></td>
                    <td><input type="number" style="width: 90px" required="" title="valor entre 0 y 24" id="" class="form-control" name="domingo2" min="0" max="24"></td>
                </tr>
                <tr>
                    <td>Festivos</td>                    
                    <td><input type="number" style="width: 90px" required="" title="valor entre 0 y 24" id="" class="form-control" name="festivos1" min="0" max="24"></td>
                    <td><input type="number" style="width: 90px" required="" title="valor entre 0 y 24" id="" class="form-control" name="festivos2" min="0" max="24"></td>
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
<script>
    $(document).ready(function(){
        $("img").hide();
        $("l").click(function(){
            $("img").toggle();
        });
    });
</script>
