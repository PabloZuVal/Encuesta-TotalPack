@extends('layouts.app')

@section('content')

    <h1 align="center">Encuestas de satisfacción</h1>
    <div class="tab-content">
        <table class="table">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Nombre cliente</th>
                    <th>Fecha emision</th>
                    <th>Encargado cliente</th>
                    <th>Tecnico</th>
                    <th>Contacto</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($encuestas as $encuesta)
                <tr>
                    <th>{{ $encuesta->id_encuesta}}</th>
                    <th>{{ $encuesta->nombre_cli}}</th>
                    <th>{{ $encuesta->fecha_emision}}</th>
                    <th>{{ $encuesta->encargado_cli}}</th>
                    <th>{{ $encuesta->tecnico}}</th>
                    <th>{{ $encuesta->contacto}}</th>
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

@endsection