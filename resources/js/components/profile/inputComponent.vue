<template>
    <div class="relative z-0 w-full mb-5 group">
        <input :type="type" :name="name" id="input"
            class="block py-2.5 px-0 w-full text-lg text-gray-300 bg-transparent border-0 border-b-2 border-green-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer"
            placeholder=" " style="border-image: linear-gradient(to right, #0E9F6E, #3F83F8) 1;"
            v-model="inputValue"
            >
        <label for="input"
            class=" peer-focus:font-medium absolute text-lg text-white duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-[5px] peer-focus:text-green-300  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-6">
            {{texto}}
        </label>
    </div>
</template>

<script>
export default {
    props:{
        name: {String, required: true},
        type: {String, default: 'text'},
        texto: {String, required: true},
        value: {String, default: ''},
    },
    data(){
        return {
            inputValue: this.value
        }
    },
    mounted(){
        console.log(this.value);
    }
} 

</script>