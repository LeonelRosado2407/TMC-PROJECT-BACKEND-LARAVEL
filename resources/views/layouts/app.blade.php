<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @yield('extra-css')

    <!-- Incluye jQuery -->
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="h-full w-full bg-gray-50 dark:bg-gray-900"> 
    <div id="app">
        <navbar url="{{route('home')}}" image="{{asset("black/img/monone.png")}}">
            @if (Auth::check())
                <navbar-item name="Login" url = "{{route('home')}}"></navbar-item>
                <navbar-item name="Registro" url = "{{route('home')}}"></navbar-item>
                <navbar-item name="Registro" url = "{{route('home')}}"></navbar-item>
                <navbar-item name="Registro" url = "{{route('home')}}"></navbar-item>

                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                        Cerrar Sesión
                    </button>
                </form>

            @endif
        </navbar>

        <main >
            @yield('content')
        </main>

        <footer-Component></footer-Component>
    </div>
    @yield('extra-js')
</body>
</html>
