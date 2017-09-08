@extends('layouts.admin')
@section('titulo')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">	
<h3 class="box-title"><span class="glyphicon glyphicon-headphones"></span> Registrar nueva diadema </h3>
@endsection

@section('content')
<div class='row1 align-left'>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach 
            </ul>
        </div>
        @endif

        {!! Form::open(array('url'=>'diademas','method'=>'POST','autocomplete'=>'off'))!!}
        {{Form::token()}}
        <div class='form-group'>
            <label for='codigo'>Codigo</label>
            <center><input type="text" name="codigo" class="form-control" placeholder="Codigo" autofocus="" required=""></center>
        </div>
        <div class='form-group'>
            <label for='codigo'>Fecha Compra</label>
            <center><input type="date" name="fecha_compra" class="form-control" ></center>
        </div>
        <div class="form-group">
            <a href=""><button  class="btn btn-primary" type="submit">Guardar</button></a>
            <a href="{{asset('diademas')}}"><button class="btn btn-danger" type="button">Cancelar</button></a>
        </div>
        
        {{Form::close()}}
    </div>
</div>
@endsection