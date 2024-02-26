<script setup>
import Logo from '@/Components/Logo.vue';
import Aside from '@/Components/Aside.vue';
import Wizard from '@/Components/Wizard.vue';
</script>

<template>
    <body>
        <Logo class="logo" />
        <Aside class="aside" />
        <Wizard class="main" />
    </body>
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
     height: 100%;

 }


 .main {
     background-color: green;


 }
</style>

