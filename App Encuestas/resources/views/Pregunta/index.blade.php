@extends('layouts.app')

@section('content')
    {{-- --------------------------------------------- INDEX DE PREGUNTAS ----------------------------------------- --}}
    <h1 align="center">Index de preguntas, {{$encuestaa->nombre_cli}}</h1>

    <div class="container">
        <a class="btn btn-success btn-sm" href="{{ route('pregunta.create',$encuestaa->id_encuesta) }}" role="button">Crear Pregunta</a>
        <a class="btn btn-warning btn-sm" href="{{ route('preguntaCheck.index',$encuestaa->id_encuesta) }}" role="button">CheckBox</a>
        <div class="tab-content">
            &nbsp
            <table class="table table-striped table-dark table-sm">
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
                    <tr>
                        <td>{{$pregunta_encuesta->pregunta}}</td>
                        <td>boton respuestaa</td>
                        <td><a class="btn btn-primary btn-sm" href="{{ route('pregunta.edit',$pregunta_encuesta->id_pregunta) }}" role="button">Editar</a></td>
                        <td>
                            <form method="POST" action="{{ route('encuesta.destroy', $pregunta_encuesta->id_pregunta) }}">
                                {!! csrf_field() !!}
                                {!! method_field('DELETE') !!}
                                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button><!-- Eliminar -->
                            </form>
                        </td>
                    </tr>
                    @endforeach
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
    </div>
@endsection