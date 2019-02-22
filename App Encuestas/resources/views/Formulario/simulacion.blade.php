@extends('layouts.app')
@section('content')

    {{--------------------------------------------------- SIMULACION DE ENCUESTA -----------------------------------------------}}
    <h1 class="display-4" align="center">Simulacion de encuestas</h1><br>
    &nbsp
    <select id="respuestaSelect" class="custom-select custom-select-lg mb-3">
        <option selected>Seleccione la encuesta</option>
        @foreach ($encuestas as $encuesta)
            @if ($encuesta->Activado == true)
                <option value="{{$encuesta->id_encuesta}}"> {{$encuesta->nombre_cli}}  -  {{$encuesta->sucursal}} </option>
            @endif
        @endforeach
    </select>
    &nbsp
    <button class="btn btn-primary btn-sm" id="btnEnviar" >Encuesta - Corriente</button><br>
    &nbsp
    {{--<a href="{{ route('simulacion.show') }}" id="ButtonEC" class="btn btn-primary btn-sm" >Encuesta - Corriente </a>--}}
    {{--&nbsp--}}
    <a href="#" id="ButtonAdmI" class="btn btn-primary btn-sm">Encuesta - Administrador de instalaciones</a>
    &nbsp

    <h3 align="center" >Mostrar Preguntas</h3><br>
    <div class="container">
        <table class="table table-hover table-striped " id="preguntas">
            <thead>
                <tr>
                    <th>Pregunta</th>
                    <th>Respuesta</th>
                </tr>
            </thead>
            <tbody>
            
            </tbody>
        </table>
    </div>

    {{------------------------------------------------------------------------------------------------------------------------------}}

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <script>
        $('#respuestaSelect').change(function(){
            var idEncuesta = $('#respuestaSelect').val();
        });

        $('#btnEnviar').click(function(){
            
            $.ajax({

                url: "{{ route('simulacion.show') }}" ,
                type: "POST",
                data:
                {
                    'txtidencuesta' : $('#respuestaSelect').val(),
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(result) { //exito 
                    for (var i = 0; i < result.length; i++) {
                        //console.log(result[i].pregunta);
                        if (result[i].Activado == true) { //muestro solo preguntas activadas
                            $("tbody").append($('<tr>',{
                                value: i,
                                text: result[i].pregunta 
                            }));
                        }                             
                    }
                    $("<tbody>").empty();
                },
                failure: function(err) { //error
                    console.log(err);
                }
            }) 
        });
    </script>

@endsection