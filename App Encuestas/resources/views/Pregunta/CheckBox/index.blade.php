@extends('layouts.app')

@section('content')
    {{--------------------------------------------------INDEX DE CHECKBOX-----------------------------------------------}}
    <h1 align="center">Index de CheckBoxs, {{$encuestaa->nombre_cli}}</h1>

    <div class="container">
        <a class="btn btn-success btn-sm" href="{{ route('preguntaCheck.create',$encuestaa->id_encuesta) }}" role="button">Crear CheckBox</a>
        
        <div class="container">
            &nbsp
            <div class="tab-content">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Preguntas - CheckBox</th>
                            <th>Check</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($preguntas_check_encuesta as $pregunta_check_encuesta)
                            <tr>
                                <th>{{$pregunta_check_encuesta->pregunta_check}}</th>
                                <th><input type="checkbox"></th>
                                <th>&nbsp</th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <a class="btn btn-secondary btn-sm" href="{{ route('pregunta.index',$encuestaa->id_encuesta) }}" role="button">Atras</a>
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>    
@endsection