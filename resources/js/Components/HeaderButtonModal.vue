<script setup>

import { defineProps } from 'vue';
import { ref, computed } from 'vue';
import ModalAddHeader from './ModalAddHeader.vue';

const props = defineProps({
    breadcrumbs: {
        type: Array,
        required: true
    },
    crumb: {
        type: Number,
        required: true
    },
    setCrumb: {
        type: Function,
        required: true
    },
    user: {
        type: Object,
        required: true
    },
    selectedSurgery: {
        type: Number,
        required: true
    },
    setSelectedSurgery: {
        type: Function,
        required: true
    },
    selectedOperation: {
        type: Number,
        required: true
    },
    setSelectedOperation: {
        type: Function,
        required: true
    },
    setSurgeries: {
        type: Function,
        required: true
    },
    surgeries: {
        type: Array,
        required: true
    }
});

</script>

<template>
    <div class="breadcrumb-buttons-container">
      
    <div class="breadcrumb-button-modal" v-if="user.isAdmin === 1 || user.isManager === 1">
        <ModalAddHeader
        :crumb="crumb"
        :setCrumb="setCrumb"
        :user="user"
        :breadcrumbs="breadcrumbs"
        :selectedSurgery="selectedSurgery"
        :setSelectedSurgery="setSelectedSurgery"
        :selectedOperation="props.selectedOperation"
            :setSelectedOperation="props.setSelectedOperation"
            :setSurgeries="props.setSurgeries"
            :surgeries="props.surgeries"
        />
    </div>
    </div>
</template>

<style scoped>

.breadcrumb-buttons-container {
    background: #296fa8;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.breadcrumb-button-modal {
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    width: 100%;
    height: 100%;
}
</style>