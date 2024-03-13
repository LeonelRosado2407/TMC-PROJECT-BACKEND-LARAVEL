<template>
    <div>   
            
        <h3 class="text-3xl font-bold dark:text-white">Vamos a terminar la compra</h3>
        <br/>
        <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
        </div>
        <br/>
        <div v-show="error" class="p-4 mb-4 text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800" role="alert">
            <div class="flex items-center">
                    <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <h3 class="text-lg font-medium">Alerta de Datos</h3>
            </div>
            <div class="mt-2 mb-4 text-sm">
                No llenaste datos de la targeta
            </div>
        </div>
        <form class="max-w-sm mx-auto"  @submit.prevent="comprar">
            
            <label for="card-number-input" class="sr-only">Nombre Completo</label>
            <div class="relative">
                <input v-model="nombrecompleto" id="nombrecompleto" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pe-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nombre completo " required />
            </div>
            <br/>
            <label for="card-number-input" class="sr-only">Card number:</label>
            <div class="relative">
                <input  v-model="cardnumber" id="" type="text"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pe-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="4242 4242 4242 4242" pattern="^4[0-9]{12}(?:[0-9]{3})?$" required />
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
                    <input v-model="cardexpiration" id="" datepicker-format="mm/yy"  type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="12/23" required />
                </div>
                <div class="col-span-1">
                    <label for="cvv-input" class="sr-only">Card CVV code:</label>
                    <input v-model="cvv" id="" type="number" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="CVV" required />
                </div>
                
            </div>
            <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Comprar ahora</button>
        </form>
        
</div>



</template>
<script>
import axios from 'axios';
export default {
    props: {
 
        idskin : String,
        token : String,
        url : String
    },
    data() {
        return {
            nombrecompleto: 'Adolfo Vazquez', // Declaración de la variable nombrecompleto
            cardnumber: '4242424242424242',
            cardexpiration: '02/26',
            cvv: '123',
            laravelToken: "{{ csrf_token() }}", // Corrección en la interpolación de cadena
            llave_publica: "pk_test_51MphmPCDNl3JvMLGy0yFDkhYo6XuCdu2fJpVdVqziaj0y8IX7f8NzUTGLHNGdy7KJslgvMyRlXqvcFmprprShAUM00XubZw16Q",
            idSkin : this.idskin,
            tokenlaravel: this.token,
            url: this.url,
            mostrarModal: false

        };
    },
    methods: {
        comprar() {
            this.mostrarModal = true;

            const comp = this;

            const exp = this.cardexpiration.split('/');
            console.log(this.nombrecompleto);
            console.log(this.cardnumber);
            console.log(this.cardexpiration);
            console.log(this.cvv);
            console.log(this.laravelToken);
            console.log(exp[0]);
            console.log(exp[1]);

         
            
            Stripe.setPublishableKey(this.llave_publica);
            
            Stripe.createToken({

                number:this.cardnumber,
                cvc:this.cvv,
                exp_month:exp[0],
                exp_year: exp[1],



            }, function(status, response){

                if(response.error){
                    console.error('Error al crear el token:', response.error.message);
                    //const error = true;
                    alert('Error al pedir el token');

                }
                else{
                    console.log('Token creado exitosamente:', response.id);
                    const token_pago =  response.id;


                    var datos = {

                        idskin: comp.idSkin,
                        laraveltoken: comp.token,
                        stripetoken: token_pago,
                        nombrecompleto: comp.nombrecompleto,
                        hola: "Hola esto es un dato"

                    };

            
                    axios.post(
                        comp.url,datos
                        

                    ).then(
                        (response) => {
                            console.log(response)
                           


                        }
                    ).catch(
                        (error)=>{
                            console.error(error);
                        }
                    )
                }
            })
            

            
            
        },
    },
    mounted() {

        
    
    },
};
</script>
