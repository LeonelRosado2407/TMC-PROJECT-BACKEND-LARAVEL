@extends('layouts.app')


@section('content')
    {{-- jumbotron --}}
    <marquee behavior="scroll" direction="left" scrollamount="10" class="text-white font-gomarice bg-black">The Coconuts Monkey</marquee>

    <section class="bg-center bg-no-repeat  bg-gray-900 bg-blend-multiply"  style="background-image: url('{{asset('black/img/fondo.png')}}')">
        {{-- <section class="bg-center bg-no-repeat bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/conference.jpg')] bg-gray-900 bg-blend-multiply"> --}}
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
            <div class="flex  space-y-4 flex-row justify-center ">
                <img src="{{ asset('black/img/monone.png') }}" alt="Logo 1" class="w-16 h-16 md:w-32 md:h-32 lg:w-64 lg:h-64 mr-4">
                <img src="{{ asset('black/img/Abreviatura TMC.png') }}" alt="Logo 2" class="w-16 h-16 md:w-32 md:h-32 lg:w-64 lg:h-64 sm:w-16 sm:h-16">
            </div>
            <h1 class="mb-4 text-2xl font-gomarice text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">The Cococnuts Monkey</h1>
        </div>
    </section>
    

    {{-- pruebas --}}
    <section class="bg-center bg-no-repeat bg-gray-900 bg-blend-multiply" >
    <div class="video-container flex items-center justify-center space-x-5">
        <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="p-5">
                <video class="max-w-medium h-auto max-w-full mt-2 mx-2" controls>
                    <source src="black/img/1.mp4" type="video/mp4">
                    Tu navegador no soporta la etiqueta de video.
                </video>
            </div>
            <div class="px-5 pb-5">
                    <h5 class="text-2xl font-rocko font-semibold tracking-tight text-gray-900 dark:text-white">Exploracion</h5>
                    <h2 class="text-m font-gomarice tracking-tight text-withe-900 dark:text-white">Adentrate en las habitaciones de tus roomies
                        busca inspiracion para elaborar la cancion que lograra pagar la renta.
                    </h2>
                </a>
            </div>
        </div>
        <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="p-5">
                <video class="max-w-medium h-auto max-w-full mt-2 mx-2" controls>
                    <source src="black/img/2.mp4" type="video/mp4">
                    Tu navegador no soporta la etiqueta de video.
                </video>
            </div>
            <div class="px-5 pb-5">
                <a href="#">
                    <h5 class="text-2xl font-rocko font-semibold tracking-tight text-gray-900 dark:text-white">Jugabilidad</h5>
                    <h2 class="text-m font-gomarice tracking-tight text-withe-900 dark:text-white">Enfrentate a Promesa, para conseguir 
                        un fragmento de la cancion que salvara a los pratogonistas de vivir en la calle.
                    </h2>
                </a>
            </div>
        </div>
        <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="p-5">
                <video class="max-w-medium h-auto max-w-full mt-2 mx-2" controls>
                    <source src="black/img/3.mp4" type="video/mp4">
                    Tu navegador no soporta la etiqueta de video.
                </video>
            </div>
            <div class="px-5 pb-5">
                <a href="#">
                    <h5 class="text-2xl font-rocko font-semibold tracking-tight text-gray-900 dark:text-white">Minijuego</h5>
                    <h2 class="text-m font-gomarice tracking-tight text-withe-900 dark:text-white">Haz visto una skin que te guste pero eres pobre?
                        bueno con nuestro pequeño mini juego ayuda a mon a conseguir monedas para comprar una skin sin gastar dinero real :D
                    </h2>
                </a>
            </div>
        </div>
    </div>
    </section>


    {{-- pruebas --}}







    {{-- carrusel --}}

    <div id="default-carousel" class="relative w-full" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative  overflow-hidden rounded-lg md:h-[800px] h-56">
            <!-- Item 1 -->
            <div class="hidden duration-1100 ease-in-out" data-carousel-item>
                <img src="{{asset('black/img/1.png')}}" class="absolute block w-[50%] h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{asset('black/img/2.png')}}" class="absolute block w-[50%] h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{asset('black/img/3.png')}}" class="absolute block w-[50%] h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
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

    <section class="bg-gray-900">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="font-gomarice max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl text-white">
                    Conoce a King 
                </h1>
                <p class=" font-gomarice max-w-2xl mb-6 font-light lg:mb-8 md:text-lg lg:text-xl text-gray-400">
                    Un ser adicto a League of Legends, la pizza  y a The Weeknd
                </p>
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="{{asset('black/img/sadBoy.png')}}" alt="mockup" class=" rounded-lg">
            </div>                
        </div>
    </section>

    <section class="bg-gray-900">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="{{asset('black/img/pxndx.png')}}" alt="mockup" class=" rounded-lg">
            </div>  
            <div class="ml-auto place-self-center lg:col-span-7">
                <h1 class="font-gomarice max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl text-white">
                    Conoce a Mon y Coco
                </h1>
                <p class=" font-gomarice max-w-2xl mb-6 font-light lg:mb-8 md:text-lg lg:text-xl text-gray-400">
                    Unos malaventurados que no lloran, pero si sufren por la renta
                </p>
            </div>
              
        </div>
    </section>


    {{-- prueba 3 --}}
    <hr class="my-12 h-px border-t-0 bg-transparent bg-gradient-to-r from-transparent via-neutral-500 to-transparent opacity-25 dark:via-neutral-400" />
    {{-- prueba3 --}}
    
        <div class="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-2 text-3xl font-gomarice  font-bold text-gray-900 dark:text-white">Te estamos esperando!!!</h5>
            <p class="mb-5 text-base font-gomarice text-gray-500 sm:text-lg dark:text-gray-400">Sumergete en esta aventura y ayuda a estos foraneos a pagar la renta :D</p>
            <div class="items-center justify-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4 rtl:space-x-reverse">
                <a href="#" >                  
                <button type="button" class=" font-gomarice text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 px-5 py-3 text-base font-medium text-center text-white rounded-lg ">Descarga ya!</button>
                </a>
            </div>
        </div>

 
    {{-- pruebas2 --}}

    




    

    {{-- pruebas2 --}}


    


@endsection
