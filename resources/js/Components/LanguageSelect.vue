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
const submitForm = () => {
      // Llama al método handleSubmit al seleccionar una opción
      submit();
    };

</script>

<template>
<form @submit.prevent="submit" style="display: flex;
                            flex-direction: column;
                            justify-content: center;
                            align-items: center;">
        <select v-model="form.idiomSelect" @change="submitForm">
            <option default value="">Idioma</option>
            <option value="ca" >Catalan</option>
            <option value="es">Castellano</option>
            <option value="en">Ingles</option>
        </select>
</form>
</template>

<style>
select{
    border:none;
}
</style>
