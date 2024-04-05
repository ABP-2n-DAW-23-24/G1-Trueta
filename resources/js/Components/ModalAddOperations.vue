<script setup>
import { defineProps } from 'vue';
import { ref, computed } from 'vue';
import Modal from './Modal.vue';
import { defineEmits } from 'vue';

let isModalOpen = ref(false);
function closeModal(params) {
    isModalOpen.value = false

}
</script>

<template>
    <button class="" @click=" isModalOpen = true" title="Delete">
        + Afegir operació
    </button>

    <Modal :show="isModalOpen" @close="closeModal">
        <div style="padding:20px;">
            <div style="float:right">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" style="height: 20px;cursor:pointer;"
                    @click="closeModal">
                    <path
                        d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                </svg>
            </div>
            <h2></h2>
           Que pasa
        </div>
    </Modal>
</template>

<style scoped></style>