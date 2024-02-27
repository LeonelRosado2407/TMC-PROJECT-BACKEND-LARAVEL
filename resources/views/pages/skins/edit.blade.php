@extends('layouts.app')

@section('content')
<div class="w-full h-auto p-4 text-left bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
    {{-- breadcrumb --}}
    <div class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{route('home')}}"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Home
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="{{route('skins.index')}}"class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">
                        Tablero Skins
                    </a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="{{route('skins.create')}}"class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">
                        Editar Skin
                    </a>
                </div>
            </li>
        </ol>
    </div>
    {{-- fin de breadcrumb --}}
    <div class="flex flex-col pt-5 pb-5 md:pt-10">
        <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">Editar Skin <span class=" text-green-400">{{ $skin->nombre }}</span></h5>
        <p class="mb-5 text-base text-gray-500 sm:text-lg dark:text-gray-400">Aquí se agregan, actualizan o eliminan las skins disponibles en el juego</p>
    </div>

    {{-- incio del formulario --}}
       
    <form class="max-w-full mx-auto" action="{{route('skins.update',Crypt::encrypt($skin->id))}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        {{-- campos del formulario --}}
            @include('pages.skins.form')
        {{-- fin de campos de formulario --}}

        <button type="submit" class="text-white bg-yellow-700 hover:bg-yellow-800 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
            Editar Skin
        </button>

    </form>
        {{-- fin del formulario --}}
</div>
@endsection