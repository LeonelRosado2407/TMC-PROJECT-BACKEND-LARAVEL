<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    @yield('extra-css')
    

    <!-- Incluye jQuery -->
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="h-full w-full bg-gray-50 dark:bg-gray-900"> 
    <div id="app">
        @include('layouts.navbar')

        <main class="mt-20">
            @yield('content')
        </main>

        <footer-Component></footer-Component>
    </div>
    @yield('extra-js')
</body>
</html>
