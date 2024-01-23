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
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="h-full w-full bg-gray-50 dark:bg-gray-900"> 
    <div id="app">
        <navbar url="{{route('home')}}" image="{{asset("black/img/monone.png")}}">
            @if (Auth::check())
                <navbar-item name="Login" url ="{{route('registroApi')}}"></navbar-item>
                <navbar-item name="Registro" url ="{{route('registroApi')}}"></navbar-item>
                <navbar-item name="Registro" url ="{{route('registroApi')}}"></navbar-item>
                <navbar-item name="Registro" url ="{{route('registroApi')}}"></navbar-item>
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
