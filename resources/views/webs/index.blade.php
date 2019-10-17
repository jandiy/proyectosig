@extends('layouts.admin')

@section('content')
<div class="container-fluid" style="max-width:1100px;margin:0 auto;padding:10px;background-color:white;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>Usuario Web</h1>
            </div>
            <div class="pull-right">

                <a class="btn btn-app"  style="min-width: 60px;height: 60px" href="{{ route('webs.create') }}"><i class="fa  fa-user-plus"></i>
                    Registrar
                </a>
               
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
        <tr>            
            <th>Id</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th width="280px">Accion</th>
        </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        @foreach ($webs as $key => $web)
            <tr>
                <td>{{ $web->id }}</td>
                <td>{{ $web->name }}</td>
                <td>{{ $web->apellido }}</td>
                <td>
                    <a class="btn btn-app" style="min-width: 60px;height: 60px"  href="" data-target="#modal-mostrar-{{$web->id}}" data-toggle="modal"><span class="glyphicon glyphicon-eye-open"></span>
                       Ver
                    </a>
                    <a class="btn btn-app"  style="min-width: 60px;height: 60px" href="{{ route('webs.edit',$web->id) }}"><i class="fa fa-edit"></i>
                        Editar
                    </a>
                   <a class="btn btn-app"  style="min-width: 60px;height: 60px" href="" data-target="#modal-delete-{{$web->id}}" data-toggle="modal"><i class="fa fa-trash-o"></i>
                        Eliminar
                    </a>
                   
                </td>
            </tr>
             @include('webs.mostrar')
            @include('webs.modal')
        @endforeach
        </tbody>
    </table>
</div>
@endsection
