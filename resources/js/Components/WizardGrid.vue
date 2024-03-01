<script setup>

</script>
<template>
  <div class="columns is-multiline is-centered m-5  wizard-grid bg_main">
    <slot></slot>
  </div>
</template>

<style scoped>
/*  */
.bg_main{
  background:#F1F0F0;
  border-radius:10px;
}
  .wizard-grid {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 10px;
  padding: 10px;
}
</style>