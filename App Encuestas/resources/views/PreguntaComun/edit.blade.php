@extends('layouts.app')
@section('content')
    {{--------------------------------------------------- editar pregunta -----------------------------------------------}}
    <h1 align="center">Editar Pregunta</h1>
    
    <div class="container">
        
        <form method="POST" action ={{route('preguntaclasica.update',$preguntaC_encuesta->id_pregunta_clasica)}} class="form-group" > 
            @csrf
            {!! method_field('PUT') !!}

            <div class="form-group">
                <label for="formGroupExampleInput">Ingrese Nueva pregunta : </label>
                <input type="text" class="form-control" name="pregunta_edit" id="formGroupExampleInput" value="{{$preguntaC_encuesta->pregunta}}"required>
            </div>

            {{--IMPORTANTE CAMPO "TYPE=SUBMIT" --}}
            <button class="btn btn-success btn-sm" type="submit" name="createButton" >Editar Pregunta</button>
        </form>

    </div>

    <a class="btn btn-secondary btn-sm" href="{{ route('preguntaclasica.index',$encuestaa->id_encuesta) }}" role="button">Atras</a> 
    
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

@endsection