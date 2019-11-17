@extends('layouts.admin')

@section('content')
<div class="container-fluid" style="max-width:1100px;margin:0 auto;padding:10px;background-color:white;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>Visualizar trabajo</h1>
            </div>
            <div class="pull-right">

                
               
            </div>
        </div>
    </div>
     
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                    
                    {{ Form::open(['route' => ['trabajos.index'], 'method' => 'GET']) }}
                    <strong>Grupo:</strong>
                    <select name="grupo" class="form-control selectpicker"  id="grupo" data-live-search="true">
                    @foreach ($grupos as $key => $grupo)
                        <option value="{{ $grupo->id }}">{{ $grupo->nombre }}</option>
                    @endforeach
                    </select>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                    <button type="submit" class="btn btn-primary">Ok</button>
                    {{ Form::close() }}
            </div>
        </div>
    </div>
    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
        <tr>            
            <th>Id</th>
            <th>Direccion</th>
            <th>Fecha</th>
            <th>Trabajador</th>
            <th>Estado</th>
            <th width="280px">Accion</th>
        </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        <?php 
            echo $nro=0;
        ?>
        @foreach ($trabajos as $key => $trabajo)
            <tr>
                <td>{{ $trabajo->id }}</td>
                <td><input type="text" id="direccion" value="" class="form-control" disabled>
                <?php 
                $nro=$nro + 1;
                echo '<input type="hidden" id="longitud'.$nro.'" value='.$trabajo->longitud.'">';
                echo '<input type="hidden" id="latitud'.$nro.'" value="'.$trabajo->latitud.'">';
                ?>
                </td>
                
                <td>{{ $trabajo->fecha }}</td>
                <td>{{ $trabajo->nombre }}&nbsp;{{ $trabajo->apellido }}</td>
                <td>{{ $trabajo->estado}}</td>
                <td>
                    <a class="btn btn-app" style="min-width: 60px;height: 60px"  href="{{ route('ayudantes.show',$trabajo->id) }}"><i class="fa  fa-info"></i>
                        Show
                    </a>
                  
                   
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
@section('script')
<script>
window.onload = function(){
                    var cont1=1;
                    var apikey = '5ac6a5f7d15b47b8a380b98684ae1885';
                    var latitude = parseFloat(document.getElementById("latitud"+cont1).value);
                    var longitude = parseFloat(document.getElementById("longitud"+cont1).value);
                    cont1++;
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
  }                                              
</script>
@endsection