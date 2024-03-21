<script setup>
    import BuildableDropdown from "@/Components/BuildableDropdown.vue";

const props = defineProps({
  user: {
    type: Object,
    required: true
  }
});
</script>

<template>
    <BuildableDropdown
      class="user-dropdown"
      :user="user"
      :routes="[
        {
      label: 'Panell d\'antibiòtics',
      route: 'medication-panel',
      isAdmin: true,
      isManager: true,
    },
    {
      label: 'Perfil',
      route: 'profile.edit',
      isAdmin: false,
      isManager: false,
    },
    {
      label: 'Panell administració',
      route: 'admin_panel',
      isAdmin: true,
      isManager: false,
    },
    {
      label: 'Pagina Inici',
      route: 'index',
      method: 'get',
      isAdmin: false,
      isManager: false,
    },
    {
      label: 'Tancar sessió',
      route: 'logout',
      method: 'post',
      isAdmin: true,
      isManager: false,
    }
      ]"
      
    ></BuildableDropdown>
</template>
<!-- sudo add-apt-repository --remove ppa:ondrej/php
sudo add-apt-repository --remove ppa:ondrej/php
sudo apt-get update
sudo add-apt-repository ppa:ondrej/php
sudo apt-get update
sudo add-apt-repository --remove ppa:ondrej/phpdawdawd


-->
<style scoped>
  .user-dropdown {
    width: 100%;
  }
</style>