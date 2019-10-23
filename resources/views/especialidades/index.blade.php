@extends('layouts.admin')

@section('content')
<div class="container-fluid" style="max-width:1100px;margin:0 auto;padding:10px;background-color:white;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>Especialidad</h1>
            </div>
            <div class="pull-right">

                <a class="btn btn-app" style="min-width: 60px;height: 60px" href="" data-target="#modal-crear" data-toggle="modal"><i class="fa  fa-user-plus"></i>
                    Registrar
                </a>
            </div>
        </div>
    </div>
    @include('especialidades.create')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
        <tr>            
            <th>Id</th>
            <th>Sspecialidad</th>
            <th>Grupo</th>
            <th width="280px">Accion</th>
        </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        @foreach ($especialidades as $key => $especialidad)
            <tr>
                <td>{{ $especialidad->id }}</td>
                <td>{{ $especialidad->nombre }}</td>
                <td>{{ $especialidad->nom}}</td>
                <td>
                   
                    <a class="btn btn-app"  style="min-width: 60px;height: 60px" href="" data-target="#modal-editar-{{$especialidad->id}}" data-toggle="modal"><i class="fa fa-edit"></i>
                        Editar
                    </a>
                   <a class="btn btn-app"  style="min-width: 60px;height: 60px" href="" data-target="#modal-delete-{{$especialidad->id}}" data-toggle="modal"><i class="fa fa-trash-o"></i>
                        Eliminar
                    </a>
                   
                </td>
            </tr>
            @include('especialidades.modal')
            @include('especialidades.edit')
        @endforeach
        </tbody>
    </table>
</div>
@endsection
