@extends('layouts.app')
@section('content')
    
    <h1 align="center">Crear Seccion</h1>
    
    <div class="container">
        
        <form method="POST" action ={{route('secciones.store',$encuestaa->id_encuesta)}} class="form-group"> 
            @csrf
            <div class="form-group">
                <label for="formGroupExampleInput">Ingrese Nueva seccion : </label>
                <input type="text" class="form-control" name="seccion_new" id="formGroupExampleInput" placeholder="Ingrese Aqui"required>
            </div>
            {{--IMPORTANTE CAMPO "TYPE=SUBMIT" PARA EL CREATE--}}
            <button class="btn btn-success btn-sm" type="submit" name="createButton" >Crear Seccion</button>  
        </form>
        &nbsp
    </div>
    
    <a class="btn btn-secondary btn-sm" href="{{ route('secciones.index',$encuestaa->id_encuesta) }}" role="button">Atras</a>
    
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

@endsection