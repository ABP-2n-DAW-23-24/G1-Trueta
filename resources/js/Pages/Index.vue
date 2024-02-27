<script setup>
import { ref,defineProps  } from 'vue';

import Footer from '@/Components/Footer.vue';
import Logo from '@/Components/Logo.vue';
import Aside from '@/Components/Aside.vue';
import Wizard from '@/Components/Wizard.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Index" />
    <div class="parent">
        <div class="col-left">
            <Logo class="logo" />
            <Aside class="aside" />
        </div>
        <div class="col-right">
            <Wizard class="wizard"/>
        </div>
    </div>
</template>

<style scoped>
.parent {
  display: grid;
  grid-template-columns: 300px auto;
}
.col-left {
    background: red;
    width: 100%;
}
.col-right {
    background: green;
    width: 100%;
}
.logo {
    width: 100%;
    height: fit-content;
    background: blue;
}
.aside {
    width: 100%;
    background:  yellow ;
}
</style>
