@extends('layouts.app')

@section('content')

    <h1 align="center">Gestor - Encuestas</h1>

    <a class="btn btn-success btn-sm" href="{{ route('encuesta.create') }}" role="button">Crear encuesta</a>
    <div class="container">
        <div class="tab-content">
            <table class="table">
                <thead>
                    <tr>
                        <th>Mostrar Cliente</th>
                        <th>Fecha emision</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                        <th>Preguntas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($encuestas as $encuesta)
                    <tr>   
                        <td>
                            <a href="{{ route('encuesta.show',$encuesta->id_encuesta) }}">
                                {{ $encuesta->nombre_cli}}
                            </a>
                        </td>
                        <td>{{ $encuesta->fecha_emision}}</td>
                        <td><a class="btn btn-primary btn-sm" href="{{ route('encuesta.edit',$encuesta->id_encuesta) }}" role="button">Editar</a></td><!-- Editar -->
                        <td>
                            <form method="POST" action="{{ route('encuesta.destroy', $encuesta->id_encuesta) }}">
                                {!! csrf_field() !!}
                                {!! method_field('DELETE') !!}
                                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button><!-- Eliminar -->
                            </form>
                        </td>
                        <td><a class="btn btn-warning btn-sm" href="{{route('pregunta.index',$encuesta->id_encuesta)}}" role="button">Preguntas</a></td><!-- Preguntas (Este campo incluye preguntas normales y CheckBox) --> 
                    </tr> 
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

@endsection