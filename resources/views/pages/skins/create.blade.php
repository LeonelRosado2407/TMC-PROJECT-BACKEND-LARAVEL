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
                        Agregar Skins
                    </a>
                </div>
            </li>
        </ol>
    </div>
    {{-- fin de breadcrumb --}}
    <div class="flex flex-col pt-5 pb-5 md:pt-10">
        <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">Agregar Skin</h5>
        <p class="mb-5 text-base text-gray-500 sm:text-lg dark:text-gray-400">Aquí se agregan, actualizan o eliminan las skins disponibles en el juego</p>
    </div>

    {{-- incio del formulario --}}
       
    <form class="max-w-full mx-auto" action="{{route('skins.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- campos del formulario --}}
        <div class="grid md:grid-cols-2 mb-5 w-full">
            <div>
                <div class="relative z-0 w-full mb-5 pr-10 group">
                    <input-required 
                    name="name" 
                    texto="Nombre de la Skin" 
                    @if (isset($errors) && $errors->has('name'))
                        error="{{$errors->first('name')}}"
                    @else
                        error="El nombre de la skin es requerido"
                    @endif
                    tipo-input="text"
                    ></input-required>
                </div>
                <div class="relative z-0 w-full mb-5 pr-10 group">
                    <input-required 
                    name="price" 
                    texto="Precio de la Skin" 
                    @if (isset($errors) && $errors->has('price'))
                        error="{{$errors->first('price')}}"
                    @else
                        error="El precio de la skin es requerido"
                    @endif
                    tipo-input="number"
                    ></input-required>
                </div>

                <div class="relative z-0 w-full mb-5 pr-10 group">
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estatus de la Skin</label>
                    <select id="countries" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                      <option selected value="{{True}}">Alta</option>
                      <option value="{{false}}">Baja</option>
                    </select>
                    @if (isset($errors) && $errors->has('status'))
                        @error('status')
                            <p class="text-xs text-red-500 dark:text-red-400">{{$message}}</p>
                        @enderror
                    @endif
                </div>
            </div>

            <upload-file></upload-file> 

        </div>
        {{-- fin de campos de formulario --}}

        <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
            Agregar Skin
        </button>

    </form>
        {{-- fin del formulario --}}
        @endsection
