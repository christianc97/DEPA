@extends('layouts.admin')

@section('content')

<!-- if para denegar el acceso a quienes ya terminaron contrato -->
@if (!(empty(Auth::user()->fecha_finalizacion_contrato)))

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
  
@else

<style type="text/css">
  .container{
    position: absolute;
    margin:60px 200px;
    float: left;
   padding: 10px;
   max-width: 500px;
   height: 300px;
  }
</style>
<div class="container-fluid">

    <div class="row">
        <div class="col-md-0 col-lg-0 col-md-offset-2">
          <h1>Bienvenido <b>{{Auth::user()->nombre1}} {{Auth::user()->apellido1}}</b></h1>
          <div class="col-md-0 col-lg-0 col-md-offset-2">
          <h4>Sistema de Reportes</h4>
        </div>
        </div>
    </div>
</div>   
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-6">
         <img src="{{ asset('img/Mensajero-de-pie.png') }}" width="20%" class="img-resposive" 
                  srcset="{{ asset('img/Mensajero-de-pie.png') }} 2x, 
             {{ asset('img/Mensajero-de-pie.png') }} 768w, 
             {{ asset('img/Mensajero-de-pie.png') }} 768w 2x, 
             {{ asset('img/Mensajero-de-pie.png') }} 1200w, 
             {{ asset('img/Mensajero-de-pie.png') }} 1200w 2x">
        </div>
    </div>
</div>
 @endif
<!-- fin del if -->
@endsection

