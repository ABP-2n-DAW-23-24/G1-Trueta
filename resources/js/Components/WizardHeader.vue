<script setup>
  import BuildableDropdown from "@/Components/BuildableDropdown.vue";
  const props = defineProps({
    text: Object,
    routes: Object
  });
</script>

<template>
  <div class="container">
    <div class="header m-5 gap-5" style="margin-bottom: 68px !important;">
      <div class="left has-background-primary p-4 bg_column1">
        columna 1
      </div>
      <div class="right has-background-link is-one-quarter p-4 bg_column2">
        <!-- columna 2 -->
        <BuildableDropdown :text="props.text" :routes="props.routes" style="display: flex; flex-direction: row; justify-content: center;">
        </BuildableDropdown>
      </div>
    </div>
  </div>
</template>

<style scoped>
  .container {
    /* Define una altura específica para el contenedor */
    height: 100px; /* Ajusta este valor a la altura deseada */
  }

  .header {
    display: grid;
    grid-template-columns: 2fr 0.5fr;
    height: 100%;
    /* No es necesario definir grid-template-rows si quieres que los hijos tomen la altura total del padre */
  }

  .bg_column1, .bg_column2 {
    background: #D9D9D9 !important;
    border-radius: 7px;
    padding: 20px !important;
    /* Asegúrate de que los elementos hijo tomen la altura total */
    height: 100%;
  }

  .left {
    grid-column: 1;
  }

  .right {
    grid-column: 2;
  }
</style>