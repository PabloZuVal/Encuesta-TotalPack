@extends('layouts.app')
@section('content')
    
    <h1 class="display-4" align="center">{{$pregunta->pregunta}}</h1>
    
    <div class="container">
        
        <form method="POST" action ={{route('respuestaclasica.store',$pregunta->id_pregunta_clasica)}} class="form-group" > 
            @csrf
            <div class="form-group">
                <label for="formGroupExampleInput">Ingrese su respuesta : </label>
                <input type="text" class="form-control" name="respuesta_new" id="formGroupExampleInput" placeholder="Ingrese su respuesta Aqui"required>
            </div>
            {{--IMPORTANTE CAMPO "TYPE=SUBMIT" PARA EL CREATE--}}
            <button class="btn btn-success btn-sm" type="submit" name="createButton" >Responder</button><br>
            &nbsp
        </form>
    </div>
    
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