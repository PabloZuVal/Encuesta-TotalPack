<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TotalPack - Sistema de encuestas</title>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!----------------------------------------------------------- link data tables 1° css -------------------------------------------------------------------------->
    
    <link rel="stylesheet" href="{{ asset('Assets/datatables/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('Assets/datatables/css/dataTables.bootstrap4.min.css') }}">

    <!-- Scripts -->
    {{--<script src="{{ asset('js/app.js') }}" defer></script>--}} <!-- crea conflicto con js de datatables -->
    <script src="{{ asset('js/ajax.js') }}" defer></script> <!-- Agregado -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="{{asset('Assets/datatables/js/jquery-3.3.1.js')}}"></script> 

    <!-- data tables -->
    <script type="text/javascript" src="{{ asset('Assets/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('Assets/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <!--TotalPack-->
                    
                    <img src="https://www.defontana.com/cl/wp-content/uploads/2017/05/total-pack.png" width="200px" height="45px" >
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                                <ul class="navbar-nav">
                                    <li class="nav-item active">
                                        <a class="nav-item nav-link" href="{{ route('encuesta.index') }}">  Historial  <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-item nav-link" href="{{ route('encuesta.gestor') }}">  Gestor de contenido </a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-item nav-link" href="{{ route('simulacion.index') }}">  Simulador  </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            {{--@if (Route::has('register'))--}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            {{--@endif--}}
                        @else
                            <a class ="btn btn-outline-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Usuario : {{ Auth::user()->name }} -> Logout
                            </a>
                            
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                            {{-- txt --}}
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
        
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">Sistema de encuestas - beta </div>

                                {{--@yield('content')--}}
                                 {{--------------------------------------------------- SIMULACION DE ENCUESTA -----------------------------------------------}}
                            <h1 class="display-4" align="center">Simulacion de encuestas - BETA</h1><br>
                            &nbsp
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4">
                                        <select id="respuestaSelect" class="custom-select custom-select-lg mb-3">
                                            <option selected>Seleccione la encuesta</option>
                                            @foreach ($encuestas as $encuesta)
                                                @if ($encuesta->Activado == true)
                                                    <option value="{{$encuesta->id_encuesta}}"> {{$encuesta->nombre_cli}}  -  {{$encuesta->sucursal}} </option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <button class="btn btn-primary btn-sm" id="btnEnviar" >Encuesta - Corriente</button><br>
                                        <br>
                                        {{--<a href="{{ route('simulacion.show') }}" id="ButtonEC" class="btn btn-primary btn-sm" >Encuesta - Corriente </a>--}}
                                        <a href="#" id="ButtonAdmI" class="btn btn-primary btn-sm">Encuesta - Administrador de instalaciones</a><br>
                                    </div>
                                    <div name="table" class="col-md-8">
                                        <!--<h3 align="center" >Mostrar Preguntas</h3><br>-->
                                        <!-- --------------------------------------------------- MOSTRAR TABLA ACA ---------------------------------------------->
                                        
                                        <table class="table table-hover table-striped table-sm " id="preguntas">
                                            <thead> 
                                                <tr> 
                                                    <th>Pregunta</th> 
                                                </tr> 
                                            </thead> 
                                            <tbody> 
                                            </tbody> 
                                        </table>

                                        
                                    </div> 
                                </div> 
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
                                    //$("tbody").empty();
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
                                            //var tablaHtml = "<table class='table table-hover table-striped table-sm' id='preguntas'>"+"<thead>"+"<tr>"+"<th>Pregunta</th>"+"<th>Respuesta</th>"+"<th>Respuesta</th>"+"</tr>"+"</thead>"+"<tbody>"+"</tbody>"+"</table>";  
                                            for (var i = 0; i < result.length; i++) {
                                                //console.log(result[i].pregunta);
                                                if (result[i].Activado == true) { //muestro solo preguntas activadas "filtrando" los i estan bien
                                                    $("tbody").append($('<tr>',{
                                                        value: i,
                                                        text: result[i].pregunta 
                                                    }));
                                                    $("tbody").append($('<tr><td><input id="pregunta'+i+'" type="text" class="form-control">',{
                                                        value: i,
                                                        text: result[i].pregunta 
                                                    }));
                                                    //console.log('pregunta'+i);   
                                                }                           
                                            } 
                                            //console.log(result);
                                            $("table").append('<button id="guardarPreguntas" class="btn btn-success btn-sm">boton de guradar</button>'); //ocupar javascript para guardar los datos

                                            //$("tbody").empty(); //estoy mostrando el contenido y borrandolo al mismo tiempo.
                                            
                                            $('#guardarPreguntas').click(function(){ //guardar respuestas

                                                var object11 = funcion1(result);
                                                //console.log(object11);
                                                //console.log(data1);//guarda las respuestas en el array de objetos data
                                                $.ajax({
                                                    url:"{{route('simulacion.guardar')}}",
                                                    type:'GET',
                                                    headers: {
                                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                    },
                                                    data:object11,
                                                    success:function(result){ //result es lo que retorna el controlador
                                                        //window.location.reload();
                                                        console.log(result); //array() (retornado $request)
                                                    },
                                                }); 
                                            });
                                        },
                                        failure: function(err) { //error
                                            console.log(err);
                                        }
                                    }) 
                                });
                                function funcion1(result){    
                                    var object1 = {};
                                    
                                    for (var i = 0; i < result.length ; i++) {
                                        if (result[i].Activado == true) {
  
                                            object1["respuesta"+i] = $('#pregunta'+i).val();
                                            object1["id_pregunta_clasica"+i] = result[i].id_pregunta_clasica; 
                                            
                                        }
                                    }

                                    return object1;
                               }

                            </script>
                        </div>
                    </div>
                </div>
             </div>
        </main>
    </div>
   
</body>
</html>