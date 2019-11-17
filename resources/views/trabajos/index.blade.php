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
            <th width="380px">Direccion</th>
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
                echo  'var latitude = parseFloat(document.getElementById("latitud'.$nro.'").value);';
                echo  'var longitude = parseFloat(document.getElementById("longitud'.$nro.'").value);';
                echo 'console.log(latitude);';
                echo 'var api_url = "https://api.opencagedata.com/geocode/v1/json";';
                echo 'var request_url = api_url
                        + "?"
                        + "key=" + apikey
                        + "&q=" + encodeURIComponent(latitude + "," + longitude)
                        + "&pretty=1"
                        + "&no_annotations=1";';
                echo 'console.log(request_url);';
                echo 'var request = new XMLHttpRequest();';
                echo 'request.open("GET", request_url, true);';
                echo 'request.onload = function() {';
                    // see full list of possible response codes:
                    // https://opencagedata.com/api#codes

                echo 'if (request.status == 200){';
                    // Success!
                echo  'var data = JSON.parse(request.responseText);';
                echo  'document.getElementById("direccion'.$nro.'").value=data.results[0].formatted;';
                echo  '} else if (request.status <= 500){'; 
                // We reached our target server, but it returned an error
                                    
                echo  'console.log("unable to geocode! Response code: " + request.status);';
                echo  'var data = JSON.parse(request.responseText);';
                echo  'console.log(data.status.message);';
                
                echo  '} else {';
                echo 'console.log("server error");';
                echo '}';
                echo '};';
                echo 'request.onerror = function() {';
                    // There was a connection error of some sort
                echo 'console.log("unable to connect to server");';        
                echo '};';

                echo 'request.send();';  // make the request
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
@section('script')
<script>
/*window.onload = function(){
                    var cont1=1;
                    var yea=document.getElementById("example").rows.length;
                   
                    var paso;
                    var apikey = '5ac6a5f7d15b47b8a380b98684ae1885';
                    var api_url = 'https://api.opencagedata.com/geocode/v1/json';
                    alert(yea);
                for (paso=0;paso<((yea*1)-1);paso++){
                    alert(paso);
                    var latitude = parseFloat(document.getElementById("latitud"+cont1.toString()).value);
                    var longitude = parseFloat(document.getElementById("longitud"+cont1.toString()).value);
                    alert(latitude);
                    var request_url = api_url
                        + '?'
                        + 'key=' + apikey
                        + '&q=' + encodeURIComponent(latitude + ',' + longitude)
                        + '&pretty=1'
                        + '&no_annotations=1';

                    // see full list of required and optional parameters:
                    // https://opencagedata.com/api#forward
                    alert(request_url);
                    var request = new XMLHttpRequest();
                    request.open('GET', request_url, true);

                    request.onload = function() {
                        // see full list of possible response codes:
                        // https://opencagedata.com/api#codes

                        if (request.status == 200){ 
                        // Success!
                        var data = JSON.parse(request.responseText);
                        document.getElementById("direccion"+cont1.toString()).value=data.results[0].formatted;
                        alert(data.results[0].formatted);
                        
                       // alert(data.results[0].formatted);

                        } else if (request.status <= 500){ 
                        // We reached our target server, but it returned an error
                                            
                        console.log("unable to geocode! Response code: " + request.status);
                        var data = JSON.parse(request.responseText);
                        console.log(data.status.message);
                        alert(data.status.message);
                        } else {
                        console.log("server error");
                        }
                    };

                    request.onerror = function() {
                        // There was a connection error of some sort
                        console.log("unable to connect to server");        
                    };

                    request.send();  // make the request
                    request.close();
                    cont1=(cont1*1)+1;
                }
  }*/                                           
</script>
@endsection