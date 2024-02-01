<template>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <slot></slot>
        </table>
    </div>
</template>
    
<script>
        export default { 
            mounted() {
                //console.log('Component mounted.')
            }
        }
</script>
    