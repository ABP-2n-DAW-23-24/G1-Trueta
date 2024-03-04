<script setup>
import { ref } from 'vue';
import WizardHeader from '@/Components/WizardHeader.vue';
import WizardGrid from '@/Components/WizardGrid.vue';

const crumb = ref(0);

function setCrumb(value) {
  crumb.value = value;
}

</script>

<template>
    <div class="wizard-container">
        <WizardHeader
            :crumb="crumb"
            :setCrumb="setCrumb"
        />
        <WizardGrid
            :crumb="crumb"
            :setCrumb="setCrumb"
        />
    </div>
</template>

<style scoped>
.wizard-container {
    display: grid;
    gap: 15px;
}
</style>
