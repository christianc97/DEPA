@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                <h1>Bienvenido {{Auth::user()->nombre1}} {{Auth::user()->apellido1}}</h1>
                
        </div>
    </div>
</div>
@endsection
