<script setup>
import WizardHeader from '@/Components/WizardHeader.vue';
import WizardGrid from '@/Components/WizardGrid.vue';
import WizardSquare from '@/Components/WizardSquare.vue';
const props = defineProps({
  text: Object,
  routes: Object
})
</script>

<template>
    <div>
        <WizardHeader :text="props.text"   :routes="props.routes" ></WizardHeader>
        <WizardGrid>
            <WizardSquare name="asdadsda" type="cirugia"></WizardSquare>
            <WizardSquare name="asdadsda" type="cirugia"></WizardSquare>
            <WizardSquare name="asdadsda" type="cirugia"></WizardSquare>
            <WizardSquare name="asdadsda" type="cirugia"></WizardSquare>
            <WizardSquare name="asdadsda" type="cirugia"></WizardSquare>
            <WizardSquare name="asdadsda" type="cirugia"></WizardSquare>
        </WizardGrid>
    </div>
</template>

<style scoped></style>
