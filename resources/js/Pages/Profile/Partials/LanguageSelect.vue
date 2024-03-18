<script setup>
import { useForm } from "@inertiajs/vue3";



let form = useForm({
    idiomSelect: "",
});
let props=defineProps({
    traductions:Object
});

const submit = () => {
console.log(form.idiomSelect)
 form.post(route('idiom_save'));
};
</script>

<template>

<div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg flex">
                    <div>Idioma
                        <div>
                        </div>
                        <form @submit.prevent="submit" class="flex flex-col" style="display: flex;
                            flex-direction: column;
                            justify-content: center;
                            align-items: center;">
                            <select v-model="form.idiomSelect">
                                <option value="ca" >Catalan</option>
                                <option value="es">Castellano</option>
                                <option value="en">Ingles</option>
                            </select>
                            <button type="sumbit"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 w-50"
                            >
                            {{ props.traductions.save }}
                            </button>                  
                        </form>
                    </div>
                </div>
</template>
