@extends('layouts.app')
@section('content')
    
    <h1 align="center">Editar Seccion</h1>
    
    <div class="container">
        
        <form method="POST" action ={{route('secciones.update',$pagina->id_pagina)}} class="form-group"> 
            @csrf
            {!! method_field('PUT') !!} {{--Esto es muy importante--}}

            <div class="form-group">
                <label for="formGroupExampleInput">Ingrese Nueva seccion : </label>
                <input type="text" class="form-control" name="seccion_edit" id="formGroupExampleInput" placeholder="Ingrese Aqui"value="{{$pagina->nombre_seccion}}"required>
            </div>
            {{--IMPORTANTE CAMPO "TYPE=SUBMIT" PARA EL CREATE--}}
            <button class="btn btn-success btn-sm" type="submit" name="createButton" >Editar Seccion</button>  
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