<script setup>
    import BuildableDropdown from "@/Components/BuildableDropdown.vue";
</script>

<template>
    <BuildableDropdown
      class="user-dropdown"
      text="SILVIA LLADÓ"
      :routes="[
        {
            label: 'Panell d\'antibiòtics',
            route: 'medication-panel'
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