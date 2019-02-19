@extends('layouts.app')

@section('content')

    <h1 class="display-4" align="center">Detalles</h1>
   
    <ul class="list-group">
        <li class="list-group-item">Cliente : {{ $encuestaa->nombre_cli}}</li>
        <li class="list-group-item">Sucursal: {{ $encuestaa->sucursal}}</li>
        <li class="list-group-item">Fecha de emision : {{$encuestaa->fecha_emision}}</li>
        <li class="list-group-item">Nombre encargado : {{$encuestaa->encargado_cli}}</li>
        <li class="list-group-item">Nombre tecnico : {{$encuestaa->tecnico}}</li>
        <li class="list-group-item">Observaciones : {{$encuestaa->observaciones}}</li>
        <li class="list-group-item">Contacto : {{$encuestaa->contacto}}</li>
    </ul> 

    <a class="btn btn-secondary btn-sm" href="{{ route('encuesta.gestor') }}" role="button">Atras</a>
    
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

@endsection