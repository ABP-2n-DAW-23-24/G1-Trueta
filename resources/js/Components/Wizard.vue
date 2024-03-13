<script setup>
import { ref, onUpdated, defineProps, watch } from 'vue';
import WizardHeader from '@/Components/WizardHeader.vue';
import WizardGrid from '@/Components/WizardGrid.vue';


const props = defineProps({
  setCrumb: String,
  crumb: String,
  selectedSurgery: String,
  setSelectedSurgery: Function,
  user: {
    type: Object,
    required: true
  }
});



console.log(props.setSelectedSurgery);

onUpdated(() => {
    // alert(props.idSurgery);
});

</script>




<template>
    <div class="wizard-container">
        <WizardHeader
            :crumb="props.crumb"
            :setCrumb="props.setCrumb"
            :user="props.user"
        />
        <WizardGrid
            :crumb="props.crumb"
            :setCrumb="props.setCrumb"
            :selectedSurgery="props.selectedSurgery"
            :setSelectedSurgery="props.setSelectedSurgery"
        />
    </div>
</template>

<style scoped>
.wizard-container {
    display: grid;
    gap: 15px;
}
</style>
