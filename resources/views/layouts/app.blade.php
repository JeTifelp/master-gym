<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://code.highcharts.com/highcharts.js"></script>
<style>
    .collapse{
        background-color: #b7f0b7;
    }
</style>
</head>
<body>
    
    <div id="app" >
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" >
            <div class="container">
                
                
                <!--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon">HJH</span>
                </button>-->

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        
                        @if (Auth::check())
                        
                        @if (Auth:: user()->tipo == 1)
                        
                        <li class="card-body  ">
                            <a class="nav-link" href=""><font color='red' face="Comic Sans MS,arial">Admin</font><span class="sr-only" >(current)</span></a>
                        </li>
                        @else
                            
                        
                        <li class="card-body  ">
                            <a class="nav-link" href=""><font color='red' face="Comic Sans MS,arial">Socio</font><span class="sr-only">(current)</span></a>
                        </li>
                        @endif   

                        <li class="nav-item ">
                         <a class="nav-link" href="{{route('usuarios.index')}}">USUARIOS <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('productos.index')}}">PRODUCTOS <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('alimentaciones.index')}}">ALIMENTACIONES <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('asistencias.index')}}">ASISTECNCIAS <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('ventas.index')}}">VENTAS <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('mensualidades.index')}}">MENSUALIDADES <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('sociorutinas.index')}}">SOCIO-RUTINA <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('estadisticas.index')}}">ESTADISTICAS <span class="sr-only">(current)</span></a>
                        </li>
                        
                        {{-- <li class="nav-item ">
                            <a class="nav-link" href="{{route('libros.index')}}">Libros <span class="sr-only">(current)</span></a>
                        </li> --}}
                        @endif

                        

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 container">
            @yield('content')
        </main>
    </div>
</body>
</html>
