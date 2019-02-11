@extends('layouts.app')

@section('content')

    <h1 align="center">Encuestas de satisfacción</h1>
    {{--<h3>{{$json_encuestas}}</h3>--}}
    <input type="search" id="search" class="from-control mr-sm-2" placeholder="Busca encuestas acá">
    <div class="tab-content">
        <table class="table table-hover table-striped " id="encuestas">
            <thead>
                <tr>
                    <th with="20px">N°</th>
                    <th with="20px">Nombre cliente</th>
                    <th with="20px">Sucursal</th>
                    <th with="20px">Fecha emision</th>
                    <th with="20px">Encargado cliente</th>
                    <th with="20px">Tecnico</th>
                    <th with="20px">Contacto</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($encuestas as $encuesta)
                <tr>
                    <td>{{ $encuesta->id_encuesta}}</td>
                    <td>{{ $encuesta->nombre_cli}}</td>
                    <td>{{ $encuesta->sucursal}}</td>
                    <td>{{ $encuesta->fecha_emision}}</td>
                    <td>{{ $encuesta->encargado_cli}}</td>
                    <td>{{ $encuesta->tecnico}}</td>
                    <td>{{ $encuesta->contacto}}</td>
                </tr> 
                @endforeach
            </tbody>
        </table>

    </div>
    
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>
   
    {{--
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <script src= "//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>
    --}}
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
    
        console.log('El enlace esta funcionando en la vista');
   
    </script>
    
@endsection