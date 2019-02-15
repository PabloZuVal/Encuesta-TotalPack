@extends('layouts.app')

@section('content')
    {{---------------------------------------INDEX DE preguntas (VER COMO MOSTRAR LOS DATOS)-----------------------------}}
    &nbsp
    <h1 align="center">Index - Instalacion de Sistemas</h1><br>
    <h5 align="center"> 1. Revision de aplicaciones y servicios TotalPack</h5>
    <br>
    <div class="container">
        <div class="container">
            <a class="btn btn-warning btn-sm" href="{{-- route('preguntaCheck.create',$encuestaa->id_encuesta) --}}" role="button">Crear pregunta</a> {{--Hacer--}}
        </div>
        <div class="container">
            &nbsp
            <div class="tab-content">
                <table class="table table-striped table-dark table-sm"> <!-- insertar nombre de la tabla -->
                    <thead>
                        <tr>
                            <th>Preguntas</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- foreach aca --}}
                        @foreach($preguntas_pagina as $pregunta_pagina)
                            <tr>
                                <td><li value="1">{{$pregunta_pagina->pregunta}} :</li></td>
                                <td>
                                    @switch ($pregunta_pagina->tipo_respuesta) 
                                        @case('checkbox')
                                            <h1 align="center"><input type="checkbox" class="form-check-input" name="pregunta_check_new"></h1>
                                            @break
                                        @case('select') 
                                            <select class="custom-select my-1 mr-sm-2" name="tipo_pregunta" id="inlineFormCustomSelectPref" required>
                                                <option selected>Seleccione...</option>
                                                {{-- 
                                                @foreach ($collection as $item)
                                                    <option value="select_campo1">{{$pregunta_check_encuesta->select_campo1}}</option>
                                                @endforeach
                                                <option value="select_campo1">{{$pregunta_check_encuesta->select_campo1}}</option>
                                                <option value="select_campo2">{{$pregunta_check_encuesta->select_campo2}}</option>
                                                <option value="select_campo3">{{$pregunta_check_encuesta->select_campo3}}</option>
                                                <option value="select_campo4">{{$pregunta_check_encuesta->select_campo4}}</option>
                                                --}}
                                            </select>
                                            @break
                                        @case('string') 
                                            <input type="text" class="form-control" name="pregunta_check_new" id="formGroupExampleInput" placeholder="Ingrese Aqui"required> 
                                            @break
                                        @default
                                            <td>No entra en nungun caso</td>
                                            @break
                                    @endswitch                                     
                                </td>
                                <td><a class="btn btn-primary btn-sm" href="#{{-- route('pregunta.edit',$pregunta_encuesta->id_pregunta) --}}" role="button">Editar</a></td>
                                <td>
                                    <form method="POST" action="#{{-- route('encuesta.destroy', $pregunta_encuesta->id_pregunta) --}}">
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
            &nbsp
        </div>
    </div>
    <a class="btn btn-secondary btn-sm" href="{{-- route('pregunta.index',$encuestaa->id_encuesta) --}}" role="button">Atras</a>
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>    
@endsection