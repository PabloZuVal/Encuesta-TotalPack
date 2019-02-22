@extends('layouts.app')
@section('content')
    
    <h1 class="display-4" align="center">{{$pregunta->pregunta}}</h1><br>
    
    <div class="container">
        <ul><br>
            <li><h4><strong>Respuesta :  </strong>{{$respuesta->respuesta}}</h4></li>
        </ul>
    </div><br>
        
    <a class="btn btn-secondary btn-sm" href="{{ route('preguntaclasica.index',$encuestaa->id_encuesta) }}" role="button">Atras</a>
    &nbsp
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

@endsection