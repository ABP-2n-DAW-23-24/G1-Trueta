<script setup>
import { ref, defineProps } from 'vue';
import Wizard from '@/Components/Wizard.vue';
import AdminPanelHeader from '@/Components/AdminPanelHeader.vue';
import ListUsers from "@/Components/ListUsers.vue"

import { Head } from '@inertiajs/vue3';
import Logo from '@/Components/Logo.vue';
let props = defineProps({
  users:Object
})
// 
</script>
<template>
<Head title="Index" />
  <div class="index-container">
    <div class="col-left">
      <Logo class="logo" />
      
    </div>
    <div class="col-right">
        <AdminPanelHeader></AdminPanelHeader>
    </div>
  </div>
  <div class="bg-listuser">
    <ListUsers :users="users"></ListUsers>
  </div>
</template>

<style>

.bg-listuser{
    display: flex;
    flex-direction: row;
    align-content: center;
    flex-wrap: nowrap;
    justify-content: center;
    align-items: center;
}
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