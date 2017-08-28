@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                <h1>Bienvenido {{Auth::user()->nombre1}} {{Auth::user()->apellido1}}</h1>            
        </div>
    </div>
</div>
<!-- if para denegar el acceso a quienes ya terminaron contrato -->
@if (!(empty(Auth::user()->fecha_finalizacion_contrato)))
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <div class="modal show">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">    
    <h4 class="modal-title" ><b><i class="material-icons" style="font-size:28px;color:red">warning</i> !Acceso Denegado!</b></h4>
     </div>
     <div class="modal-body" style="border-left: 5px solid red ">
     <p><strong>Error: </strong> No tiene acceso o permisos de esta cuenta!</p>
  
     </div>
  <div class="modal-footer">
     <a href="{{ route('logout') }}" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Aceptar </a>
     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
  </div>
  </div>
</div>       
 @endif
@endsection
