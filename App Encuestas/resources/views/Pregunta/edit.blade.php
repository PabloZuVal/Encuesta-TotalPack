@extends('layouts.app')
@section('content')
    {{--------------------------------------------------- editar pregunta -----------------------------------------------}}
    <h1 class="display-4" align="center">Editar Pregunta</h1>
    
    <div class="container">
        
        <form method="POST" action ={{route('pregunta.update',$pregunta->id_pregunta)}} class="form-group" > {{--Por trabajar--}}
            @csrf
            {!! method_field('PUT') !!}

            <div class="form-group">
                <label for="formGroupExampleInput">Ingrese Nueva pregunta : </label>
                <input type="text" class="form-control" name="pregunta_edit" id="formGroupExampleInput" value="{{$pregunta->pregunta}}"required>
            </div>
            <div class="form-inline">
                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Selecione el nuevo tipo de respuesta :</label>
                <select class="custom-select my-1 mr-sm-2" name="tipo_pregunta" id="respuestaSelect" required="required">
                    <option selected>Seleccione...</option>
                    <option value="CheckBox">checkbox</option>
                    <option id = "Select" name="tipo_pregunta_select" value="Select">select</option>
                    <option value="String">string</option>
                </select><br>
            </div><br>
            {{--IMPORTANTE CAMPO "TYPE=SUBMIT" PARA EL CREATE--}}
            <button class="btn btn-success btn-sm" type="submit" name="createButton" >Editar Pregunta</button>
        </form>

    </div>

    <a class="btn btn-secondary btn-sm" href="{{ route('pregunta.index',$pagina->id_pagina) }}" role="button">Atras</a> 
    
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

@endsection