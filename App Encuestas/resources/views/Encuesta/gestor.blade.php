@extends('layouts.app')

@section('content')

    <h1 class="display-4" align="center"> - Gestor - </h1>

    <a class="btn btn-success btn-sm" href="{{ route('encuesta.create') }}" role="button">Crear encuesta</a> {{-- outline --}}
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
                                    <a href="{{ route('encuesta.show',$encuesta->id_encuesta) }}"> {{-- Error aca con encuesta.show (No esta definida)--}}
                                        {{ $encuesta->nombre_cli}}
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