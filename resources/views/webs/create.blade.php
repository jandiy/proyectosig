@extends('layouts.admin')

@section('content')
<div class="container-fluid" style="max-width:1100px;margin:0 auto;padding:10px;background-color:white;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Registrar</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('webs.index') }}"> Atras</a>
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
    {!! Form::open(array('route' => 'webs.store','method'=>'POST','files'=>'true')) !!}
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
            <div class="form-group">
                 

            </div>
         </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Nombre','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Apellido:</strong>
                {!! Form::text('apellido', null, array('placeholder' => 'Apellido','class' => 'form-control')) !!}
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
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Correo:</strong>
                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Contrasena:</strong>
                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
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