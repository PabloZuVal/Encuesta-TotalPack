<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Encuestas - TotalPack</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/ajax.js') }}" defer></script> <!-- Agregado -->
     <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
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
                    
                    <!-- --------------------------------------------------------------------------------------------------- -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist"> <!-- PESTAÑAS -->
                        
                        <li class="nav-item ">
                            <a class="nav-link"   href="{{ route('encuesta.index') }}">Encuestas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="{{ route('encuesta.gestor') }}">Gestor de encuestas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Administrador de instalaciones</a>
                        </li>
                        <!--
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Disabled</a>
                        </li>
                        -->
                    
                    </ul>
                    <!-- --------------------------------------------------------------------------------------------------- -->

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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
        
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Sistema de encuestas</div>
                                {{--@yield('content')--}}
                                <h1 align="center">Encuestas de satisfacción</h1>
    
                                <div class="tab-content">
                                    <table class="table table-hover table-striped " id="encuestas">
                                        <thead>
                                            <tr>
                                                <th with="20px">N°</th>
                                                <th with="20px">Nombre cliente</th>
                                                <th with="20px">Sucursal</th>
                                                <th with="20px">Fecha emision</th>
                                                <th with="20px">Encargado cliente</th>
                                                <th with="20px">Tecnico</th>
                                                <th with="20px">Contacto</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($encuestas as $encuesta)
                                            <tr>
                                                <td>{{ $encuesta->id_encuesta}}</td>
                                                <td>{{ $encuesta->nombre_cli}}</td>
                                                <td>{{ $encuesta->sucursal}}</td>
                                                <td>{{ $encuesta->fecha_emision}}</td>
                                                <td>{{ $encuesta->encargado_cli}}</td>
                                                <td>{{ $encuesta->tecnico}}</td>
                                                <td>{{ $encuesta->contacto}}</td>
                                            </tr> 
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            
                                <div class="card-body">
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                </div>
                        </div>
                    </div>
                </div>
             </div>
        </main>
    </div>
   {{--
    <script src="{{asset('Assets/datatables/js/jquery-3.3.1.js')}}"></script>
    <!-- data tables -->
    <script src="{{asset('Assets/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('Assets/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
    --}}
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    
    
    <script>
                                
        $(function(){
            console.log('jQuery esta funcionando');
        });
        $(document).ready(function() {
            $('#encuestas').DataTable();  //Error aca, no reconoce la funcion .DataTable
        });
    
    </script>

</body>
</html>