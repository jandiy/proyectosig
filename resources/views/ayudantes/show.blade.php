@extends('layouts.admin')

@section('content')
<div class="container-fluid" style="max-width:1100px;margin:0 auto;padding:10px;background-color:white;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Detalle Ayudante</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('ayudantes.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Nombre:</strong>
                {{ $ayudante->nombre }}
            </div>
            <div class="form-group">
                <strong>Apellido:</strong>
                {{ $ayudante->apellido }}
            </div>
            <div class="form-group">
                <strong>Fecha Nacimiento:</strong>
                {{ $ayudante->fecha_nacimiento }}
            </div>
            <div class="form-group">
                <strong>Genero:</strong>
                {{ $ayudante->genero }}
            </div>
            <div class="form-group">
                <strong>Correo:</strong>
                {{ $ayudante->correo }}
            </div>
            <div class="form-group">
                <strong>Celular:</strong>
                {{ $ayudante->celular }} 
            </div>
            <div class="form-group">
                <strong>Contacto Emergencia:</strong>
                {{ $ayudante->contacto_emergencia }}
            </div>
            <div class="form-group">
                @foreach($especialidad as $key=>$e)
                <strong>Especialidad:</strong>
                {{$e->nom}} &nbsp;&nbsp;{{ $e->nombre }}
                @endforeach
            </div>
            <div class="form-group">
                @foreach($movil as $key=>$m)
                <strong>Fecha registro:</strong>
                {{ $m->fecha_registro }} 
                @endforeach
            </div>
            <div class="form-group">
                
                
                <input type="hidden" id="longitud" value="{{$ayudante->longitud}}">
                <input type="hidden" id="latitud" value="{{$ayudante->latitud}}">
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


            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
        
            <div class="form-group">
                <img src="{{$ayudante->foto}}" alt="{{$ayudante->foto}}" height="150vh" width="150vh" class="img-thumbnail">
                    
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Direccion:</strong>
                <input type="text" id="direccion" class="form-control" value="" disabled>
            </div>
        </div>
        
    </div>
</div>
@endsection