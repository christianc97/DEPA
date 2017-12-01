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

@endsection

