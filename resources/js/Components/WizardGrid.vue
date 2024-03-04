<script setup>
  import { ref } from 'vue';
  import axios from 'axios';
  import WizardSquare from '@/Components/WizardSquare.vue';

  const props = defineProps({
    crumb: {
      type: Number,
      required: true
    },
    setCrumb: {
      type: Function,
      required: true
    }
  });

  const surgeries = ref([]);
  const selectedSurgery = ref(0);

  axios.get("/json/surgeriesWithOperations")
  .then(response => {
    surgeries.value = response.data;
  });

  function handleSurgeryClick(surgery) {
    selectedSurgery.value = surgery;
    props.setCrumb(1);
  }

</script>
<template>
  <div class="wizard-grid-container">
      <WizardSquare
        v-show="crumb === 0"
        v-for="(surgery, index) in surgeries"
        @click="() => handleSurgeryClick(index)"
        :name="surgery.name"
        type="surgery"
      />

      <!-- Este es un intento de mostrar las operaciones -->
      <!-- <WizardSquare
        v-show="crumb === 1"
        v-for="operation in surgeries.length > 0 ? surgeries[selectedSurgery].operations : []"
        @click="selectedOperation = operation"
        :name="operation.name"
        type="operation"
      /> -->
  </div>
</template>

<style scoped>
  .wizard-grid-container {
    display: grid;
    gap: 15px;
    grid-template-columns: repeat(auto-fit, minmax(230px, auto));
  }
</style>