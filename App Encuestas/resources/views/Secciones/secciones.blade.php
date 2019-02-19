@extends('layouts.app')

@section('content')

    <h1 class="display-4" align="center">Secciones - {{$encuestaa->nombre_cli}}</h1>

    <a class="btn btn-success btn-sm" href="{{ route('secciones.create',$encuestaa->id_encuesta)}}" role="button">Crear seccion</a>
    &nbsp
    <div class="container">
      
       <ul class="list-group"> 
           @foreach ($paginas as $pagina)
                @if($pagina->id_encuesta == $encuestaa->id_encuesta && $pagina->Activado == true)
                    <li class="list-group-item">{{$pagina->nombre_seccion}} :  
                        <a class="btn btn-primary btn-sm" href="{{ route('secciones.edit',$pagina->id_pagina) }}" role="button">Editar</a>
                        <a class="btn btn-danger btn-sm" href="{{ route('secciones.destroy',$pagina->id_pagina) }}" role="button">Eliminar</a>
                        <a class="btn btn-warning btn-sm" href="{{ route('pregunta.index',$pagina->id_pagina) }}" role="button">Mostrar Preguntas</a>
                    </li>
                @endif
           @endforeach
        </ul>
    </div>
    &nbsp
    <a class="btn btn-secondary btn-sm" href="{{ route('encuesta.gestor') }}" role="button">Atras</a>
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

@endsection
