<template>
    <li>
        <a :href="url" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" >
            <path :d="d1"/>
            <path :d="d2"/>
        </svg>
        <span class="ms-3">{{ name }}</span>
        </a>
    </li>
</template>

<script>
    export default {
        props:{
            name : String,
            url : String,
            d1 : String,
            d2 : String
        }
    }
</script>