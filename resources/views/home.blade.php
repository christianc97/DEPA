@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- if para denegar el acceso a quienes ya terminaron contrato -->

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
            Bienvenida <b>{{Auth::user()->nombre1}} {{Auth::user()->apellido1}}</b>
            @else
            Bienvenido <b>{{Auth::user()->nombre1}} {{Auth::user()->apellido1}}</b> 
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
         <img src="{{ asset('img/Mensajero-de-pie.png') }}" width="15%" class="img-resposive" 
                  srcset="{{ asset('img/Mensajero-de-pie.png') }} 2x, 
             {{ asset('img/Mensajero-de-pie.png') }} 768w, 
             {{ asset('img/Mensajero-de-pie.png') }} 768w 2x, 
             {{ asset('img/Mensajero-de-pie.png') }} 1200w, 
             {{ asset('img/Mensajero-de-pie.png') }} 1200w 2x">
        </div>
    </div>
</div>

<!-- fin del if -->
@endsection

