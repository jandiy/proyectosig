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
                    <p></p>
                    <button type="submit" class="btn btn-primary">Ok</button>
                    {{ Form::close() }}
            </div>
        </div>
    </div>
    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
        <tr>            
            <th>Id</th>
            <th width="400px">Direccion</th>
            <th>Fecha</th>
            <th>Trabajador</th>
            <th>Estado</th>
            <th width="180px">Accion</th>
        </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        <?php 
            $nro=0;
        ?>
        @foreach ($trabajos as $key => $trabajo)
            <tr>
                <td>{{ $trabajo->id }}</td>
                <td>
                <?php 
                $nro=$nro + 1;
                echo '<input type="text" id="direccion'.$nro.'" value="" class="form-control" disabled>';
                echo '<input type="hidden" id="longitud'.$nro.'" value='.$trabajo->longitud.'">';
                echo '<input type="hidden" id="latitud'.$nro.'" value="'.$trabajo->latitud.'">';
                echo '<input type="hidden" id="nro'.$nro.'" value='.$trabajo->longitud.'">';


                echo '<script>';
                echo  'var apikey = "5ac6a5f7d15b47b8a380b98684ae1885";';
                echo  'var latitude'.$nro.' = parseFloat(document.getElementById("latitud'.$nro.'").value);';
                echo  'var longitude'.$nro.' = parseFloat(document.getElementById("longitud'.$nro.'").value);';
                echo 'console.log(latitude'.$nro.');';
                echo 'var api_url'.$nro.' = "https://api.opencagedata.com/geocode/v1/json";';
                echo 'var request_url'.$nro.' = api_url'.$nro.'
                        + "?"
                        + "key=" + apikey
                        + "&q=" + encodeURIComponent(latitude'.$nro.' + "," + longitude'.$nro.')
                        + "&pretty=1"
                        + "&no_annotations=1";';
                echo 'console.log(request_url'.$nro.');';
                echo 'var request'.$nro.' = new XMLHttpRequest();';
                echo 'request'.$nro.'.open("GET", request_url'.$nro.', true);';
               // echo 'console.log(request_url);';
                echo 'request'.$nro.'.onload = function() {';
                    // see full list of possible response codes:
                    // https://opencagedata.com/api#codes

                echo 'if (request'.$nro.'.status == 200){';
                    // Success!
                echo  'var data'.$nro.' = JSON.parse(request'.$nro.'.responseText);';
                echo  'document.getElementById("direccion'.$nro.'").value=data'.$nro.'.results[0].formatted;';
                echo  '} else if (request'.$nro.'.status <= 500){'; 
                // We reached our target server, but it returned an error
                                    
                echo  'console.log("unable to geocode! Response code: " + request'.$nro.'.status);';
                echo  'var data'.$nro.' = JSON.parse(request'.$nro.'.responseText);';
                echo  'console.log(data'.$nro.'.status.message);';
                
                echo  '} else {';
                echo 'console.log("server error");';
                echo '}';
                echo '};';
                echo 'request'.$nro.'.onerror = function() {';
                    // There was a connection error of some sort
                echo 'console.log("unable to connect to server");';        
                echo '};';

                echo 'request'.$nro.'.send();';  // make the request
                echo '</script>';
                ?>
                
                    
                
                </td>
                
                <td>{{ $trabajo->fecha }}</td>
                <td>{{ $trabajo->nombre }}&nbsp;{{ $trabajo->apellido }}</td>
                <td>{{ $trabajo->estado}}</td>
                <td>
                    <a class="btn btn-app" style="min-width: 60px;height: 60px"  href="{{ route('trabajos.show',$trabajo->id) }}"><i class="fa  fa-info"></i>
                        Show
                    </a>
                  
                   
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection