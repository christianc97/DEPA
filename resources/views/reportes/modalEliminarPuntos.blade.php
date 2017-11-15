<div class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" id="modal-view-{{$pa->permisos_id}}">
   {!! Form::open(array('url' => 'reportes/puntosgrupos', $pa->permisos_id ,'method'=>'POST','autocomplete'=>'off') ) !!}
                {{Form::token()}}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title"><b>Informacion Puntos</b></h4>
                <small>Nombre del grupo elite y el punto anteriormente guardado</small>
            </div>
            <div class="modal-body">
                <table class="table table-hover">
                    <thead>
                        <th>Nombre Grupo</th>
                        <th>Nombre Punto</th>
                    </thead>
                    <input type="hidden" value="{{$var=0}}"/>
                    <tbody>
                        <tr>                
                        <td>
                            <select  class="form-control" name="nombregrupo">
                                @foreach ($infogroup as $ig)
                                <option value="{{$ig->id_grupo}}">{{$ig->id_grupo}}.{{$ig->nombre_grupo}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select  class="form-control" name="nombregrupo">
                                @foreach ($infogroup as $ig)
                                <option>{{$ig->nombre_punto}}</option>
                                @endforeach
                            </select>
                        </td>
                        </tr>                       
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Eliminar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal"> Cancelar </button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
