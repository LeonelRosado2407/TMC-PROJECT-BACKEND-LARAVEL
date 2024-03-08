
@extends('layouts.app')

@section('extra-script')
<script src="https://js.stripe.com/v2/"></script>
@endsection

@section('content') 

<div class="grid grid-cols-2 gap-2 text-center bg-purple border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-purple-800 dark:border-gray-700">
        
        <div>
            <h1 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl sm:space-y-5 sm:space-x-10 rtl:space-x-reverse">
                <span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">{{ $skins -> nombre }}</span>
            </h1>
            <div></div>
            <img class="h-auto max-w-lg transition-all duration-300 rounded-lg blur-sm hover:blur-none" src="{{ $skins -> imagen}}" alt="image description">
            <div class="flex items-center md:text-4xl lg:text-5xl">
                <h4 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                    $<span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-green-300">{{ $skins -> precio }}</span>
                </h4>
            </div>
        </div>
        

        <div>   
            
                <h3 class="text-3xl font-bold dark:text-white">Vamos a terminar la compra</h3>
                <br/>
                <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
                <span class="font-medium">Usuario: {{ $user -> name }}</span> <span class="font-medium">Correo: {{ $user -> email }}</span>
                </div>
                <br/>
                <form class="max-w-sm mx-auto">
                    
                    <label for="card-number-input" class="sr-only">Nombre Completo</label>
                    <div class="relative">
                        <input type="text" id="nombre-completo-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pe-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nombre completo " required />
                    </div>
                    <br/>
                    <label for="card-number-input" class="sr-only">Card number:</label>
                    <div class="relative">
                        <input type="text" id="card-number-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pe-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="4242 4242 4242 4242" pattern="^4[0-9]{12}(?:[0-9]{3})?$" required />
                        <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                            <svg fill="none" class="h-6 text-[#1434CB] dark:text-white" viewBox="0 0 36 21"><path fill="currentColor" d="M23.315 4.773c-2.542 0-4.813 1.3-4.813 3.705 0 2.756 4.028 2.947 4.028 4.332 0 .583-.676 1.105-1.832 1.105-1.64 0-2.866-.73-2.866-.73l-.524 2.426s1.412.616 3.286.616c2.78 0 4.966-1.365 4.966-3.81 0-2.913-4.045-3.097-4.045-4.383 0-.457.555-.957 1.708-.957 1.3 0 2.36.53 2.36.53l.514-2.343s-1.154-.491-2.782-.491zM.062 4.95L0 5.303s1.07.193 2.032.579c1.24.442 1.329.7 1.537 1.499l2.276 8.664h3.05l4.7-11.095h-3.043l-3.02 7.543L6.3 6.1c-.113-.732-.686-1.15-1.386-1.15H.062zm14.757 0l-2.387 11.095h2.902l2.38-11.096h-2.895zm16.187 0c-.7 0-1.07.37-1.342 1.016L25.41 16.045h3.044l.589-1.68h3.708l.358 1.68h2.685L33.453 4.95h-2.447zm.396 2.997l.902 4.164h-2.417l1.515-4.164z"/></svg>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-4 my-4">
                        <div class="relative max-w-sm col-span-2">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                </svg>
                            </div>
                            <label for="card-expiration-input" class="sr-only">Card expiration date:</label>
                            <input  datepicker datepicker-format="mm/yy" id="card-expiration-input" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="12/23" required />
                        </div>
                        <div class="col-span-1">
                            <label for="cvv-input" class="sr-only">Card CVV code:</label>
                            <input type="number" id="cvv-input" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="CVV" required />
                        </div>
                        
                    </div>
                    <button id="comprar-btn" type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Comprar ahora</button>
                </form>
        </div>
    
</div>
@endsection

@section('extra-js') 

<script>

    var llave_publica = 'pk_test_51MphmPCDNl3JvMLGy0yFDkhYo6XuCdu2fJpVdVqziaj0y8IX7f8NzUTGLHNGdy7KJslgvMyRlXqvcFmprprShAUM00XubZw16Q';
    //var stripe = Stripe('pk_test_51MphmPCDNl3JvMLGy0yFDkhYo6XuCdu2fJpVdVqziaj0y8IX7f8NzUTGLHNGdy7KJslgvMyRlXqvcFmprprShAUM00XubZw16Q');
    var laravel_token = '{{ csrf_token() }}';
    
    document.addEventListener('DOMContentLoaded', function () {

    var llave_publica = 'pk_test_51MphmPCDNl3JvMLGy0yFDkhYo6XuCdu2fJpVdVqziaj0y8IX7f8NzUTGLHNGdy7KJslgvMyRlXqvcFmprprShAUM00XubZw16Q';
    //var stripe = Stripe('pk_test_51MphmPCDNl3JvMLGy0yFDkhYo6XuCdu2fJpVdVqziaj0y8IX7f8NzUTGLHNGdy7KJslgvMyRlXqvcFmprprShAUM00XubZw16Q');
    var laravel_token = '{{ csrf_token() }}';

    const comprarBtn = document.getElementById('comprar-btn');

    comprarBtn.addEventListener('click', function (event) {
        event.preventDefault();

        // Obtener valores de los campos del formulario
        const nombreCompleto = document.getElementById('nombre-completo-input').value;
        const cardNumber = document.getElementById('card-number-input').value;
        const cardExpiration = document.getElementById('card-expiration-input').value;
        const cvv = document.getElementById('cvv-input').value;
        const [mes, ano] = cardExpiration.split('/');

        

        // Imprimir en la consola los valores obtenidos
        console.log('Nombre Completo:', nombreCompleto);
        console.log('Número de Tarjeta:', cardNumber);
        console.log('Fecha de Expiración:', cardExpiration);
        console.log('CVV:', cvv);
        console.log('Mes:', mes);
        console.log('Año:', ano);


        Stripe.setPublishableKey(llave_publica);


        Stripe.createToken({

            number:cardNumber,
            cvc:cvv,
            exp_month:mes,
            exp_year: ano
        

        }, function(status, response) {
        
        if (response.error) {
            

            console.error('Error al crear el token:', response.error.message);
        } else {
            

            console.log('Token creado exitosamente:', response.id);
        }
        });
    
       

        
    });
});



</script>
@endsection
