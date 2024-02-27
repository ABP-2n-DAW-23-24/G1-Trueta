<script setup>

</script>
<template>
  <div class="columns is-multiline is-centered m-5 has-background-success wizard-grid">
    <slot></slot>
  </div>
</template>

<style scoped>
  .wizard-grid {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 10px;
  padding: 10px;
}
</style>