@extends('layouts.app')
@section('content')
    
    <h1 align="center">Crear Encuesta</h1>
    
    <div class="container">
        
        <form method="POST" action ={{route('encuesta.store')}} class="form-group" >
            @csrf
            {!! csrf_field()!!}
            <div class="form-group">
                <label for="formGroupExampleInput">Cliente</label>
                <input type="text" class="form-control" name="cliente" id="formGroupExampleInput" placeholder="Ingrese nombre de cliente" required>
                {!! $errors->first('cliente','<span class=error>:message</span>')!!}
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Sucursal</label>
                <input type="text" class="form-control" name="sucursal" id="formGroupExampleInput" placeholder="Ingrese la sucursal"required>
                {!! $errors->first('sucursal','<span class=error>:message</span>')!!}
            </div>
            {{--FECHA EMISION CREATED AT--}} 
            <div class="form-group">
                <label for="formGroupExampleInput2">Encargado</label>
                <input type="text" class="form-control" name="encargado" id="formGroupExampleInput3" placeholder="Ingrese nombre de encargado"required>
                {!! $errors->first('encargado','<span class=error>:message</span>')!!}
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Tecnico en terreno</label>
                <input type="text" class="form-control" name="tecnico_en_terreno" id="formGroupExampleInput4" placeholder="Ingrese nombre de tecnico en terreno"required>
                {!! $errors->first('tecnico_en_terreno','<span class=error>:message</span>')!!}
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Observaciones</label>
                <textarea class="form-control" name="observaciones" id="exampleFormControlTextarea1" rows="4"required></textarea>
                {!! $errors->first('observaciones','<span class=error>:message</span>')!!}
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Contacto</label>
                <input type="text" class="form-control" name="contacto" id="formGroupExampleInput4" placeholder="Ingrese Contacto : N° de telefono y/ó correo electronico"required>
                {!! $errors->first('contacto','<span class=error>:message</span>')!!}
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