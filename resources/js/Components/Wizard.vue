<script setup>
import { ref, onUpdated, defineProps, watch } from 'vue';
import WizardHeader from '@/Components/WizardHeader.vue';
import WizardGrid from '@/Components/WizardGrid.vue';


const props = defineProps({
    setCrumb: {
        type: Function,
        required: true
    },
    crumb: Number,
    selectedSurgery: Number,
    setSelectedSurgery: Function,
    user: {
        type: Object,
        required: true
    },
    hoveredSurgery: Number,
    hoveredOperation: Number,
    toggleCollapse: Function,
    selectedOperation: Number,
    setSelectedOperation: Function,
    setHoveredSurgery: Function,
    setHoveredOperation: Function
});




onUpdated(() => {
    // alert(props.idSurgery);
});


function handleSetSelectedSurgery(setSelectedSurgery) {
    console.log(setSelectedSurgery);
}

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
            :hoveredSurgery="props.hoveredSurgery"
            :hoveredOperation="props.hoveredOperation"
            :toggleCollapse="props.toggleCollapse"
            :selectedOperation="props.selectedOperation"
            :setSelectedOperation="props.setSelectedOperation"
            :setHoveredSurgery="props.setHoveredSurgery"
            :setHoveredOperation="props.setHoveredOperation"
        />
    </div>
</template>

<style scoped>
.wizard-container {
    display: grid;
    gap: 15px;
}
</style>
