@extends('layouts.admin')
@section('titulo')
	<h4><i class="fa fa-calendar-times-o" aria-hidden="true"></i> Servicios sin finalizar</h4>
@endsection
@section('content')
<div class="container-fluid">
	<table class="table">
		<thead>
			<th>Estado:</th>
			@foreach($typetask as $tt)
			<th>{{$tt->estado}}</th>
			@endforeach
		</thead>
		<tbody>
			<th>Cantidad:</th>
			@foreach($typetask as $tt)
			<th>{{$tt->cantidad}}</th>
			@endforeach
		</tbody>
	</table>
</div>
<div class="row1">
    <div id="personal_completo" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 tabcontent">
        <div class="table-responsive">
            <table id="tablausuarios" class="table table-condensed table-hover display table-bordered">
                <thead>
                <th>Id</th>
				<th>uuid</th>
				<th>N° Orden</th>
				<th>Fecha Creacion</th>
				<th>Fecha Inicio</th>
				<th>Hora Inicio</th>
				<th>Estado</th>
				<th>Id Solicitante</th>
				<th>Nombre Solicitante</th>
				<th>Id Empresa</th>
				<th>Nombre Empresa</th>
				<th>Tipo Servicio</th>
				<th>Valor Total Servicio</th>
				<th>Tipo De Pago</th>
				<th>Ciudad</th>
                </thead>
                <input type="hidden" value="{{$var=0}}"/>
                <tbody>
                 @foreach($sinFinalizar as $ssf)
				<tr>
					<td>{{$ssf->id}}</td>
					<td>{{$ssf->uuid}}</td>					
					<td>{{$ssf->num_orden}}</td>	
					<td>{{$ssf->date_created}}</td>	
					<td>{{$ssf->fecha_inicio}}</td>	
					<td>{{$ssf->hora_inicio}}</td>	
					<td>{{$ssf->estado}}</td>	
					<td>{{$ssf->id_solicitante}}</td>	
					<td>{{$ssf->nombre_solicitante}}</td>	
					<td>{{$ssf->id_company}}</td>	
					<td>{{$ssf->name_company}}</td>	
					<td>{{$ssf->tipo_servicio}}</td>	
					<td>{{$ssf->valor_total}}</td>	
					<td>{{$ssf->tipo_de_pago}}</td>	
					<td>{{$ssf->ciudad}}</td>	
				</tr>
				@endforeach
				</tbody>
            </table>
        </div>
    </div>
</div>
@endsection

