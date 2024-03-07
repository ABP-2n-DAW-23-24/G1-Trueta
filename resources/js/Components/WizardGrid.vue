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
  const detailsProfilaxis = ref([]);

  axios.get("/json/surgeriesWithOperations")
  .then(response => {
    surgeries.value = response.data;
  });

  function handleSurgeryClick(surgery) {
    selectedSurgery.value = surgery;
    props.setCrumb(1);
  }

  //Modifica el color del texto para hacerlo mas legible
  function makeTextColorReadable(backgroundColor) {
    const rgb = backgroundColor.match(/\w\w/g).map(x => parseInt(x, 16));
    const luminance = (0.299 * rgb[0] + 0.587 * rgb[1] + 0.114 * rgb[2]) / 255;
    return luminance > 0.5 ? '#000000' : '#ffffff';
}

//Modifica el color para hacerlo mas oscuro
function makeDarkColor(color) {
    const rgb = color.match(/\w\w/g).map(x => parseInt(x, 16));
    const darkRgb = rgb.map(x => Math.round(x * 0.6));
    return `#${darkRgb.map(x => x.toString(16).padStart(2, '0')).join('')}`;
  }

</script>
<template>
  <div class="wizard-grid-container">
    <!-- Mostrando todas las cirugías -->
    <WizardSquare
  v-show="crumb === 0"
  v-for="(surgery, index) in surgeries"
  @click="() => handleSurgeryClick(index)"
  :name="surgery.name"
  :color="surgery.color"
  :textColor="makeTextColorReadable(surgery.color)"
  type="surgery"
>
</WizardSquare>


    <!-- Filtrando operaciones con el atributo 'profilaxis' en 1 -->
    <WizardSquare
      v-show="crumb === 1"
      v-for="operation in surgeries.length > 0 ? surgeries[selectedSurgery].operations.filter(op => op.profilaxis === 1) : []"
      @click="selectedOperation = operation"
      :name="operation.name"
      :color="surgeries[selectedSurgery].color"
      :textColor="makeTextColorReadable(surgeries[selectedSurgery].color)"
      type="operation"
    />
  </div>
    <!-- Verificando si hay operaciones sin profilaxis -->
    <div v-show="crumb === 1 && surgeries.length > 0 && surgeries[selectedSurgery].operations.some(op => op.profilaxis === 0)">
      <h1 class="title is-1">No precisa profilaxis</h1>
    </div>

  <div class="wizard-grid-container">

    <!-- Filtrando operaciones sin profilaxis -->
    <WizardSquare
      v-show="crumb === 1"
      v-for="operation in surgeries.length > 0 ? surgeries[selectedSurgery].operations.filter(op => op.profilaxis === 0) : []"
      @click="selectedOperation = operation"
      :name="operation.name"
      :color="makeDarkColor(surgeries[selectedSurgery].color)"
      :textColor="makeTextColorReadable(makeDarkColor(surgeries[selectedSurgery].color))"
      type="operation"
    />
  </div>
</template>

<style scoped>
  .wizard-grid-container {
    display: grid;
    gap: 15px;
    grid-template-columns: repeat(auto-fit, minmax(230px, auto));
  }
</style>