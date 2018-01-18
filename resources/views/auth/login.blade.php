@extends('layouts.app')

@section('content')

    <div class="login-form container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Iniciar sesion</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="image-login">
                                <img src="{{ asset('img/motorizado.svg') }}" width="45%" class="img-resposive" 
                                                  srcset="{{ asset('img/motorizado.svg') }} 2x, 
                                             {{ asset('img/motorizado.svg') }} 1000w, 
                                             {{ asset('img/motorizado.svg') }} 768w 2x, 
                                             {{ asset('img/motorizado.svg') }} 1200w, 
                                             {{ asset('img/motorizado.svg') }} 1200w 2x">
                            </div>
                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="correo_corporativo" class="col-md-4 control-label">Usuario</label>
                                <div class="col-md-6">
                                    <input id="username" type="username" class="form-control" name="username" value="{{ old('username') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Contraseña</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block" >
                                        Ingresar
                                    </button>                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection