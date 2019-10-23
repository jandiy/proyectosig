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
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <img src="{{Storage::Url('upload/'.$ayudante->foto) }}" alt="{{$ayudante->foto}}" height="150vh" width="150vh" class="img-thumbnail">
                    
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            
        </div>
        
    </div>
</div>
@endsection