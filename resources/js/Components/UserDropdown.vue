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
            route: 'medication-panel'
        },
        {
            label: 'Pagina Inici',
            route: 'index',
            method: 'get'
        },
        {
            label: 'Tancar sessió',
            route: 'logout',
            method: 'post'
        }
      ]"
    ></BuildableDropdown>
</template>

<style scoped>
  .user-dropdown {
    width: 100%;
  }
</style>