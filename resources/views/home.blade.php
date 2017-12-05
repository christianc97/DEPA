@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
          <h1>
            @if (Auth::user()->genero == 'f')
            Bienvenida <b>{{Auth::user()->nombre1}} {{Auth::user()->apellido1}}</b> <i class="fa fa-snowflake-o" aria-hidden="true" style="font-size:30px"></i>
            @else
            Bienvenido <b>{{Auth::user()->nombre1}} {{Auth::user()->apellido1}}</b> <i class="fa fa-snowflake-o" aria-hidden="true" style="font-size:30px"></i>
            @endif
          </h1>
          <div class="col-md-0 col-lg-0 col-md-offset-2">
          <h4>Sistema de Reportes</h4>
        </div>
        </div>
    </div>
</div>   
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-6">
         <img src="{{ asset('img/santa-mu.png') }}" width="40%" class="img-resposive" 
                  srcset="{{ asset('img/santa-mu.png') }} 2x, 
             {{ asset('img/santa-mu.png') }} 768w, 
             {{ asset('img/santa-mu.png') }} 768w 2x, 
             {{ asset('img/santa-mu.png') }} 1200w, 
             {{ asset('img/santa-mu.png') }} 1200w 2x">
        </div>
    </div>
</div>
 @endif
<!-- fin del if -->
@endsection

