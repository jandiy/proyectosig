@extends('layouts.admin')

@section('content')
<div class="container-fluid" style="max-width:1100px;margin:0 auto;padding:10px;background-color:white;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Mi Perfil</h2>
            </div>
           
        </div>
    </div>
    <div class="row">
    @foreach ($webs as $key => $web)
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Nombre:</strong>
                <input type="text" placeholder="{{$web->name}}" class="form-control" disabled/>

            </div>
            <div class="form-group">
                <strong>Apellido:</strong>
                <input type="text" placeholder="{{$web->apellido}}" class="form-control" disabled/>
            </div>
            <div class="form-group">
                <strong>Fecha Nacimiento:</strong>
                <input type="text" placeholder="{{$web->fecha_nacimiento}}" class="form-control" disabled/>

            </div>
            <div class="form-group">
                <strong>Genero:</strong>
                <input type="text" placeholder="{{$web->genero}}" class="form-control" disabled/>
            </div>
            <div class="form-group">
                <strong>Correo:</strong>
                <input type="text" placeholder="{{$web->email}}" class="form-control" disabled/>
            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                <div class="form-group">
                      <img src="{{Storage::Url('upload/'.$web->foto) }}" alt="{{$web->foto}}" height="250vh" width="250vh" class="img-thumbnail">
                </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
          <a class="btn btn-primary"  href="" data-target="#modal-contrasena-{{$web->id}}" data-toggle="modal">
           Cambiar contrasena
          </a>
          <a class="btn btn-primary" href="{{ route('perfiles.edit') }}">
                Editar Perfil
         </a>
        </div>
        @include('perfiles.editar')
      @endforeach  
      
    </div>
</div>
@endsection