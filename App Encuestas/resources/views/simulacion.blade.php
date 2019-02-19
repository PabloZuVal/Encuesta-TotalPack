@extends('layouts.app')
@section('content')
    {{--------------------------------------------------- SIMULACION DE ENCUESTA -----------------------------------------------}}
    <h1 class="display-4" align="center">Simulacion de encuestas</h1><br>
    
    <ol>
        @foreach ($encuestas as $encuesta)
            @if ($encuesta->Activado == true)
                <li><a href="{{-- --}}"> {{-- Aca va la ruta de la encuesta a resolver (Paginas o preguntas basicas) --}}
                    {{$encuesta->nombre_cli}}
                </a></li><br>
            @endif
        @endforeach
    </ol>
   
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

@endsection