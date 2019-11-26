@extends('layouts.admin')

@section('content')
<div class="container-fluid" style="max-width:1100px;margin:0 auto;padding:10px;background-color:white;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Detalle estudiante</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('estudiantes.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Nombre:</strong>
                {{ $estudiante->nombre }}
            </div>
            <div class="form-group">
                <strong>Apellido:</strong>
                {{ $estudiante->apellido }}
            </div>
            <div class="form-group">
                <strong>Fecha Nacimiento:</strong>
                {{ $estudiante->fecha_nacimiento }}
            </div>
            <div class="form-group">
                <strong>Genero:</strong>
                {{ $estudiante->genero }}
            </div>
            <div class="form-group">
                <strong>Correo:</strong>
                {{ $estudiante->correo }}
            </div>
            <div class="form-group">
                <strong>Celular:</strong>
                {{ $estudiante->celular }}
            </div>
            <div class="form-group">
                <strong>Contacto Emergencia:</strong>
                {{ $estudiante->contacto_emergencia }}
            </div>
            @foreach($movil as $key=>$m)
                <div class="form-group">
                    <strong>Facultad:</strong>
                    {{ $m->facultad }}
                </div>
                <div class="form-group">
                    <strong>Carrera:</strong>
                    {{ $m->carrera }}
                </div>
                <div class="form-group">
                    <strong>Fecha registro:</strong>
                    {{ $m->fecha_registro }}
                </div>
            @endforeach
            
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <img src="{{$estudiante->foto}}" alt="{{$estudiante->foto}}" height="150vh" width="150vh" class="img-thumbnail">
                    
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            
        </div>
        
    </div>
</div>
@endsection