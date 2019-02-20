@extends('layouts.app')
@section('content')
    {{--------------------------------------------------- ENCUESTA CLASICA INDEX -----------------------------------------------}}
    <h1 class="display-4" align="center"> - Encuesta Clasica - </h1><br>
    <h5 align="center">-{{$encuestaa->nombre_cli}}-</h5><br>

     <a class="btn btn-success btn-sm" href="{{-- route('encuesta.create') --}}" role="button">Nueva pregunta</a>
    <div class="container">
        <div class="tab-content">
            <table class="table table-hover table-striped" id="preguntas">
                <thead>
                    <tr>
                        <th>Pregunta</th>
                        <th>Respuesta</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($preguntasC_encuesta as $preguntaC_encuesta) {{-- CREAR LAS NUEVAS VISTAS DE CREAR EDITAR Y ELIMINAR--}}
                        @if($preguntaC_encuesta->Activado == true)
                            <tr>
                                <td>{{$preguntaC_encuestas->pregunta}}</td>
                                <td><a class="btn btn-warning btn-sm" href="{{-- route('encuesta.edit',$encuesta->id_encuesta) --}}" role="button">Respuesta</a></td>
                                <td><a class="btn btn-primary btn-sm" href="{{-- route('encuesta.destroy',$encuesta->id_encuesta) --}}" role="button">Editar</a></td>
                                <td><a class="btn btn-danger btn-sm" href="{{-- route('preguntaclasica.index',$encuesta->id_encuesta) --}}" role="button">Eliminar</a></td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
   
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

@endsection