<div class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" id="modal-view-{{$ge->id}}"">
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
                        <th>Id</th>
                        <th>Nombre Grupo</th>
                        <th>Nombre Punto</th>
                    </thead>
                    <input type="hidden" value="{{$var=0}}"/>
                    <tbody>
                        @foreach($infogroup as $ig)
                        <tr>
                        <td>{{$ig->id_grupo}}</td>                
                        <td>{{$ig->nombre_grupo}}</td>
                        <td>{{$ig->nombre_punto}}</td>
                        </tr>  
                        @endforeach                     
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger">Eliminar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal"> Cancelar </button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
