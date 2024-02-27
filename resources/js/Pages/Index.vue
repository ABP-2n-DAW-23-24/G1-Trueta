<script setup>
import { ref,defineProps  } from 'vue';

import Footer from '@/Components/Footer.vue';
import Logo from '@/Components/Logo.vue';
import Aside from '@/Components/Aside.vue';
import Wizard from '@/Components/Wizard.vue';

const props = defineProps(['Surgeries']);
const surgeries = ref(props.Surgeries);
</script>

<template>
    <body>
        <Logo class="logo" />
        <Aside class="aside" :surgeries="surgeries" />
        <Wizard class="main" />
    </body>
    <Footer />
</template>

<style scoped> .logo {
     grid-area: logo;


 }

 .aside {
     grid-area: aside;

 }

 .main {
     grid-area: main;
 }


 body {
     margin: 0;
     padding: 0;
     display: grid;
     grid-template-areas:
         'logo main'
         'aside main';
     grid-template-columns: 1fr 4fr;
        grid-template-rows: 100px 1fr;
     height: 100vh;

 }


 .main {
     background-color: green;


 }
</style>

