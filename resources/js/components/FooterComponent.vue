
<template>
    <footer class="bg-white rounded-lg shadow dark:bg-gray-900 m-4">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <a href="https://flowbite.com/" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                    <img src="black/img/monone.png" class="h-8" alt="Flowbite Logo" />
                    <span class="font-gomarice self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Calevz</span>
                </a>
                <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                    <li>
                        <a href="#" class="font-gomarice hover:underline me-4 md:me-6">Sobre nosotros</a>
                    </li>
                    <li>
                        <a href="#" class="font-gomarice hover:underline me-4 md:me-6">Politica de privacidad</a>
                    </li>
                    <li>
                        <a href="#" class="font-gomarice hover:underline me-4 md:me-6">Contactanos</a>
                    </li>
                    <li>
                        <a href="#" class="font-gomarice hover:underline">Terminos y condiciones</a>
                    </li>
                </ul>
            </div>
            <hr class="font-gomarice my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <span class="font-gomarice block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href="https://flowbite.com/" class="hover:underline">Calevz™</a>. Donde robamos tus derechos.</span>
        </div>
    </footer>
</template>

<script>
    const currentDate = new Date();
    const currentYear = currentDate.getFullYear();

    export default {
        data() {
            return {
                currentYear : currentYear
            }
        }
    }
</script>