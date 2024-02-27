<template>
    <div class="w-full flex flex-col md:flex-row">
        <div v-if="image" :class="{'w-full': !image, 'md:w-1/2': image}" class="h-auto flex items-center justify-center">
            <img  :src="image" alt="Uploaded Image" class="m-5 w-96" />
        </div>

        <div class="relative flex z-0 mb-5 group" :class="{'w-full': !image, 'md:w-1/2': image}" >
            <div class="flex items-center justify-center w-full">
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF </p>
                    </div>
                    <input name="imgUpload" id="dropzone-file" type="file" accept="image/*" class="hidden"  @change="handleFiles" />
                </label>
            </div> 
        </div>
    </div>

</template>

<script>
    export default {
        props:{
            value: {String, default: ''}
        },
        data() {
            return {
                image: this.value
            };
        },
        methods: {
            handleFiles(e) {
                const file = e.target.files[0];
                this.image = URL.createObjectURL(file);
            }
        },
        mounted(){
            // console.log('Component mounted.');
        }
    }
</script>