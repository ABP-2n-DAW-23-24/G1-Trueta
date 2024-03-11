<script setup>
import UserDropdown from "@/Components/UserDropdown.vue";
import AdminPanelMenu from "@/Components/AdminPanelMenu.vue";

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
      <AdminPanelMenu
       
      />
      <UserDropdown :user="user"/>
    </div>
</template>

<style scoped>

.wizard-header-container {
  display: grid;
  grid-template-columns: auto 175px;
  height: 50px;
  gap: 15px;
}

</style>