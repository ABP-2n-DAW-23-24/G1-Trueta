<script setup>
import { ref, onUpdated, defineProps, watch } from 'vue';
import WizardHeader from '@/Components/WizardHeader.vue';
import WizardGrid from '@/Components/WizardGrid.vue';


const props = defineProps({
    setCrumb: Function,
    crumb: Number,
    selectedSurgery: Number,
    setSelectedSurgery: Function,
    user: Object,
    hoveredSurgery: Number,
    hoveredOperation: Number,
    toggleCollapse: Function,
    selectedOperation: Number,
    setSelectedOperation: Function,
    setHoveredSurgery: Function,
    setHoveredOperation: Function,
    questions: Array,
    selectedQuestions: Array,
    resumes: Array,
    isLoading: Boolean,
    setIsLoading: Function,
    setSelectedQuestions: Function,
    setResumes: Function,
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
            :selectedSurgery="props.selectedSurgery"
            :setSelectedSurgery="props.setSelectedSurgery"
            :selectedOperation="props.selectedOperation"
            :setSelectedOperation="props.setSelectedOperation"
            
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
            :questions="props.questions"
            :selectedQuestions="props.selectedQuestions"
            :resumes="props.resumes"
            :isLoading="props.isLoading"
            :setIsLoading="props.setIsLoading"
            :setSelectedQuestions="props.setSelectedQuestions"
            :setResumes="props.setResumes"
        />
    </div>
</template>

<style scoped>
.wizard-container {
    display: grid;
    gap: 15px;
}
</style>
