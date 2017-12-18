@extends('layouts.admin')
@section('titulo')
	<h4><i class="fa fa-bars" aria-hidden="true"></i> Todos los servicios en espera que se han entregado en la App de los mensajeros</h4>
@endsection
@section('content')
<div class="col-xs-2">
	<div class="dropdown">
	    <button class="btn btn-success dropdown-toggle" type="button" id="menu1" data-toggle="dropdown" >Selecciona ciudad
	    <span class="caret"></span></button>
	    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
	    	<li role="presentation"><a role="menuitem" tabindex="-1" onclick="(obtenerTodos())">Todas las ciudades</a></li>
	      @foreach($ciudades as $c)<li role="presentation" value="{{$c->id}}" ><a role="menuitem" tabindex="-1" onclick="obtenerPorCiudad({{$c->id}})">{{$c->nombre}}</a></li>@endforeach
	    </ul>
  	</div>
  	<br>
  	<div id="wait"></div>
  	<div id="view-ciudad" style="font-size: 20px"></div>
  	<div id="not-found" style="color: red; font-size: 15px"></div>
</div>
<div class="container">
	<div class="table-responsive">
		<table class="table table-bordered table-hover">
			<thead>
				<th>Id Servicio</th>
				<th>Fecha Inicio</th>
				<th>Fecha Hora Inicio</th>
				<th>Cantidad Servicos en la App</th>
			</thead>
			<tbody id="tabla-puntos">
				
			</tbody>
		</table>
		<div id="elige-ciudad" style="color: green; font-size: 18px">Elige una ciudad</div>
	</div>
</div>
@endsection
<script>
	function obtenerPorCiudad(id){
		$.ajax({
      url: "/TodosServiciosEntregadosAppciudad/" + id,
      context: document.body,
      beforeSend: function() {
	    $('#wait').text('Obteniendo Servicios....');
	  },
	  success: function(html) {
	    $('#wait').html(html);
	  }
    }).done(function(res) {
      // Limpiar tabla
      if (res.length > 1) {
      	$('#tabla-puntos').empty();
      	$('#view-ciudad').empty();
      	$('#not-found').empty();
      	$('#elige-ciudad').empty();
      var tr = '<tr>';
      var ciudad ;
      for(var i = 0; i < res.length; i++){
        tr += '<td>' + res[i].id + '</td>';
        tr += '<td>' + res[i].fecha_inicio + '</td>';
        tr += '<td>' + res[i].hora_inicio + '</td>';
        tr += '<td>' + res[i].llegaron_al_app + '</td>';
        tr += '</tr>';
        ciudad = res[i].nombre;
      }
      $('#tabla-puntos').append(tr);
      $('#view-ciudad').append(ciudad);
      }  else {
      	$('#tabla-puntos').empty();
      	$('#view-ciudad').empty();
      	$('#elige-ciudad').empty();
      	document.getElementById("not-found").innerHTML = "No se encontraron Servicios, intentalo de nuevo";
      }       
    });
	}
	function obtenerTodos(){
		$.ajax({
      url: "/Todos-Servicios-Entregados-App",
      context: document.body,
      beforeSend: function() {
	    $('#wait').text('Obteniendo todos los Servicios...');
	  },
	  success: function(html) {
	    $('#wait').html(html);
	  }
    }).done(function(res) {
      // Limpiar tabla
      if (res.length > 1) {
      	$('#tabla-puntos').empty();
      	$('#view-ciudad').empty();
      	$('#elige-ciudad').empty();
      var tr = '<tr>';
      for(var i = 0; i < res.length; i++){
        tr += '<td>' + res[i].id + '</td>';
        tr += '<td>' + res[i].fecha_inicio + '</td>';
        tr += '<td>' + res[i].hora_inicio + '</td>';
        tr += '<td>' + res[i].llegaron_al_app + '</td>';
        tr += '</tr>'
      }
      $('#tabla-puntos').append(tr);
      $('#view-ciudad').append('Todas las ciudades');
      } 
    });
	}
</script>
