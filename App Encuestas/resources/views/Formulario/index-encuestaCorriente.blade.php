@extends('layouts.app')
@section('content')

    {{--------------------------------------------------- SIMULACION DE ENCUESTA -----------------------------------------------}}
    <h1 class="display-4" align="center">Simulacion de encuestas - Comun</h1><br>
    &nbsp
    <h3></h3>
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

@endsection