@extends('layouts.app')
@section('content')

<h1 align="center" >Editar encuesta de {{ $encuestaa->nombre_cli}}</h1>

<div class="container">
        
        <form method="POST" action ={{route('encuesta.update',$encuestaa->id_encuesta)}} class="form-group" >
            @csrf
            {!! method_field('PUT') !!}
            
            <div class="form-group">
                <label for="formGroupExampleInput">Cliente</label>
            <input type="text" class="form-control" name="cliente" id="formGroupExampleInput" value="{{$encuestaa->nombre_cli}}">
            </div>
            {{--FECHA EMISION CREATED AT--}} 
            <div class="form-group">
                <label for="formGroupExampleInput2">Encargado</label>
                <input type="text" class="form-control" name="encargado" id="formGroupExampleInput3" value="{{$encuestaa->encargado_cli}}">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Tecnico en terreno</label>
                <input type="text" class="form-control" name="tecnico_en_terreno" id="formGroupExampleInput4" value="{{$encuestaa->tecnico}}">
            </div>
            <div class="form-group">
                    <label for="exampleFormControlTextarea1">Observaciones</label>
                    <textarea class="form-control" name="observaciones" id="exampleFormControlTextarea1" rows="4" >{{$encuestaa->observaciones}}</textarea>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Contacto</label>
                <input type="text" class="form-control" name="contacto" id="formGroupExampleInput4" value="{{$encuestaa->contacto}}">
            </div>
            {{--IMPORTANTE CAMPO "TYPE=SUBMIT" PARA EL CREATE--}}
            <button class="btn btn-success btn-sm" type="submit" name="createButton" >Editar encuesta</button>
        </form>
  
    </div>
    
   
    <a class="btn btn-secondary btn-sm" href="{{ route('encuesta.gestor') }}" role="button">Atras</a>
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

@endsection