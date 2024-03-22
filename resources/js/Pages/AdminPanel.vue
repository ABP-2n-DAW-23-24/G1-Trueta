<script setup>
import { ref, defineProps } from 'vue';
import Wizard from '@/Components/Wizard.vue';
import AdminPanelHeader from '@/Components/AdminPage/AdminPanelHeader.vue';
import ListUsers from "@/Components/AdminPage/ListUsers.vue";
import { Head } from '@inertiajs/vue3';
import Logo from '@/Components/Logo.vue';
import Footer from '@/Components/Footer.vue';

let props = defineProps({
  users_main: Object,
  traduccionjson: Object,
  user: Object
})
let traduccion = JSON.parse(props.traduccionjson)
let users = ref(props.users_main);
function endSearchUser(data) {
  
  users.value=data
}
</script>
<template>
<div class="container-admin">
  <Head title="Index" />
 
      <AdminPanelHeader @searched-user="endSearchUser" :user="props.user"></AdminPanelHeader>

  <div class="bg-listuser">
     
    <ListUsers :users="users" :traduccion="traduccion"></ListUsers>
  </div>
  </div>
  <Footer />
</template>

<style>
.bg-listuser {
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

.container-admin {
padding: 30px;
margin: 0;
width: 100%;
height: 100%;
display: grid;
gap: 15px;
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