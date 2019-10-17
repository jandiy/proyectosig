@extends('layouts.admin')

@section('content')
<div class="container-fluid" style="max-width:1100px;margin:0 auto;padding:10px;background-color:white;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Registrar</h2>
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
    {!! Form::open(array('route' => 'ayudantes.store','method'=>'POST','files'=>'true')) !!}
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
        <?php

            $map="'map'";

            echo '<script> 
                    var map;';
            echo  'var m={lat:-17.776209, lng: -63.194962};
            
                function initMap() {
                map = new google.maps.Map(document.getElementById( ';
                echo $map;
            echo '), {
                center: m,
                zoom: 14
                });';

            echo 'var marker = new google.maps.Marker({position: m, map: map});}';
			echo "</script>";

        ?>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAofod0Bp0frLcLHVLxuacn0QBXqVyJ7lc&callback=initMap"></script>
			
        <input type="hidden" id="latitud" name="latitud" >
        <input type="hidden" id="longitud" name="longitud">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                {!! Form::text('nombre', null, array('placeholder' => 'nombre','class' => 'form-control')) !!}
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