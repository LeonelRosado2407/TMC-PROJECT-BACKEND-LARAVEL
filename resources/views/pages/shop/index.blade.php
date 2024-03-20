
@extends('layouts.app')

@section('content')
<div class="w-full h-full bg-gray-900  bg-repeat bg-blend-soft-light" style="background-image: url({{asset('black/img/fondo.png')}})">
    {{-- sección de título --}}
    <div class="flex flex-col p-5 md:flex-row w-full h-auto md:pl-10 md:ml-10">
        <div class="w-full md:w-1/2">
            <h1 class="mb-0.5 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl animate-pulse">
                <span class="text-transparent font-gomarice bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Tienda</span>
            </h1>
        </div>
    </div>
    {{-- fin de sección de titulo --}}

    {{-- sección de destacados --}}
    <h2 class=" pl-5 md-5 md:pl-10 md:ml-10 text-4xl font-gomarice dark:text-white">Destacados</h2>
    <div class="flex flex-col md:flex-row">
        {{-- galeria de skins --}}
        <div id="gallery" class="relative w-full md:w-1/2  p-5" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-56 md:h-96 overflow-hidden rounded-lg">
                <!-- Item 1 -->
                @foreach($skins as $skin)
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{$skin -> imagen}}" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
                </div>
                @endforeach
                <!-- Item 2 -->
                
            </div>
            <!-- Slider controls -->
            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
        {{-- fin de galeria de skins --}}
            
        {{-- skins con descuento --}}
        <div class="w-full md:w-1/2 p-5">
        <h2 class="mb-4 text-4xl font-gomarice leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white"><span class="text-purple-600 dark:text-purple-500">Hey tu!!!!, Si tu , ¿Que no vas a Comprar?</span>   
        <br/>
        att: Mon</h2>
            <p class="text-4xl font-rocko text-gray-500 lg:text-xl dark:text-gray-400">Te perderas de presumir a los demas estas skins, jajajajjaja</p>
             <span class="text-green-600 font-rocko dark:text-green-500">No importa si es problema de plata puedes Ahorras las monedas del juego :( </span>
            <div class="h-5 md:h-10"></div>

        </div>
        {{-- fin de skins con descuento --}}
    </div>
    {{-- fin de destacados --}}

    {{-- sección de skins diarias--}}
    <h2 class=" pl-5 md-5 md:pl-10 md:ml-10 text-4xl font-rocko dark:text-white">Todas las Rutas</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 p-5 md:p-10">
        @foreach($skins as $skin)
        <div>
            <div class="w-full max-w-96 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="p-8 rounded-t-lg w-90 h-64" src="{{ $skin -> imagen}}" alt="{{ $skin -> nombre}}" />
                </a>
                <div class="px-5 pb-5">
                    <a href="#">
                        <h5 class="text-xl font-gomarice tracking-tight text-gray-900 dark:text-white">{{ $skin -> nombre }}</h5>
                    </a>
                    <div class="flex items-center justify-between">
                        <span class="text-3xl font-gomarice text-gray-900 dark:text-white">{{ $skin -> precio }}</span>
                        <br> 
                        <br/>
                    </div>
                    <div class="flex items-center justify-between">
                        <button class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800"
                        >
                        <a href="{{ route('payment', ['id' => $skin-> id ]) }}" class=" font-gomarice relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                            Comprar
                        </a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{-- final de sección de skins diarias --}}
    
</div>
@endsection
