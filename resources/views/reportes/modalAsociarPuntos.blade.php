<div class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" id="modal-create-{{$ge->idGrupo}}">
   {!! Form::open(array('url'=>'reportes/GruposElite','method'=>'POST','autocomplete'=>'off'))!!}
        {{Form::token()}}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Asociar Punto </h4>
            </div>
            <div class="modal-body">
                Nombre Grupo: 
                <input type="hidden" name="idgrupo" id="idgrupo" value="{{$ge->idGrupo}}" class="form-control">
                <input type="hidden" name="nombregrupo" id="nombre_grupo" value="{{$ge->name}}" class="form-control">
                <b><l class='form-control'>{{$ge->idGrupo}}. {{$ge->name}}</l></b>
                <br>
                Nombre Punto: 
                <input type="text" name="nombrepunto" class="form-control" required="">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Aceptar</button>
                <button type="button" class="btn btn-danger" data-dismiss=
                "modal"> Cancelar </button>
            </div>
        </div>
    </div>
    {{Form::close()}}
</div>
