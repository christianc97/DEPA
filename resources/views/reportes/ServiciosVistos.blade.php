@extends('layouts.admin')
@section('titulo')
	<h4><i class="fa fa-list" aria-hidden="true"></i> Servicios Vistos</h4>
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
				<th>Id Recurso</th>
				<th>Nombre Mensajero</th>
				<th>Round</th>
			</thead>
			<tbody id="tabla-puntos">
				
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
    }).done(function(res) {
      // Limpiar tabla
      $('#tabla-puntos').empty();
      var tr = '<tr>';
      for(var i = 0; i < res.length; i++){
      	
        tr += '<td>' + res[i].id_resource + '</td>';
        tr += '<td>' + res[i].nombre + '</td>';
        tr += '<td>' + res[i].round + '</td>';
        tr += '</tr>'
      }
      
      $('#tabla-puntos').append(tr);
    });
	}
</script>