<template>
    <li>
        <a :href="url" :class="{'text-blue-700': isActive, 'text-gray-100': !isActive}" class="font-gomarice block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">{{name}}</a>
    </li>
</template>

<script>
    export default {
        props:{
            name : String,
            url : String,
            active : String
        },
        mounted(){
            // console.log(this.active);
        },data(){
            return {
                isActive : this.active == "true" ? true : false
            }
        }
    }
</script>