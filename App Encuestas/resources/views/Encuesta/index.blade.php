@extends('layouts.app')

@section('content')

    <h1 class="display-4" align="center">Historial - Encuestas de satisfacción</h1>
    <div class="container">
        <div class="tab-content">
            <table class="table table-hover table-striped " id="encuestass">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Nombre cliente</th>
                        <th>Sucursal</th>
                        <th>Fecha emision</th>
                        <th>Encargado cliente</th>
                        <th>Tecnico</th>
                        <th>Estado</th>
                    </tr>
                </thead>
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
        $(document).ready(function() { //agregar condicion
            $('#encuestass').DataTable({
                "serverSide": true,
                "ajax": "{{url('api/encuestas')}}",
                "columns":[
                    {data:'id_encuesta'},
                    {data:'nombre_cli'},
                    {data:'sucursal'},
                    {data:'fecha_emision'},
                    {data:'encargado_cli'},
                    {data:'tecnico'},
                    {data: 'Activado'}
                ]
            });
        });
   
    </script>
    
@endsection
