<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('css/loading_screen.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">


    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- serviceWorker integrado P -->


    <script>
    if ('serviceWorker' in navigator) {
        window.addEventListener('load', () => {
            navigator.serviceWorker.register('/js/service-worker.js')
                .then((registration) => {
                    console.log('Service Worker registrado con éxito:', registration);
                })
                .catch((error) => {
                    console.error('Error al registrar el Service Worker:', error);
                });
        });
    }
    </script>
</head>

<body>
    <div id="loading-screen">
        <div id="loader"></div>

    </div>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    @if(Auth::check())
                    <!-- Verifica si el usuario está autenticado -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('empleado.index') }}">{{ __(' Empleado') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('producto.index') }}">{{ __(' Producto') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cliente.index') }}">{{ __(' Cliente') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('chat') }}">{{ __(' Chat') }}</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('producto.index') }}">{{ __(' Proveedor') }}</a>
                        </li>  -->
                    </ul>
                    @endif
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Salir') }}
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script>
    window.addEventListener('load', function() {
        var contenedor = document.getElementById('loading-screen');
        contenedor.style.visibility = 'hidden';
        contenedor.style.opacity = '0';
    });
    </script>
</body>

</html>