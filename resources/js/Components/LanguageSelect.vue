  
  <script setup>
  import { useForm } from "@inertiajs/vue3";
  
  let form = useForm({
    idiomSelect: "",
  });
  
  let props = defineProps({
    traductions: Object,
    user:Object

  });
let langact= props.user.language;
console.log(langact);
  const submit = () => {
    form.post(route('idiom_save')).then(() => {
    window.location.reload();
  });  };

  const selectLanguage = (language) => {
    form.idiomSelect = language;
    submit();
  };
  </script>
<template>
    <div class="flags-container">
        <button @click="selectLanguage('ca')" :class="{ 'active-flag': langact === 'ca' }" class="flag-button">
            <img class="flag" src="../../assets/img/catalunya.png" alt="Català">
        </button>
        <button @click="selectLanguage('es')" :class="{ 'active-flag': langact === 'es' }" class="flag-button">
            <img class="flag" src="../../assets/img/spain.png" alt="Castellano">
        </button>
        <button @click="selectLanguage('en')" :class="{ 'active-flag': langact === 'en' }" class="flag-button">
            <img class="flag" src="../../assets/img/united-states.png" alt="English">
        </button>
    </div>
</template>

<style>
.flags-container {
    display: flex;
    justify-content: center;
    align-items: center;
}

.flag-button {
    margin: 10px;
    border: none;
    border-radius: 10px;
}

.flag {
    border-radius: 48px; /* Bordes redondeados */
    border: 2px solid whitesmoke;
    width: 48px;
    height: 48px; /* Tamaño de las imágenes */
}
.active-flag {
    border-radius: 48px;
    border:2px solid green; /* Color del borde activo */


}
</style>
