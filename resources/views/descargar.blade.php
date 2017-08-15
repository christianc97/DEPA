<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('DEPA', 'DEPA') }}</title>
<link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Scripts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                     <a class="navbar-brand" href="{{ url('/login') }}">
                        {{ config('DP', 'DP') }} <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    </a>
                    <a class="navbar-brand" href="{{ url('/d') }}">
                        <b>{{ config('Programas', 'Programas') }}</b>
                    </a>
                   
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right" >
                        <!-- Authentication Links -->
                        

                    </ul>

                </div>

            </div>

        </nav>

        
<div class="row1">
    <div id="personal_activo" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 tabcontent">
        <div class="table-responsive">
            <table id="tablausuarios" class="table table-condensed table-hover display">
                <thead>
                <th>#</th>
                <th>Icon</th>
                <th>Nombre</th>
                <th>Version</th>
                <th>Tamaño</th>
                <th>Descargar</th>

                </thead>             
                <tbody>
                <tr>
                    <th>1</th>
                    <th><img src="{{ asset('img/chrome.png') }} " style="width: 30px"></th>
                    <th>Navegador Google Chrome</th>
                    <th>1.3.31.5</th>
                    <th>54.1 MB</th>
                    <th><a href="/storage/ChromeStandaloneSetup64.exe"><button type="button" class="btn btn-primary" title="Descarga directa" data-toggle="tooltip">
                        <span class="glyphicon glyphicon-download-alt"></span> 
                        </button></a>
                    <a href="https://www.google.es/chrome/browser/desktop/index.html"  target="_blank"><button type="button" class="btn btn-success" title="Decarga de pagina web externa" data-toggle="tooltip">
                    <span class="glyphicon glyphicon-download-alt"></span> 
                    </button> </a></th>
                    </tr>
                    <!-- -->
                    <tr>
                    <th>2</th>
                    <th><img src="{{ asset('img/clover.png') }} " style="width: 30px"></th>
                    <th>Clover Explorer</th>
                    <th>3.2.3.12011</th>
                    <th>4.77 MB</th>
                    <th><a href="/storage/clover@3.2.3.exe"><button type="button" class="btn btn-primary" title="Descarga directa" data-toggle="tooltip">
                        <span class="glyphicon glyphicon-download-alt"></span> 
                        </button></a>
                        <a href="http://en.ejie.me/"  target="_blank"><button type="button" class="btn btn-success" title="Decarga de pagina web externa" data-toggle="tooltip">
                    <span class="glyphicon glyphicon-download-alt"></span> 
                    </button> </a></th>
                    </tr>
                    <!-- -->
                    <tr>
                    <th>3</th>
                    <th><img src="{{ asset('img/foxit.jpg') }} " style="width: 30px"></th>
                    <th>Foxit Reader</th>
                    <th>8.2.0.2051</th>
                    <th>77.6 MB</th>
                    <th><a href="/storage/FoxitReader82_prom_L10N_Setup.exe"><button type="button" class="btn btn-primary" data-toggle="tooltip" title="Descarga directa">
                        <span class="glyphicon glyphicon-download-alt"></span> 
                        </button></a>
                        <a href="https://www.foxitsoftware.com/es-la/pdf-reader/"  target="_blank"><button type="button" class="btn btn-success" title="Decarga de pagina web externa" data-toggle="tooltip">
                    <span class="glyphicon glyphicon-download-alt"></span> 
                    </button> </a>
                        </th>
                    </tr>
                     <!-- -->
                    <tr>
                    <th>4</th>
                    <th><img src="{{ asset('img/greenshot.png') }} " style="width: 30px"></th>
                    <th>Greenshot</th>
                    <th>1.2.8.14</th>
                    <th>1.31 MB</th>
                    <th><a href="/storage/Greenshot-INSTALLER-1.2.8.14-RELEASE.exe"><button type="button" class="btn btn-primary" data-toggle="tooltip" title="Descarga directa">
                        <span class="glyphicon glyphicon-download-alt"></span> 
                        </button></a> <a href="http://getgreenshot.org/downloads/"  target="_blank"><button type="button" class="btn btn-success" title="Decarga de pagina web externa" data-toggle="tooltip">
                    <span class="glyphicon glyphicon-download-alt"></span> 
                    </button> </a></th>
                    </tr>
                    <!-- -->
                    <tr>
                    <th>5</th>
                    <th><img src="{{ asset('img/jitsi.svg') }} " style="width: 30px"></th>
                    <th>Jitsi </th>
                    <th>2.8.5425</th>
                    <th>52.9 MB</th>
                   <th><a href="/storage/jitsi-2.8.5426-x86.exe"><button type="button" class="btn btn-primary" title="Descarga directa" data-toggle="tooltip">
                        <span class="glyphicon glyphicon-download-alt"></span> 
                        </button></a> <a href="https://download.jitsi.org/jitsi/windows/jitsi-latest-x86.exe"  target="_blank"><button type="button" class="btn btn-success" title="Decarga de pagina web externa" data-toggle="tooltip">
                    <span class="glyphicon glyphicon-download-alt"></span> 
                    </button> </a></th>
                    </tr>
                    <!-- -->
                    <tr>
                    <th>6</th>
                    <th><img src="{{ asset('img/k-lite.png') }} " style="width: 30px"></th>
                    <th>K-Lite</th>
                    <th>12.3.0</th>
                    <th>39.8 MB</th>
                    <th><a href="/storage/K-Lite_Codec_Pack_1230_Mega.exe"><button type="button" class="btn btn-primary" data-toggle="tooltip" title="Descarga directa">
                        <span class="glyphicon glyphicon-download-alt"></span> 
                        </button></a> <a href="http://files2.codecguide.com/K-Lite_Codec_Pack_1340_Mega.exe"  target="_blank"><button type="button" class="btn btn-success" title="Decarga de pagina web externa" data-toggle="tooltip">
                    <span class="glyphicon glyphicon-download-alt"></span> 
                    </button> </a></th>
                    </tr>
                    <!-- -->
                    <tr>
                    <th>7</th>
                    <th><img src="{{ asset('img/slack.png') }} " style="width: 30px"></th>
                    <th>Slack</th>
                    <th>2.3.3</th>
                    <th>72.7 MB</th>
                   <th><a href="/storage/SlackSetup  2.3.3.exe"><button type="button" class="btn btn-primary" title="Descarga directa" data-toggle="tooltip">
                        <span class="glyphicon glyphicon-download-alt"></span> 
                        </button></a> <a href="https://slack.com/downloads/windows"  target="_blank"><button type="button" class="btn btn-success" title="Decarga de pagina web externa" data-toggle="tooltip" >
                    <span class="glyphicon glyphicon-download-alt"></span> 
                    </button> </a></th>
                    </tr>
                    <!-- -->
                    <tr>
                    <th>8</th>
                    <th><img src="{{ asset('img/visor-fotos.png') }} " style="width: 30px"></th>
                    <th>Visor de fotos win 10</th>
                    <th></th>
                    <th>1.04 KB</th>
                    <th><a href="/storage/Visor de fotos Restaurar en win 10.reg"><button type="button" class="btn btn-primary" data-toggle="tooltip" title="Descarga directa">
                        <span class="glyphicon glyphicon-download-alt"></span> 
                        </button></a> <a href="http://www.mediafire.com/file/8zncnotjbltgc2h/Visor+de+fotos+Restaurar+en+win+10.reg"  target="_blank"><button type="button" class="btn btn-success" title="Decarga de pagina web externa" data-toggle="tooltip" >
                    <span class="glyphicon glyphicon-download-alt"></span> 
                    </button> </a></th>
                    </tr>
                    <!-- -->
                    <tr>
                    <th>9</th>
                    <th><img src="{{ asset('img/volume2.png') }} " style="width: 30px"></th>
                    <th>Volume2</th>
                    <th>1.1.3.247</th>
                    <th>7.66 MB</th>
                    <th><a href="/storage/Volume2_1_1_3_247.exe"><button type="button" class="btn btn-primary" title="Descarga directa" data-toggle="tooltip">
                        <span class="glyphicon glyphicon-download-alt"></span> 
                        </button></a> <a href="http://www.mediafire.com/file/8l7nqde4xdtda1e/Volume2_1_1_3_247.exe"  target="_blank"><button type="button" class="btn btn-success" title="Decarga de pagina web externa" data-toggle="tooltip">
                    <span class="glyphicon glyphicon-download-alt"></span> 
                    </button> </a></th>
                    </tr>
                    <!-- -->
                    <tr>
                    <th>10</th>
                    <th><img src="{{ asset('img/winrar.png') }} " style="width: 30px"></th>
                    <th>Winrar</th>
                    <th>5.1.1</th>
                    <th>1.74 MB</th>
                    <th><a href="/storage/winrar5.1.1 es.exe"><button type="button" class="btn btn-primary" title="Descarga directa" data-toggle="tooltip">
                        <span class="glyphicon glyphicon-download-alt"></span> 
                        </button></a> <a href="http://www.winrar.es/descargas/103sirve"  target="_blank"><button type="button" class="btn btn-success" title="Decarga de pagina web externa" data-toggle="tooltip">
                    <span class="glyphicon glyphicon-download-alt"></span> 
                    </button> </a></th>
                    </tr>
                    <!-- -->
                    <tr>
                    <th>11</th>
                    <th><img src="{{ asset('img/wps.svg') }} " style="width: 30px"></th>
                    <th>WPS Office</th>
                    <th>10.1.0.5795</th>
                    <th>85.0 MB</th>
                    <th><a href="/storage/wps_office_free_10.1.0.5795.exe"><button type="button" title="Descarga directa" class="btn btn-primary" data-toggle="tooltip">
                        <span class="glyphicon glyphicon-download-alt"></span> 
                        </button></a> <a href="https://www.wps.com/download"  target="_blank"><button type="button" class="btn btn-success" title="Decarga de pagina web externa" data-toggle="tooltip">
                    <span class="glyphicon glyphicon-download-alt"></span> 
                    </button> </a></th>
                    </tr>
                    <!-- -->
                    <tr>
                    <th>12</th>
                    <th><img src="{{ asset('img/Zoiper.png') }} " style="width: 30px"></th>
                    <th>Zoiper</th>
                    <th>3.15.0.0</th>
                    <th>17.8 MB</th>
                    <th><a href="/storage/Zoiper_Free_3.15_Setup.exe"><button type="button" title="Descarga directa" class="btn btn-primary" data-toggle="tooltip">
                        <span class="glyphicon glyphicon-download-alt"></span> 
                        </button></a> <a href="https://www.zoiper.com/en/voip-softphone/download/zoiper3"  target="_blank"><button type="button" class="btn btn-success" title="Decarga de pagina web externa" data-toggle="tooltip">
                    <span class="glyphicon glyphicon-download-alt"></span> 
                    </button> </a></th>
                    </tr>
                </tbody>
                
            </table>
        </div>
    </div>
</div>



    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
