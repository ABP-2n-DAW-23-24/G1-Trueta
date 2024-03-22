  
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
    gap: 8px;
    background-color: #D9D9D9;
    height: 50px;
    border-radius: 10px;
    padding: 5px 15px;

}

.flag {
    border-radius: 48px; /* Bordes redondeados */
    border: 2px solid whitesmoke;
    width: 35px;
    height: 35px; /* Tamaño de las imágenes */
}
.active-flag {
    border-radius: 50px;
    border:2px solid #ff9100;
}


</style>
