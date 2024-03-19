
@extends('layouts.app')

@section('extra-script')
<script src="https://js.stripe.com/v2/"></script>
@endsection

@section('content') 

<div class="grid grid-cols-2 gap-2 text-center bg-purple border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-purple-800 dark:border-gray-700">
        
        <div>
            <img class="h-auto max-w-lg transition-all duration-300 rounded-lg blur-sm hover:blur-none" src="{{ $skins -> imagen}}" alt="image description">
            <div class="flex items-center md:text-4xl lg:text-5xl">
                <h4 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                    $<span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-green-300">{{ $skins -> precio }}</span>
                </h4>
            </div>
        </div>
        

        <div>   
        
        <paycart token='{{ csrf_token() }} ' url='{{route("makePayment")}}' idskin="{{ $skins -> id }}" urlshop='{{route("shop")}}' > </paycart>
                
        </div>
        
 
</div>
@endsection

@section('extra-js') 

<script>

</script>
@endsection
