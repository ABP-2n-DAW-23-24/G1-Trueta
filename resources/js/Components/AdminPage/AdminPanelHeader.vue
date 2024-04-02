<script setup>
import UserDropdown from "@/Components/UserDropdown.vue";
import AdminPanelMenu from "@/Components/AdminPanelMenu.vue";
import Logo from "@/Components/Logo.vue";
import ModalUsers from "../ModalUsers.vue";
import { ref, defineProps, watch, defineEmits } from 'vue';

const props = defineProps({
  crumb: {
    type: Number,
    required: true
  },
  setCrumb: {
    type: Function,
    required: true
  },
  user: {
    type: Object,
    required: true
  },
  traduccion: Object,

});

const breadcrumbs = ["Cirurgía", "Operació", "Pacient", "Resultat"];

const emit = defineEmits(['searchedUser'])


function test(data) {
  emit('searchedUser', data); // Emitir el evento 'searchedUser' con los datos de la respuesta

}
</script>

<template>
  <div class="wizard-header-container">
    <div class="logo-div">
      <Logo class="logo" />
    </div>
    <div class="menu-right">
      <AdminPanelMenu @searchedUser="test" class="menu"></AdminPanelMenu>
      <ModalUsers class="modal-users-button" @getUser="test" :traduccion="traduccion"></ModalUsers>
      <div class="dropdown-div">
        <UserDropdown :user="user" class="user-dropdown" />
      </div>
    </div>
  </div>
</template>

<style scoped>
.wizard-header-container {
  display: flex;
  justify-content: space-between;
  width: 100%;
  height: 50px;
}

.user-dropdown {
  height: 50px;
  width: 175px;

}

.logo-div {
  width: 250px;
  display: flex;
  align-items: center;

}

.logo {
  height: 50px;

}

.menu {
  width: 100%;
  height: 50px;
}

.menu-right {
  display: flex;
  align-items: center;
  justify-content: space-between;
  width: 100%;
  height: 50px;
  box-sizing: border-box;
  gap: 15px;

}
</style>