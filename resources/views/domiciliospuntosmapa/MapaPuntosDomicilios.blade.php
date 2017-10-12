@extends('layouts.admin')
@section('titulo')
<h3 class="box-title">Puntos Domicilios </h3>
@endsection
@section('content')
<style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #map {
        height: 80vh;

    }
    /* Optional: Makes the sample page fill the window. */
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
    label{
      font-size: 18px;
    }
    a:active {
    color: red;
    } 
</style>

  <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Ciudades Disponibles
    <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
      <li role="presentation"><a role="menuitem" tabindex="-1" href="" onclick="bogota();">Bogotá</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="" onclick="cali();">Cali</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="" onclick="barranquilla();">Barranquilla</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="" onclick="medellin();">Medellin</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="" onclick="villavicencio();">Villavicencio</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="" onclick="cum_soacha();">Cum Soacha</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="" onclick="cartagena();">Cartagena</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="" onclick="sta_marta();">Sta Marta</a></li>
    </ul>
  </div>
<br>
  
<div id="map"></div>

<!-- Bogota -->
<script>
function bogota() {
        var map= {
        center:new google.maps.LatLng(4.710988599999999,- 74.072092),
        zoom:11,
        mapTypeId: 'terrain'
        };
        var map = new google.maps.Map(document.getElementById("map"),map);
        @foreach($bogota as $p )
            var icon = {
            url: "{{ asset('img/ypoint.png') }}", // url
                    scaledSize: new google.maps.Size(20,20), // scaled size
            };
        var marker = new google.maps.Marker({
                position: {
                lat: {{$p -> lat}},
                lng: {{$p -> long}},
            },
                icon: icon,
                map: map,
                
            });
        google.maps.event.addListener(marker,'click', function() {
         
         var infowindow = new google.maps.InfoWindow({
           
           content: "<b>Nombre:</b> {{preg_replace('[\n|\r|\n\r]', ' ' , $p->nombre)}} <br> <b>Empresa:</b> {{preg_replace('[\n|\r|\n\r]', ' ' , $p->empresa)}} <br> <b>Direccion:</b> {{preg_replace('[\n|\r|\n\r]', ' ' , $p->direccion)}}",
            });              
        infowindow.open(map, this);
          });
        @endforeach
        event.preventDefault();
        }

    function cali() {
        var map= {
        center:new google.maps.LatLng(3.452637, -76.532877),
        zoom:11,
        mapTypeId: 'terrain'
        };
        var map = new google.maps.Map(document.getElementById("map"),map);
        var marker, i;
        
        @foreach($cali as $p)
            var icon = {
            url: "{{ asset('img/ypoint.png') }}", // url
                    scaledSize: new google.maps.Size(20,20), // scaled size
            };
        var marker = new google.maps.Marker({
                position: {
                lat: {{$p -> lat}},
                lng: {{$p -> long}},
            },
                icon: icon,
                map: map,
                
            });
        google.maps.event.addListener(marker,'click',function() {
        var infowindow = new google.maps.InfoWindow({
          content: "<b>Nombre:</b> {{preg_replace('[\n|\r|\n\r]', ' ' , $p->nombre)}} <br> <b>Empresa:</b> {{preg_replace('[\n|\r|\n\r]', ' ' , $p->empresa)}} <br> <b>Direccion:</b> {{preg_replace('[\n|\r|\n\r]', ' ' , $p->direccion)}}",
            });
          infowindow.open(map,this);
          });
        @endforeach
        event.preventDefault();
        }

    function barranquilla() {
        var map= {
        center:new google.maps.LatLng(11.004025, -74.809437),
        zoom:11,
        mapTypeId: 'terrain'
        };
        var map = new google.maps.Map(document.getElementById("map"),map);
        @foreach($barranquilla as $p)
            var icon = {
            url: "{{ asset('img/ypoint.png') }}", // url
                    scaledSize: new google.maps.Size(20,20), // scaled size
            };
        var marker = new google.maps.Marker({
                position: {
                lat: {{$p -> lat}},
                lng: {{$p -> long}},
            },
                icon: icon,
                map: map,
                
            });
        google.maps.event.addListener(marker,'click',function() {
        var infowindow = new google.maps.InfoWindow({
          content: "<b>Nombre:</b> {{preg_replace('[\n|\r|\n\r]', ' ' , $p->nombre)}} <br> <b>Empresa:</b> {{preg_replace('[\n|\r|\n\r]', ' ' , $p->empresa)}} <br> <b>Direccion:</b> {{preg_replace('[\n|\r|\n\r]', ' ' , $p->direccion)}}",
            });
          infowindow.open(map,this);
          });
        @endforeach
        event.preventDefault();
        }

        function medellin() {
        var map= {
        center:new google.maps.LatLng(6.252633, -75.564466),
        zoom:11,
        mapTypeId: 'terrain'
        };
        var map = new google.maps.Map(document.getElementById("map"),map);
        @foreach($medellin as $pm)
            var icon = {
            url: "{{ asset('img/ypoint.png') }}", // url
                    scaledSize: new google.maps.Size(20,20), // scaled size
            };
        var marker = new google.maps.Marker({
                position: {
                lat: {{$pm -> lat}},
                lng: {{$pm -> long}},
            },
                icon: icon,
                map: map,
                
            });
        google.maps.event.addListener(marker,'click',function() {
        var infowindow = new google.maps.InfoWindow({
          content: "<b>Nombre:</b> {{preg_replace('[\n|\r|\n\r]', ' ' , $p->nombre)}} <br> <b>Empresa:</b> {{preg_replace('[\n|\r|\n\r]', ' ' , $p->empresa)}} <br> <b>Direccion:</b> {{preg_replace('[\n|\r|\n\r]', ' ' , $p->direccion)}}",
            });
          infowindow.open(map,this);
          });
        @endforeach
        event.preventDefault();
        }

    function villavicencio() {
        var map= {
        center:new google.maps.LatLng(4.151466, -73.636183),
        zoom:11,
        mapTypeId: 'terrain'
        };
        var map=new google.maps.Map(document.getElementById("map"),map);
        @foreach($villavicencio as $p)
            var icon = {
            url: "{{ asset('img/ypoint.png') }}", // url
                    scaledSize: new google.maps.Size(20,20), // scaled size
            };
        var marker = new google.maps.Marker({
                position: {
                lat: {{$p -> lat}},
                lng: {{$p -> long}},
            },
                icon: icon,
                map: map,
                
            });
        google.maps.event.addListener(marker,'click',function() {
        var infowindow = new google.maps.InfoWindow({
         content: "<b>Nombre:</b> {{preg_replace('[\n|\r|\n\r]', ' ' , $p->nombre)}} <br> <b>Empresa:</b> {{preg_replace('[\n|\r|\n\r]', ' ' , $p->empresa)}} <br> <b>Direccion:</b> {{preg_replace('[\n|\r|\n\r]', ' ' , $p->direccion)}}",
            });
          infowindow.open(map,this);
          });
        @endforeach
        event.preventDefault();
        }

    function cum_soacha() {
        var map= {
        center:new google.maps.LatLng(4.57549,-74.2312017),
        zoom:13,
        mapTypeId: 'terrain'
        };
        var map=new google.maps.Map(document.getElementById("map"),map);
        @foreach($cum_soacha as $p)
            var icon = {
            url: "{{ asset('img/ypoint.png') }}", // url
                    scaledSize: new google.maps.Size(20,20), // scaled size
            };
        var marker = new google.maps.Marker({
                position: {
                lat: {{$p -> lat}},
                lng: {{$p -> long}},
            },
                icon: icon,
                map: map,
                
            });
        google.maps.event.addListener(marker,'click',function() {
        var infowindow = new google.maps.InfoWindow({
          content: "<b>Nombre:</b> {{preg_replace('[\n|\r|\n\r]', ' ' , $p->nombre)}} <br> <b>Empresa:</b> {{preg_replace('[\n|\r|\n\r]', ' ' , $p->empresa)}} <br> <b>Direccion:</b> {{preg_replace('[\n|\r|\n\r]', ' ' , $p->direccion)}}",
            });
          infowindow.open(map,this);
          });
        @endforeach
        event.preventDefault();
        }

    function cartagena() {
        var map= {
        center:new google.maps.LatLng(10.391417, -75.476254),
        zoom:11,
        mapTypeId: 'terrain'
        };
        var map=new google.maps.Map(document.getElementById("map"),map);
        @foreach($cartagena as $p)
            var icon = {
            url: "{{ asset('img/ypoint.png') }}", // url
                    scaledSize: new google.maps.Size(20,20), // scaled size
            };
        var marker = new google.maps.Marker({
                position: {
                lat: {{$p -> lat}},
                lng: {{$p -> long}},
            },
                icon: icon,
                map: map,
                
            });
        google.maps.event.addListener(marker,'click',function() {
        var infowindow = new google.maps.InfoWindow({
          content: "<b>Nombre:</b> {{preg_replace('[\n|\r|\n\r]', ' ' , $p->nombre)}} <br> <b>Empresa:</b> {{preg_replace('[\n|\r|\n\r]', ' ' , $p->empresa)}} <br> <b>Direccion:</b> {{preg_replace('[\n|\r|\n\r]', ' ' , $p->direccion)}}",
            });
          infowindow.open(map,this);
          });
        @endforeach
        event.preventDefault();
        }

    function sta_marta() {
        var map= {
        center:new google.maps.LatLng(11.2315668,-74.1999066),
        zoom:13,
        mapTypeId: 'terrain'
        };
        var map=new google.maps.Map(document.getElementById("map"),map);
        @foreach($sta_marta as $p)
            var icon = {
            url: "{{ asset('img/ypoint.png') }}", // url
                    scaledSize: new google.maps.Size(20,20), // scaled size
            };
        var marker = new google.maps.Marker({
                position: {
                lat: {{$p -> lat}},
                lng: {{$p -> long}},
            },
                icon: icon,
                map: map,
                
            });
        google.maps.event.addListener(marker,'click',function() {
        var infowindow = new google.maps.InfoWindow({
          content: "<b>Nombre:</b> {{preg_replace('[\n|\r|\n\r]', ' ' , $p->nombre)}} <br> <b>Empresa:</b> {{preg_replace('[\n|\r|\n\r]', ' ' , $p->empresa)}} <br> <b>Direccion:</b> {{preg_replace('[\n|\r|\n\r]', ' ' , $p->direccion)}}",
            });
          infowindow.open(map,this);
          });
        @endforeach
        event.preventDefault();
        }
</script>


<!--  api de google maps-->
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDONz_SC-y9biqWqhtxpLvzmChJnDobm5E&callback=bogota">
</script>

@endsection
