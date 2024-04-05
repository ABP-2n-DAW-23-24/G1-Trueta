<script setup>
import BuildableDropdown from "@/Components/BuildableDropdown.vue";

const props = defineProps({
  user: {
    type: Object,
    required: true
  },
  traductions:{
    type:Object,
    required:true
  }
});
let home=props.traductions["text_home"]
let antibiotics=props.traductions["text_antibiotics"]
let administr=props.traductions["adminis"]
let profile=props.traductions["text_profile"]
let logout=props.traductions["text_logout"]
</script>

<template>
  <BuildableDropdown class="user-dropdown" :user="user" :routes="[
    {
      label: home,
      route: 'index',
      method: 'get',
      isAdmin: false,
      isManager: false,
    },
    {
      label: antibiotics,
      route: 'medication-panel',
      isAdmin: true,
      isManager: true,
    },

    {
      label: administr,
      route: 'admin_panel',
      isAdmin: true,
      isManager: false,
    },
    {
      label: profile,
      route: 'profile.edit',
      isAdmin: false,
      isManager: false,
    },
    {
      label: logout,
      route: 'logout',
      method: 'post',
      isAdmin: false,
      isManager: false,
    }
  ]"></BuildableDropdown>
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