<script setup>
import UserDropdown from "@/Components/UserDropdown.vue";
import AdminPanelMenu from "@/Components/AdminPanelMenu.vue";
import Logo from "@/Components/Logo.vue";

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
  }
});

const breadcrumbs = ["Cirurgía", "Operació", "Pacient", "Resultat"];

</script>

<template>
  <div class="wizard-header-container">
    <Logo class="logo" />
    <div class="dropdown-div">
      <UserDropdown :user="user" class="user-dropdown" />
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
  height: 100%;
  width: 175px;
}

.logo {
  height: 50px;
}

</style>