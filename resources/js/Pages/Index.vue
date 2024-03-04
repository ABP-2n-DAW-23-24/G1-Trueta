<script setup>

import { ref, defineProps } from 'vue';
import Footer from '@/Components/Footer.vue';
import Logo from '@/Components/Logo.vue';
import Aside from '@/Components/Aside.vue';
import Wizard from '@/Components/Wizard.vue';
import { Head } from '@inertiajs/vue3';

</script>
<template>
  <Head title="Index" />
  <div class="index-container">
    <div class="col-left">
      <Logo class="logo" />
      <Aside />
    </div>
    <div class="col-right">
      <Wizard />
    </div>
  </div>
</template>

<style scoped>

.logo {
  height: 50px;
}

.index-container {
  display: grid;
  grid-template-columns: 300px auto;
  margin: 0;
}

.col-left {
  padding: 30px;
  display: grid;
  grid-template-rows: auto 1fr;
  gap: 15px;
}

.col-right {
  padding: 30px;
}
</style>
