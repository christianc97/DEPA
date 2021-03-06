@extends('layouts/admin')

@section('titulo')
<h3 class="box-title">Extensiones y usuarios asignados a cada equipo</h3>
@endsection

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>N°</th>
				<th>Codigo PC</th>
				<th>Extension</th>
				<th>Usuario PC</th>
				<th>Area</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			<input type="hidden" value="{{$var=0}}"/>
			@foreach($jitsi_equipos as $je)
			<tr>
				<td>{{++$var}}</td>
				<td>
					@if($je->codigo == "")
						<a href="{{asset('usuario')}}" class="text text-danger" target="_blank">Asignar Usuario</a>
					@else
						<a href="{{URL::action('EquiposController@show',$je->id_equipos)}}" target="_blank">{{$je->codigo}}</a>
					@endif
				</td>
				<td>
					@if($je->ext_jitsi == 0)
						<a href="{{URL::action('EquiposController@edit',$je->id_equipos)}}" class="text text-danger" target="_blank">Asignar extension</a>
					@else
					{{$je->ext_jitsi}}
					@endif
				</td>
				
				<td><a href="{{URL::action('UserController@edit',$je->users_id)}}" target="_blank">{{$je->nombre1}} {{$je->apellido1}}</a></td>
				<td>
					@if($je->area == "")
						<a href="{{URL::action('EquiposController@edit',$je->id_equipos)}}" class="text text-danger" target="_blank">Asignar Area</a>
					@else
					{{$je->area}}
					@endif
				</td>
				<td>
					<a href="{{URL::action('EquiposController@edit',$je->id_equipos)}}" target="_blank" class="btn btn-primary">
						<span class="glyphicon glyphicon-pencil"></span> Extension y aréa
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection