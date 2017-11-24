@extends('layouts.admin')
@section('titulo')
	<h4><i class="fa fa-list" aria-hidden="true"></i> Servicios que se han entregado a los mensajeros</h4>
@endsection
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-1">
			<b>Id servicio:</b>
		</div>
		<div class="col-sm-2">
			<input class="form-control" type="number" id="idservicio" placeholder="Id servicio" autofocus=""></input>
		</div>
		<div class="col-sm-2">
			<button class="btn btn-success" onclick="buscar(parseInt(document.getElementById('idservicio').value));">Buscar</button>
		</div>
	</div>
</div>
<br>
<div class="container">
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<th>Id Mensajero</th>
				<th>Nombre Mensajero</th>
				<th>Fecha creacion</th>
				<th>Round</th>
			</thead>
			<tbody id="tabla-puntos">
				<div id="wait"></div>
			</tbody>
		</table>
	</div>
</div>
@endsection

<script>
	function buscar(id){
		$.ajax({
      url: "/api/serviciosvistos/" + id,
      context: document.body,
      beforeSend: function() {
	    $('#wait').text('Espera un momento por favor...');
	  },
	  success: function(html) {
	    $('#wait').html(html);
	  }
    }).done(function(res) {
      // Limpiar tabla
      if (res.length > 1) {
      	$('#tabla-puntos').empty();
      var tr = '<tr>';
      for(var i = 0; i < res.length; i++){
      	
        tr += '<td>' + res[i].id_resource + '</td>';
        tr += '<td>' + res[i].nombre + '</td>';
        tr += '<td>' + res[i].datacreate + '</td>';
        tr += '<td>' + res[i].round + '</td>';
        tr += '</tr>'
      }
      $('#tabla-puntos').append(tr);
      } else {
      	$('#tabla-puntos').empty();
      	document.getElementById("wait").innerHTML = "<div class='alert alert-info alert-dismissable fade in'><a href='#' class='close alert-link' data-dismiss='alert' aria-label='close'>&times;</a><strong>Informacion!</strong> No hay datos relacionados a este servicio</div>";
      }

      
    });
	}
</script>