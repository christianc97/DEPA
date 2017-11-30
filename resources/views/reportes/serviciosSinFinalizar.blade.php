@extends('layouts.admin')
@section('titulo')
	<h4><i class="fa fa-calendar-times-o" aria-hidden="true"></i> Servicios sin finalizar</h4>
@endsection
@section('content')
<div class="container-fluid">
	<table class="table table-bordered display">
		<thead>
			<th>Estado:</th>
			@foreach($type_task_status as $tts)
			<th >{{$tts->estado}}</th>
			@endforeach
		</thead>
		<tbody>
			<th>Cantidad:</th>
			@foreach($type_task_status as $tts)
			<th >{{$tts->cantidad}}</th>
			@endforeach
		</tbody>
	</table>
</div>

@endsection

