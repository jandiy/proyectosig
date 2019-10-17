@extends('layouts.admin')

@section('content')
<div class="container-fluid" style="max-width:1100px;margin:0 auto;padding:10px;background-color:white;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>Visualizar Estudiante</h1>
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
        @foreach ($estudiantes as $key => $estudiante)
            <tr>
                <td>{{ $estudiante->id }}</td>
                <td>{{ $estudiante->nombre }}</td>
                <td>{{ $estudiante->apellido }}</td>
                <td>
                    <a class="btn btn-app" style="min-width: 60px;height: 60px"  href="" data-target="#modal-mostrar-{{$estudiante->id}}" data-toggle="modal"><i class="fa  fa-info"></i>
                        Ver
                    </a>
                  
                   
                </td>
            </tr>
            @include('estudiantes.mostrar')
        @endforeach
        </tbody>
    </table>
</div>
@endsection
