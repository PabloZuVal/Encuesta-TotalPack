<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TotalPack - Sistema de encuestas</title>

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
                            <a class ="btn btn-outline-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ Auth::user()->name }}: Logout
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
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Sistema de encuestas</div>
                                @yield('content')
                        </div>
                    </div>
                </div>
             </div>
        </main>
    </div>
   
</body>
</html>
