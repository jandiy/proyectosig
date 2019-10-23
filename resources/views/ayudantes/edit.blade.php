@extends('layouts.admin')

@section('content')
<div class="container-fluid" style="max-width:1100px;margin:0 auto;padding:10px;background-color:white;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('ayudantes.index') }}"> Atras</a>
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::model($ayudante, ['method' => 'PATCH','route' => ['ayudantes.update', $ayudante->id], 'files'=>'true']) !!}
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                   <strong>Foto:</strong>
                  {{  csrf_field() }}
                  <label for="file"></label>
                  <input type="file" name="file" onChange="preview(this)">

            </div>
         </div>
         <div class="col-xs-6 col-sm-6 col-md-6" id="imagenPreview">
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Ubicacion de domicilio:</strong>
               
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div id="map" style="width:100%;height:400px;"></div>
            </div>
            <script>
////////////////////// codigo del MAPA ///////////NO TOCAR
var marker;          //variable del marcador
//coordenadas obtenidas con la geolocalización

//Funcion principal
var coords = {};    //coordenadas obtenidas con la geolocalización

//Funcion principal
initMap = function ()
{
    //usamos la API para geolocalizar el usuario
            coords =  {
                lng: -63.18224981914062,
                lat: -17.782958778663453
            };
            setMapa(coords);  //pasamos las coordenadas al metodo para crear el mapa
}
function setMapa (coords1,coords2 )
{
    //Se crea una nueva instancia del objeto mapa
    var map = new google.maps.Map(document.getElementById('map'),
        {
            zoom: 15,
            center:new google.maps.LatLng(coords.lat,coords.lng),

        });
    //Creamos el marcador en el mapa con sus propiedades
    //para nuestro obetivo tenemos que poner el atributo draggable en true
    //position pondremos las mismas coordenas que obtuvimos en la geolocalización
    marker = new google.maps.Marker({
        map: map,
        draggable: true,
        animation: google.maps.Animation.DROP,
        position: new google.maps.LatLng(coords.lat,coords.lng),
    });
    //agregamos un evento al marcador junto con la funcion callback al igual que el evento dragend que indica
    //cuando el usuario a soltado el marcador
    marker.addListener('click', toggleBounce);
    marker.addListener( 'dragend', function (event)
    {
        //escribimos las coordenadas de la posicion actual del marcador dentro del input #coords
        document.getElementById("latitud").value = this.getPosition().lat();
        document.getElementById("longitud").value = this.getPosition().lng();
      //  document.getElementById("nombre").value = this.getPosition().lng();
    });
}
//callback al hacer clic en el marcador lo que hace es quitar y poner la animacion BOUNCE
function toggleBounce() {
    if (marker.getAnimation() !== null) {
        marker.setAnimation(null);
    } else {
        marker.setAnimation(google.maps.Animation.BOUNCE);
    }
}
//////////////////// codigo del MAPA ///////////NO TOCAR
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAofod0Bp0frLcLHVLxuacn0QBXqVyJ7lc&callback=initMap"
    async defer></script>
        <input type="hidden" id="latitud" name="latitud" >
        <input type="hidden" id="longitud" name="longitud">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                {!! Form::text('nombre', null, array('placeholder' => 'nombre','class' => 'form-control', 'id'=> 'nombre')) !!}
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Apellido:</strong>
                {!! Form::text('apellido', null, array('placeholder' => 'apellido','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Fecha Nacimiento:</strong>
                {!! Form::date('fecha_nacimiento',null, array('class'=> 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                    <strong>Genero:</strong>
                    <select name="genero" class="form-control selectpicker"  id="genero" data-live-search="true">
                    
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
            </div>
        </div>
        
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Celular:</strong>
                {!! Form::text('celular', null, array('placeholder' => 'celular','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Contacto de Emergencia:</strong>
                {!! Form::text('contacto_emergencia', null, array('placeholder' => 'contacto emergencia','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Correo:</strong>
                {!! Form::text('correo', null, array('placeholder' => 'Correo','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Contrasena:</strong>
                {!! Form::password('contrasena', array('placeholder' => 'Contrasena','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Confirmar Contrasena:</strong>
                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                    <strong>Especialidades:</strong>
                    <select name="especialidad" class="form-control selectpicker"  id="especialidad" data-live-search="true">
                    @foreach($especialidades as $key => $g)
                        <option value="{{$g->id}}">{{$g->nombre}} &nbsp;&nbsp;{{$g->espe}}</option>
                    @endforeach
                    </select>
            </div>
        </div>
       
      
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
      
            <button type="submit" class="btn btn-primary">Guardar</button>
 
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection
@section('script')
<script>
    function preview(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function (e){
                $('#imagenPreview').html("<img src='"+e.target.result+"' height='250vh' width='250vh'/>");
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    

 

               
               
</script>
				
@endsection