<div class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" id="modal-create-{{$pa->permisos_id}}">
   {!! Form::open(array('url' => 'reportes/puntosgrupos', $pa->permisos_id ,'method'=>'POST','autocomplete'=>'off') ) !!}
                {{Form::token()}}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Asociar Puntos</h4>
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
                        @foreach ($gruposE as $ge)
                        <tr>
                        <td>{{$ge->id}} <input type="hidden" value="{{$ge->id}}" name="idgrupo-{{$ge->id}}"></td>
                        <td>{{$ge->name}} <input type="hidden" value="{{$ge->name}}" name="nombregrupo-{{$ge->id}}"></td>
                        <td><input type="text" name="nombrepunto-{{$ge->id}}" class="form-control" placeholder="Nombre del punto "></td>
                        </tr>
                        @endforeach
                    </tbody>
                
                </table>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Asociar</button>
                <button type="button" class="btn btn-danger" data-dismiss=
                "modal"> Cancelar </button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
