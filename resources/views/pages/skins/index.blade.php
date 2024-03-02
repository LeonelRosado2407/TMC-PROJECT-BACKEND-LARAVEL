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
        </ol>
    </div>
    {{-- fin de breadcrumb --}}
    <div class="flex flex-col md:flex-row pt-5 pb-5 md:pt-10">
        <div>
            <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">Skins</h5>
            <p class="mb-5 text-base text-gray-500 sm:text-lg dark:text-gray-400">Aquí se agregan, actualizan o eliminan las skins disponibles en el juego</p>
        </div>
        <div class="md:ml-auto">
            <a href="{{route('skins.create')}}" class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
                <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                Agregar una Skin Nueva
                </span>
            </a>
        </div>
    </div>

    {{-- tabla --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Imagen
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nombre de la Skin
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Precio
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Estatus
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($skins as $skin)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <img src="{{ $skin->imagen }}" alt="Imagen de la Skin" class="w-24 h-auto">
                        </th>
                        <td class="px-6 py-4">
                            {{$skin->nombre}}
                        </td>
                        <td class="px-6 py-4">
                            $ {{number_format($skin->precio,2)}}
                        </td>
                        <td class="px-6 py-4">
                            @if ($skin->estatus)
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">Activo</span>
                            @else
                                <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">Inactivo</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 ">
                            <div class="flex flex-col md:flex-row">
                                <form action="{{route('skins.edit',Crypt::encrypt($skin->id))}}" method="GET">
                                    <button type="submit" class="px-2 py-1 font-semibold leading-tight text-yellow-500 bg-yellow-100 rounded-full dark:bg-yellow-500 dark:text-yellow-100" >Editar</button>
                                </form>
    
                                @if ($skin->estatus)
                                    <form action="{{route('skins.destroy',Crypt::encrypt($skin->id))}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-2 py-1 font-semibold leading-tight text-red-500 bg-red-100 rounded-full dark:bg-red-500 dark:text-red-100" >Eliminar</button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        
        {{$skins->links()}}

    </div>
    {{-- fin de la tabla --}}
        
</div>
@include('helpers.alert')

@endsection

@section('extra-scripts')
@endsection
