
@extends('layouts.admin')

@section('titulo')
<h3 class="box-title">Asignar equipo a <b>{{$usuario->nombre1}} {{$usuario->nombre2}} {{$usuario->apellido1}} {{$usuario->apellido2}}</b></h3>
@endsection

@section('content')

<div class='row1 align-right'>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="table-responsive">
            <table id="tablausuarios" class="table table-condensed table-hover display">
           
                @if (count($equipos)>0)
                <thead>
                <th>#</th>
                <th>Codigo</th>
                <th>Tipo</th>
                <th>Modelo</th>
                <th>Serial</th>
                <th>Os instalado</th>
                <th>Fecha de asignacion</th>

                </thead>
                <input type="hidden" value="{{$var=0}}"/>
                @foreach ($equipos as $e)
                <tbody>
                    <tr>
                        <td>{{++$var}}</td>
                        <td>{{$e->codigo}}</td>
                        <td>{{$e->tipo}}</td>
                        <td>{{$e->modelo}}</td>
                        <td>{{$e->serial}}</td>
                        <td>{{$e->os_instalado}}</td>
                        <td>{{$e->fecha_asignacion}}</td>
                        <td>
                            {{Form::Open(array('action'=>array('asignarEquiposController@destroy',$usuario->id),'method'=>'delete'))}}
                            <a href=""><input type="hidden" name='id_equipos' value="{{$e->id_equipos}}"><button  class="btn btn-danger" type="submit"><i class="fa fa-times" aria-hidden="true"></i> Desasignar</button></a>
                            {{Form::Close()}}
                        </td>
                    </tr>
                </tbody>
                @endforeach
                @else
                <tr>
                    <div class="alert alert-info">
                        <strong>Informacion!</strong> No tiene equipos asignados
                    </div>
                </tr>
                @endif
            </table>
        </div>
    </div>
</div>

<div class='row1 align-right'>
    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
        <div class="form-group">
            <p>Asigar equipo &ensp; <small id="msj-asignacion"></small></p>
            <div class="input-group">
                <select class="form-control" style="width: 100px" id="pcid">
                    @foreach($codigos as $c)
                     <option value="{{$c->id_equipos}}">{{$c->codigo}}</option>
                    @endforeach
                </select>
                &ensp;
                <button class="btn btn-primary" onclick="asignarEquipo({{$usuario->id}}, parseInt(document.getElementById('pcid').value))">Asignar</button>
            </div>
        </div>
    </div>
</div>

<div class='row1 align-left'>
    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
        <div class="table-responsive ">
            <a href="{{asset('usuario')}}"><button  class="btn btn-danger" type="submit">volver</button></a>
        </div>
    </div>
</div>

<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>

<script>
    function asignarEquipo(userid, equipoid){

    $.ajax({
      url: "/asignar/equipos/" + userid + "/" + equipoid,
      context: document.body
    }).done(function(res) {
      // Limpiar tabla
      var msj = $( "<strong class='text text-primary'>Asignando.....</strong>" );
      $('#msj-asignacion').append(msj);
      location.reload();
    });
}
</script>
@endsection

