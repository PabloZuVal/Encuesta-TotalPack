@extends('layouts.app')
@section('content')
    
    <h1 align="center">Crear Encuesta</h1>
    
    <div class="container">
        
        <form method="POST" action ={{route('encuesta.store')}} class="form-group" >
            @csrf
            <div class="form-group">
                <label for="formGroupExampleInput">Cliente</label>
                <input type="text" class="form-control" name="cliente" id="formGroupExampleInput" placeholder="Ingrese nombre de cliente">
            </div>
            {{--FECHA EMISION CREATED AT--}} 
            <div class="form-group">
                <label for="formGroupExampleInput2">Encargado</label>
                <input type="text" class="form-control" name="encargado" id="formGroupExampleInput3" placeholder="Ingrese nombre de encargado">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Tecnico en terreno</label>
                <input type="text" class="form-control" name="tecnico_en_terreno" id="formGroupExampleInput4" placeholder="Ingrese nombre de tecnico en terreno">
            </div>
            <div class="form-group">
                    <label for="exampleFormControlTextarea1">Observaciones</label>
                    <textarea class="form-control" name="observaciones" id="exampleFormControlTextarea1" rows="4"></textarea>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Contacto</label>
                <input type="text" class="form-control" name="contacto" id="formGroupExampleInput4" placeholder="Ingrese Contacto : N° de telefono y/ó correo electronico">
            </div>
            {{--IMPORTANTE CAMPO "TYPE=SUBMIT" PARA EL CREATE--}}
            <button class="btn btn-success btn-sm" type="submit" name="createButton" >Crear encuesta</button>
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