@extends('layouts.app')
 
@section('content')
<div class="bg-gray-50 dark:bg-gray-900">
    <!-- Banner Section -->
    <div class="py-20 bg-gradient-to-r from-blue-500 to-blue-600 text-center text-white">
        <h2 class="text-3xl mb-6">Hola papuritas</h2>
        <p class="leading-relaxed">This is a simple example of a landing page using tailwind css and flowbite.</p>
    </div>

    <!-- Intermediate section -->
    <div class="py-16 grid lg:grid-cols-3 gap-6 items-start max-w-7xl mx-auto px-4">
        
        <div>
            <img class="w-full h-60 object-cover mb-4 rounded" src="/path/to/image" alt="intermediate image">
            <h3 class="text-xl font-bold mb-2">Title</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
        </div>

        <div>
            <img class="w-full h-60 object-cover mb-4 rounded" src="/path/to/image" alt="intermediate image">
            <h3 class="text-xl font-bold mb-2">Title</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
        </div>

        <div>
            <img class="w-full h-60 object-cover mb-4 rounded" src="/path/to/image" alt="intermediate image">
            <h3 class="text-xl font-bold mb-2">Title</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
        </div>

    </div>
</div>

@endsection
