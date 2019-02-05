@extends('layouts.app')
@section('content')
    {{--------------------------------------------------- Vista de prueba - editar pregunta -----------------------------------------------}}
    <h1 align="center">Editar Pregunta para {{$encuestaa->nombre_cli}}</h1>
    
    <div class="container">
        
        <form method="POST" action ={{route('pregunta.update',$encuestaa->id_encuesta)}} class="form-group" > {{--Por trabajar--}}
            @csrf
            {!! method_field('PUT') !!}

            <div class="form-group">
                <label for="formGroupExampleInput">Ingrese Nueva pregunta : </label>
                <input type="text" class="form-control" name="pregunta_edit" id="formGroupExampleInput" placeholder="Ingrese Aqui">
            </div>
        
            {{--IMPORTANTE CAMPO "TYPE=SUBMIT" PARA EL CREATE--}}
            <button class="btn btn-success btn-sm" type="submit" name="createButton" >Editar Pregunta</button>
        </form>

    </div>

    <a class="btn btn-secondary btn-sm" href="{{ route('pregunta.gestor',$encuestaa->id_encuesta) }}" role="button">Atras</a>
    
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

@endsection