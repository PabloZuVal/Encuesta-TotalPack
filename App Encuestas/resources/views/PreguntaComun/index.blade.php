@extends('layouts.app')
@section('content')
    {{--------------------------------------------------- ENCUESTA CLASICA INDEX ------------------------ VER "SIMULACION" DE ENCUESTA-----------------------}}
    <h1 class="display-4" align="center"> - Encuesta Clasica - </h1><br>
    <h5 align="center">- {{$encuestaa->nombre_cli}} -</h5><br>

     {{--<a class="btn btn-success btn-sm" href="{{ route('preguntaclasica.create',$encuestaa->id_encuesta) }}" role="button">Nueva pregunta</a>--}}

     {{--<a class="btn btn-success btn-sm" href="{{ route('preguntaclasica.create',$encuestaa->id_encuesta) }}" role="button">Nueva pregunta</a><br>--}}

    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModalCenter">Nueva pregunta</button>

    <div class="container">
        <div class="tab-content">
            <table class="table table-hover table-striped" id="preguntas">
                <thead>
                    <tr>
                        <th>Pregunta</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($preguntasC_encuesta as $preguntaC_encuesta) 
                        @if($preguntaC_encuesta->Activado == true)
                            <tr>
                                <td>{{$preguntaC_encuesta->pregunta}}</td>
                                {{--<td><a class="btn btn-warning btn-sm" href="{{ route('respuestaclasica.index',$preguntaC_encuesta->id_pregunta_clasica) }}" role="button">Respuesta</a></td>--}}
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Modaledit">
                                        Editar
                                    </button>
                                </td>
                                {{--<td><a class="btn btn-primary btn-sm" href="{{ route('preguntaclasica.edit',$preguntaC_encuesta->id_pregunta_clasica) }}" role="button">Editar</a></td>--}}
                                <td><a class="btn btn-danger btn-sm" href="{{ route('preguntaclasica.destroy',$preguntaC_encuesta->id_pregunta_clasica) }}" role="button">Eliminar</a></td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
   
    <!---------------------------------------------------------------- Modal Create ------------------------------------------------------------------>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Crear Pregunta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    @csrf
                    <div class="form-group">
                        <label for="formGroupExampleInput">Ingrese Nueva pregunta : </label>
                        <input type="text" class="form-control" name="pregunta_new" id="formGroupExampleInput" value="" placeholder="Ingrese Aqui"required>
                    </div>
                    <button class="btn btn-success btn-sm" id="createButton">Crear Pregunta</button>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

     <!-------------------------------------------------------------- Modal Edit --------------------------------------------------------------->
     <div class="modal fade" id="Modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Editar Pregunta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="formGroupExampleInput">Ingrese Nueva pregunta : </label>
                        <input type="text" class="form-control" name="pregunta_edit" id="formGroupExampleInput" value="{{--$preguntaC_encuesta->pregunta--}}"required>
                    </div>
                    <button class="btn btn-success btn-sm" id="editButton">Editar Pregunta</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
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

    <script>

        // for Insert Ajax
        $('#createButton').click(function(){
            $.ajax({
                url: "{{ route('preguntaclasica.create2') }}",
                type:'GET',
                cache: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    //'_token':$('input[name=_token').val(),
                    //'pregunta':$('#pregunta_new').val(),
                    'pregunta':$("input[name='pregunta_new'").val(),
                    'id_encuesta': "{{$encuestaa->id_encuesta}}",
                },
                success:function(result){
                    window.location.reload();
                    //console.log(result);
                },
            });
        });
        // for Insert Ajaxt
     
    </script>
@endsection