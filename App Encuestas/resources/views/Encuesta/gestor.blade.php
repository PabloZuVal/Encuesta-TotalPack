@extends('layouts.app')

@section('content')

    <h1 align="center">Gestor - Encuestas</h1>

    <a class="btn btn-success btn-sm" href="{{ route('encuesta.create') }}" role="button">Crear encuesta</a>
    &nbsp
    <div class="container">
        <div class="tab-content">
            <table class="table table-hover table-striped  table-dark " id="gestor">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Mostrar Cliente</th>
                        <th>Sucursal</th>
                        <th>Fecha emision</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($encuestas as $encuesta)
                    <tr>
                        <th>{{$encuesta->id_encuesta}}</th>   
                        <td>
                            <a  href="{{ route('encuesta.show',$encuesta->id_encuesta) }}">
                                {{ $encuesta->nombre_cli}}
                            </a>
                        </td>
                        <td>{{ $encuesta->sucursal}}</td>
                        <td>{{ $encuesta->fecha_emision}}</td>
                        <td><a class="btn btn-primary btn-sm" href="{{ route('encuesta.edit',$encuesta->id_encuesta) }}" role="button">Editar</a></td><!-- Editar -->
                        <td>
                            <form method="POST" action="{{ route('encuesta.destroy', $encuesta->id_encuesta) }}">
                                {!! csrf_field() !!}
                                {!! method_field('DELETE') !!}
                                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button><!-- Eliminar -->
                            </form>
                        </td>
                        <td><a class="btn btn-warning btn-sm" href="{{route('secciones.index',$encuesta->id_encuesta)}}" role="button">Secciones</a></td><!-- esta ruta separa las secciones de la encuesta y cada seccion tien tipos de preguntas --> 
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