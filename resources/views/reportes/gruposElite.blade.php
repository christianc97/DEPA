<!DOCTYPE html>
<meta charset="utf-8">
@extends('layouts.admin')
@section('titulo')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">    
    
    @foreach ($permisoAsociar as $pa)
        @if ($pa->permisos_id == 28)        
            <a href="" data-target="#modal-create-{{$pa->permisos_id}}" data-toggle="modal">
                <button class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Asociar Puntos</button>
            </a>
        @endif
        @include('reportes.modalAsociarPuntos')
    @endforeach
    <div class="col-sm-5"><h3 class="box-title"><i class="fa fa-users" aria-hidden="true"></i> Grupos Elite</h3></div>

    {!! Form::open(array('method'=>'POST','autocomplete'=>'off') ) !!}
    {{Form::token()}} 
    <button id="miboton" class="btn btn-success"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Descargar Reporte</button>
    {!! Form::close() !!}

@endsection
@section('content')
<meta charset="utf-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="row1">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 tabcontent">
        <div class="table-responsive">
            <table id="tablausuarios" class="table table-condensed table-hover display" data-toggle="dataTable" data-form="deleteForm">
                <thead>
                <th>N°</th>
                <th>Nombre grupo</th>
                <th>Id Mensajero</th>
                <th>Nombres Mensajero</th>
                <th>Apellidos Mensajero</th>
                <th>Telefono Mensajero</th>
                <th>Acción</th>
                </thead>
                <input type="hidden" value="{{$var=0}}"/>
               @foreach ($gruposElite as $ge)
                <tbody>
                    <tr>
                        <td>{{++$var}}</td>
                        <td onclick="obtenerPuntos({{$ge->idGrupo}});"> <a href="#modal-view" class="form-delete">{{$ge->name}}</a></td>
                        <td>{{$ge->tbl_users_id}}</td>
                        <td>{{$ge->nombres}}</td>
                        <td>{{$ge->apellidos}}</td>
                        <td><a href="SIP:03{{$ge->celular}}">{{$ge->celular}}</a></td>
                        <td>
                        <a href="http://admin.mensajerosurbanos.com/recursos/{{$ge->id}}" target="_blank"><button class="btn btn-info" data-toggle="tooltip" title="Ver"><span class="glyphicon glyphicon-eye-open"></span> </button></a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>    
        </div>
    </div>
</div>
@foreach ($gruposElite as $ge)
    @include('reportes.modalEliminarPuntos')
@endforeach
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});

$('table[data-form="deleteForm"]').on('click', '.form-delete', function(e){
    e.preventDefault();
    var $form = $(this);
    $('#viewmodal').modal({ backdrop: 'static', keyboard: true })
        .on('click', '#btn-primary', function(){

        });
});

function obtenerPuntos(idgrupo){
    $.ajax({
      url: "/puntosAsociados/" + idgrupo,
      context: document.body
    }).done(function(res) {
      // Limpiar tabla
      $('#tabla-puntos').empty();
      var tr = '<tr>';
      for(var i = 0; i < res.length; i++){
       tr += '<td>' + res[i].id + '</td>';
        tr += '<td>' + res[i].id_grupo + '</td>';
        tr += '<td>' + res[i].nombre_grupo + '</td>';
        tr += '<td>' + res[i].nombre_punto + '</td>';
        <?php if ($pa->permisos_id == 28): ?>
          tr += '<td><button onclick="eliminarPuntos(' + res[i].id + ')" class="btn btn-danger">Eliminar</button></td>';
        <?php else: ?>
          tr += '<td></td>';
        <?php endif ?>
        tr += '</tr>'
      }
      
      $('#tabla-puntos').append(tr);
    });
}
function eliminarPuntos(idgrupo){
  console.log(idgrupo);
    $.ajax({
      url: "/eliminar/puntosAsociados/" + idgrupo,
      context: document.body
    }).done(function(res) {
      // Limpiar tabla
      $('#tabla-puntos').empty();
    });
}
</script>
@endsection

