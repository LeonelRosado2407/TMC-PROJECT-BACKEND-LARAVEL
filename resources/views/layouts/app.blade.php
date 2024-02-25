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

                {{-- userDropdown --}}
                <img id="avatarButton" type="button" data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start" class="w-10 h-10 rounded-full cursor-pointer ring-2 ring-blue-500 transition duration-300 ease-in-out hover:ring-4 hover:ring-blue-700" src="{{asset('black/img/monone.png')}}" alt="User dropdown">


                <!-- Dropdown menu -->
                <div id="userDropdown" class=" z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600  border-blue-500 ring-2 ring-blue-500">
                    <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                        <div>{{auth()->user()->name}}</div>
                        <div class="font-medium truncate">{{auth()->user()->email}}</div>
                        </div>
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="avatarButton">
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                        </li>
                        </ul>
                        <div class="py-1 flex items-center justify-center">
                            <form action="{{route('logout')}}" method="POST">
                                @csrf
                                <button type="submit" class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-500 to-pink-500 group-hover:from-purple-500 group-hover:to-pink-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800">
                                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                    Cerrar Sesión
                                    </span>
                                </button>
                            </form>
                    </div>
                </div>


            @else
                @if (!Str::contains(request()->path(), 'login') && !Str::contains(request()->path(), 'register'))
                <a href="{{route('login')}}" class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                    Iniciar Sesión
                    </span>
                </a>

                <a href="{{route('register')}}" class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                    Regístrate
                    </span>
                </a>

                @endif
        
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
