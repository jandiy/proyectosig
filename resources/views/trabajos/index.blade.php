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
        <div class="form-group">
                    
                    {{ Form::open(['route' => ['trabajos.index'], 'method' => 'GET']) }}
                    <strong>Grupo:</strong>
                    <select name="grupo" class="form-control selectpicker"  id="grupo" data-live-search="true">
                    @foreach ($grupos as $key => $grupo)
                        <option value="{{ $grupo->id }}">{{ $grupo->nombre }}</option>
                    @endforeach
                    </select>
                        {{ Form::submit('Search') }}
                    {{ Form::close() }}
        </div>
    </div>
    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
        <tr>            
            <th>Id</th>
            <th>Direccion</th>
            <th>Fecha</th>
            <th>Trabajador</th>
            <th>Estado</th>
            <th width="280px">Accion</th>
        </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        @foreach ($trabajos as $key => $trabajo)
            <tr>
                <td>{{ $trabajo->id }}</td>
                <td>{{ $trabajo->longitudA }}</td>
                <td>{{ $trabajo->fecha }}</td>
                <td>{{ $trabajo->nombre }}&nbsp;{{ $trabajo->apellido }}</td>
                <td>{{ $trabajo->estado}}</td>
                <td>
                    <a class="btn btn-app" style="min-width: 60px;height: 60px"  href="{{ route('ayudantes.show',$trabajo->id) }}"><i class="fa  fa-info"></i>
                        Show
                    </a>
                  
                   
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
