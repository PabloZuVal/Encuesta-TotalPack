@extends('layouts.app')

@section('content')

    <h1 align="center">Gestor - Preguntas de {{$encuestaa->nombre_cli}}</h1>

    <a class="btn btn-success btn-sm" href="{{-- route('pregunta.create') --}}" role="button">Crear Pregunta</a>
    
    <div class="container">
        <div class="tab-content">
            <table class="table">
                <thead>
                    <tr>
                        <th>Preguntas</th>
                        <th>Respuesta</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($preguntas_encuesta as $pregunta_encuesta)
                        <td>{{$pregunta_encuesta->pregunta}}</td>
                        <td>boton respuesta</td>
                        <td><a class="btn btn-primary btn-sm" href="{{-- route('encuesta.edit',$encuesta->id_encuesta) --}}" role="button">Editar</a></td>
                        <td>
                            <form method="POST" action="{{-- route('encuesta.destroy', $encuesta->id_encuesta) --}}">
                                {!! csrf_field() !!}
                                {!! method_field('DELETE') !!}
                                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button><!-- Eliminar -->
                            </form>
                        </td>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <a class="btn btn-success btn-sm" href="{{-- route('pregunta.create') --}}" role="button">Crear CheckBox</a>
    <div class="container">
        <div class="tab-content">
            <table class="table">
                <thead>
                    <tr>
                        <th>Preguntas - CheckBox</th>
                        <th>Respuestas</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Aca  @foreach --}}
                </tbody>
            </table>
        </div>
    </div>

    <a class="btn btn-secondary btn-sm" href="{{ route('encuesta.gestor') }}" role="button">Atras</a>

    <div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

@endsection