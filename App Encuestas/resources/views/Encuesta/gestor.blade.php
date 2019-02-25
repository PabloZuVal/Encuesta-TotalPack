@extends('layouts.app')

@section('content')

    <h1 class="display-4" align="center"> - Gestor - </h1>

    {{--<a class="btn btn-success btn-sm" href="{{ route('encuesta.create') }}" role="button">Crear encuesta</a> {{-- outline --}}
    <!-- Button trigger  modal -->
    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">Crear encuesta</button>
    &nbsp
    <div class="container">
        <div class="tab-content">
            <table class="table table-hover table-striped " id="gestor"> {{--table-dark--}}
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Cliente</th>
                        <th>Sucursal</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($encuestas as $encuesta)
                        @if($encuesta->Activado == true) {{--Con mayuscula la A de Activado--}}
                            <tr>
                                <td>{{$encuesta->id_encuesta}}</td>   
                                <td>
                                    
                                    <a href="{{ route('encuesta.show',$encuesta->id_encuesta) }}"> {{-- Error aca con encuesta.show --}}
                                        {{$encuesta->nombre_cli}}
                                    </a>
                                    
                                </td>
                                <td>{{ $encuesta->sucursal}}</td>
                                <td><a class="btn btn-primary btn-sm" href="{{ route('encuesta.edit',$encuesta->id_encuesta) }}" role="button">Editar</a></td><!-- Editar -->
                                <td><a class="btn btn-danger btn-sm" href="{{ route('encuesta.destroy',$encuesta->id_encuesta) }}" role="button">Eliminar</a></td><!-- Eliminar/Desactivar -->
                                <td><a class="btn btn-secondary btn-sm" href="{{ route('preguntaclasica.index',$encuesta->id_encuesta) }}" role="button">Encuesta Clasica</a></td><!-- Eliminar/Desactivar -->
                                <td><a class="btn btn-warning btn-sm" href="{{route('secciones.index',$encuesta->id_encuesta)}}" role="button">Secciones</a></td><!-- esta ruta separa las secciones de la encuesta y cada seccion tien tipos de preguntas --> 
                            </tr> 
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
     
    <!-- Modal  Crear encuesta-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Encuesta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"> <!-- ---------------------- -->
                    <form method="POST" action ={{route('encuesta.store')}} class="form-group" >
                        @csrf
                        {!! csrf_field()!!}
                        <div class="form-group">
                            <label for="formGroupExampleInput">Cliente</label>
                            <input type="text" class="form-control" name="cliente" id="formGroupExampleInput" placeholder="Ingrese nombre de cliente" required>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Sucursal</label>
                            <input type="text" class="form-control" name="sucursal" id="formGroupExampleInput" placeholder="Ingrese la sucursal"required>
                        </div>
                        {{--FECHA EMISION CREATED AT--}} 
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Encargado</label>
                            <input type="text" class="form-control" name="encargado" id="formGroupExampleInput3" placeholder="Ingrese nombre de encargado"required>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tecnico en terreno</label>
                            <input type="text" class="form-control" name="tecnico_en_terreno" id="formGroupExampleInput4" placeholder="Ingrese nombre de tecnico en terreno"required>  
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Observaciones</label>
                            <textarea class="form-control" name="observaciones" id="exampleFormControlTextarea1" rows="4"required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Contacto</label>
                            <input type="text" class="form-control" name="contacto" id="formGroupExampleInput4" placeholder="Ingrese Contacto : N° de telefono y/ó correo electronico"required>
                        </div>
                        {{--IMPORTANTE CAMPO "TYPE=SUBMIT" PARA EL CREATE--}}
                        <button class="btn btn-success btn-sm" type="submit" name="createButton" >Crear encuesta</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin modal create -->

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <script>
        $(function(){
            console.log('jQuery esta funcionando');
        });
        $(document).ready(function() {
            $('#gestor').DataTable();
        });
    </script>
@endsection