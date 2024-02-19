@extends('layouts.app')

@section('content')
<section class="bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white flex">
                    Únete a nuestra Aventura
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path d="m12.7 20.7 6.2-7.1c2.7-3 2.6-6.5.8-8.7A5 5 0 0 0 16 3c-1.3 0-2.7.4-4 1.4A6.3 6.3 0 0 0 8 3a5 5 0 0 0-3.7 1.9c-1.8 2.2-2 5.8.8 8.7l6.2 7a1 1 0 0 0 1.4 0Z"/>
                    </svg>  
                </h1>
                
                <form class="space-y-4 md:space-y-6" action="{{route('register')}}" id="submitForm" method="POST">
                    @csrf
                    <div>
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre de Usuario</label>
                        <input type="email" name="name" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Usuario x" required="">
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="demo@gmail.conm" required="">
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                    </div>
                    <div>
                        <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirma Contraseña</label>
                        <input type="password" name="password_confirmation" id="confirm-password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                    </div>
                    <button id="sumbitButon" type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Crear Cuenta</button>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        ¿Ya tienes una cuenta? <a href="{{route('login')}}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Pues Inicia Sesión</a>
                    </p>
                    @if (count($errors)>0)
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                        {{$errors}}
                        </p>
                    @endif
                </form>
            </div>
        </div>
    </div>
  </section>
@endsection

@section('extra-js')
<script type="module">
    $(document).ready(function() {
        const usernameField = $('#username');
        const emailField = $('#email');
        const passwordField = $('#password');
        const passwordConfirmField = $('#confirm-password');
        const submitButton = $('#sumbitButon');

        const errorHTMLPassword = `<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Error! </span>Las contraseñas no coinciden</p>`;
        const errorHTMLRequired = `<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Error! </span>Debes llenar este campo</p>`;
        const errorHTMLPasswordMinCarac = `<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Error! </span> Debe tener unn mínimo de 8 caracteres</p>`;

        function showError(parent, errorMessage) {
            let errorElement = parent.find("p");

            if (errorElement.length !== 0) {
                errorElement.remove();
            }

            parent.append(errorMessage);
        }

        function checkPasswords() {
            let passwordParent = passwordField.parent();
            let confirmPasswordParent = passwordConfirmField.parent();

            let passwordValue = passwordField.val();
            let confirmPasswordValue = passwordConfirmField.val();

            if (passwordValue !== confirmPasswordValue) {
                showError(passwordParent, errorHTMLPassword);
                // console.log('Las contraseñas no coinciden');
            } else {
                passwordParent.find("p").remove();
                confirmPasswordParent.find("p").remove();
            }

            if (passwordValue.length < 8 ) {
                showError(passwordParent,errorHTMLPasswordMinCarac);   
            }else{
                passwordParent.find("p").remove();
            }
            
            if (confirmPasswordValue.length < 8 ) {
                showError(confirmPasswordParent,errorHTMLPasswordMinCarac);   
            }else{
                confirmPasswordParent.find("p").remove();
            }
        }


        function checkRequired(){
            let validation = false;
            let requiredInputs = $('input[required]');
            // console.log(requiredInputs);

            if (requiredInputs.length != 0) {
                requiredInputs.each((index,element)=>{
                    let input = $(element)

                    input.parent().find('p').remove()

                    if (input.val() == null || input.val() == '') {
                        validation = true
                        input.parent().append(errorHTMLRequired);
                    }else{
                        input.parent().find('p').remove()
                    }
                });
            }
            return validation

        }


        passwordField.on('change', checkPasswords);
        passwordConfirmField.on('change', checkPasswords);

        submitButton.on('click',function (e) {
            let validate = false;
            e.preventDefault();
            validate = checkRequired();
            if (!validate) {
                $('#submitForm').submit();
            }
        })
    });
</script>
@endsection
