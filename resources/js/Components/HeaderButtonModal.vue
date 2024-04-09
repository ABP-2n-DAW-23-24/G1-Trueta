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

let isModalOpen = ref(false);
let isModalOpen1 = ref(false);

function setIsModalOpen(value) {
    isModalOpen.value = value;
}

function setIsModalOpen1(value) {
    isModalOpen1.value = value;
}

function handleHeaderButtonClick() {
    if (props.crumb === 0) {
        setIsModalOpen(true);
    }

    if (props.crumb === 1) {
        setIsModalOpen1(true);
    }
}

</script>

<template>
    <div class="breadcrumb-buttons-container" v-show="crumb < 2 && (user.isAdmin)" @click="handleHeaderButtonClick">
        <div class="breadcrumb-button-modal" v-if="user.isAdmin || user.isManager">
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
                :isModalOpen="isModalOpen"
                :isModalOpen1="isModalOpen1"
                :setIsModalOpen="setIsModalOpen"
                :setIsModalOpen1="setIsModalOpen1"
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