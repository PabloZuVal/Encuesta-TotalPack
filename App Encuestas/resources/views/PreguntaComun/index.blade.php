@extends('layouts.app')
@section('content')
    {{--------------------------------------------------- ENCUESTA CLASICA INDEX -----------------------------------------------}}
    <h1 class="display-4" align="center">Index -Encuesta Clasica</h1><br>
    <h5 align="center">Preguntas</h5>
    
    
   
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

@endsection