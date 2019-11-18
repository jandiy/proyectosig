@extends('layouts.admin')

@section('content')
<div class="container-fluid" style="max-width:1100px;margin:0 auto;padding:10px;background-color:white;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Detalle trabajo</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('trabajos.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div id="map" style="width:100%;height:400px;"></div>
            </div>
            <?php
                $map="'map'";

                echo '<script>';
                       

                echo  'var m={lat:'.$trabajo->latituda.', lng: '.$trabajo->longituda.'}';
                echo  'var m2={lat: parseFloat(document.getElementById("latitud").value), lng: parseFloat(document.getElementById("longitud").value)}';
                echo 'function initMap(){';
                echo 'var mapProp = {
                            center: m,

                            zoom: 10,
                            mapTypeId: google.maps.MapTypeId.TERRAIN
                        };';
                echo 'var map = new google.maps.Map(document.getElementById("map"),mapProp);';
                echo 'var flightPlanCoordinates = [
                    m,
                    m2
                  ];';
                   
                  // Información de la ruta (coordenadas, color de línea, etc...)
                echo 'var flightPath = new google.maps.Polyline({
                    path: flightPlanCoordinates,
                    geodesic: true,
                    strokeColor: "#FF0000",
                    strokeOpacity: 1.0,
                    strokeWeight: 2
                  });';
                   
                  // Creando la ruta en el mapa
                echo 'flightPath.setMap(map);
                  }';
                    
                  // Inicializando el mapa cuando se carga la página
                echo 'google.maps.event.addDomListener(window, "load", initialize);';
                
                echo "</script>";
                ?>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAofod0Bp0frLcLHVLxuacn0QBXqVyJ7lc&callback=initMap"
                async defer></script>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            @foreach($ayudante as $key=>$a)
                <strong>Trabajador:</strong>
                {{ $a->nombre }}&nbsp;{{ $a->apellido }}&nbsp;&nbsp;<a class="btn btn-primary" href="{{ route('ayudantes.show',$a->id) }}">Ver Perfil</a>
            
            @endforeach
            </div>
            <div class="form-group">
            @foreach($estudiante as $key=>$e)
                <strong>Estudiante:</strong>
                {{ $e->nombre }}&nbsp;{{ $e->apellido }}&nbsp;&nbsp;<a class="btn btn-primary" href="{{ route('estudiantes.show',$e->id) }}">Ver Perfil</a>
            
            @endforeach
            </div>
            <div class="form-group">
                <strong>Direccion:</strong>
                
                @foreach($direccion as $key=>$d)
                <input type="text" id="direccion" value="" class="form-control" disabled>
                <input type="text" id="longitud" value="{{$d->longitud}}">
                <input type="text" id="latitud" value="{{$d->latitud}}">
                <script>
                    var apikey = '5ac6a5f7d15b47b8a380b98684ae1885';
                    var latitude = parseFloat(document.getElementById("latitud").value);
                    var longitude = parseFloat(document.getElementById("longitud").value);
                   
                    var api_url = 'https://api.opencagedata.com/geocode/v1/json'

                    var request_url = api_url
                        + '?'
                        + 'key=' + apikey
                        + '&q=' + encodeURIComponent(latitude + ',' + longitude)
                        + '&pretty=1'
                        + '&no_annotations=1';

                    // see full list of required and optional parameters:
                    // https://opencagedata.com/api#forward

                    var request = new XMLHttpRequest();
                    request.open('GET', request_url, true);

                    request.onload = function() {
                        // see full list of possible response codes:
                        // https://opencagedata.com/api#codes

                        if (request.status == 200){ 
                        // Success!
                        var data = JSON.parse(request.responseText);
                        document.getElementById("direccion").value=data.results[0].formatted;
                       // alert(data.results[0].formatted);

                        } else if (request.status <= 500){ 
                        // We reached our target server, but it returned an error
                                            
                        console.log("unable to geocode! Response code: " + request.status);
                        var data = JSON.parse(request.responseText);
                        console.log(data.status.message);
                        } else {
                        console.log("server error");
                        }
                    };

                    request.onerror = function() {
                        // There was a connection error of some sort
                        console.log("unable to connect to server");        
                    };

                    request.send();  // make the request
                                                
                    </script>
                @endforeach
            </div>
            <div class="form-group">
                <strong>Fecha:</strong>
                {{ $trabajo->fecha }}
            </div>
            <div class="form-group">
                <strong>Hora:</strong>
                {{ $trabajo->hora }}
            </div>
            <div class="form-group">
            @foreach($estado as $key=>$e)
                <strong>Estado:</strong>
                {{ $e->nombre }}
            @endforeach
            </div>
            
            
        </div>

       
        <div class="col-xs-6 col-sm-6 col-md-6">
            
        </div>
        
    </div>
</div>
@endsection