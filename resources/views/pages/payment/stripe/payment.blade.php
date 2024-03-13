
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
        
        <paycart token='{{ csrf_token() }} ' url='{{route("makePayment")}}' idskin="{{ $skins -> id }}" > </paycart>
                
        </div>
        
 
</div>
@endsection

@section('extra-js') 

<script>
  var llave_publica = 'pk_test_51MphmPCDNl3JvMLGy0yFDkhYo6XuCdu2fJpVdVqziaj0y8IX7f8NzUTGLHNGdy7KJslgvMyRlXqvcFmprprShAUM00XubZw16Q';
  var laravel_token = '{{ csrf_token() }}';

    
 
//     document.addEventListener('DOMContentLoaded', function () {

//     var llave_publica = 'pk_test_51MphmPCDNl3JvMLGy0yFDkhYo6XuCdu2fJpVdVqziaj0y8IX7f8NzUTGLHNGdy7KJslgvMyRlXqvcFmprprShAUM00XubZw16Q';
//     //var stripe = Stripe('pk_test_51MphmPCDNl3JvMLGy0yFDkhYo6XuCdu2fJpVdVqziaj0y8IX7f8NzUTGLHNGdy7KJslgvMyRlXqvcFmprprShAUM00XubZw16Q');
//     var laravel_token = '{{ csrf_token() }}';

//     const comprarBtn = document.getElementById('comprar-btn');

//     comprarBtn.addEventListener('click', function (event) {
//         event.preventDefault();

//         // Obtener valores de los campos del formulario
//         const nombreCompleto = document.getElementById('nombre-completo-input').value;
//         const cardNumber = document.getElementById('card-number-input').value;
//         const cardExpiration = document.getElementById('card-expiration-input').value;
//         const cvv = document.getElementById('cvv-input').value;
//         const [mes, ano] = cardExpiration.split('/');
//         const idskin = document.getElementById('idskin').value;

        

//         // Imprimir en la consola los valores obtenidos
//         console.log('Nombre Completo:', nombreCompleto);
//         console.log('Número de Tarjeta:', cardNumber);
//         console.log('Fecha de Expiración:', cardExpiration);
//         console.log('CVV:', cvv);
//         console.log('Mes:', mes);
//         console.log('Año:', ano);
//         console.log('id skin:', idskin);
//         console.log('token laravel', laravel_token)

 


//         Stripe.setPublishableKey(llave_publica);


//         Stripe.createToken({

//             number:cardNumber,
//             cvc:cvv,
//             exp_month:mes,
//             exp_year: ano
        

//         }, function(status, response) {
        
//         if (response.error) {
            

//             console.error('Error al crear el token:', response.error.message);
//             //const error = true;
//             alert('Error al pedir el token');
//         } else {
            
//             console.log('Token creado exitosamente:', response.id);
//             const token_pago =  response.id;

//             var datos = {

//                 idskin: idskin,
//                 _token:  laravel_token,
//                 token_stripe: token_pago

//             };
            

                    
            
//         }
//         });
    
       

        
//     });
// });



</script>
@endsection
