@extends('layouts.app')
@section('content')
    
    <h1 align="center">Crear Pregunta</h1>
    
    <div class="container">
        
        <form method="POST" action ={{route('pregunta.store',$encuestaa->id_encuesta)}} class="form-group" > 
            @csrf
            <div class="form-group">
                <label for="formGroupExampleInput">Ingrese Nueva pregunta : </label>
                <input type="text" class="form-control" name="pregunta_new" id="formGroupExampleInput" placeholder="Ingrese Aqui">
            </div>
            {{--IMPORTANTE CAMPO "TYPE=SUBMIT" PARA EL CREATE--}}
            <button class="btn btn-success btn-sm" type="submit" name="createButton" >Crear Pregunta</button>
        </form>
    </div>
    
    <a class="btn btn-secondary btn-sm" href="{{ route('pregunta.index',$encuestaa->id_encuesta) }}" role="button">Atras</a>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

@endsection