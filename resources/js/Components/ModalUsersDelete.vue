<script setup>
import { ref, defineProps, defineEmits } from 'vue';
import axios from "axios";
import ModalOnSteroids from '@/Components/ModalOnSteroids.vue';

const props = defineProps({
    users: Object,
    traduccion: Object

});
const emit = defineEmits(['endDelete']);
const isModalMedicationInfoOpen = ref(false);

function setIsModalMedicationInfoOpen(value) {
    isModalMedicationInfoOpen.value = value;
    document.body.parentElement.style.overflow = value ? 'hidden' : 'auto';
}

function deleteUser() {
    axios.post("deleteUser", {
        id: props.users.id,
    })
    .then(response => {
        console.log(response);
        emit('endDelete');
    })
}
</script>

<template>
    <button @click="setIsModalMedicationInfoOpen(true)">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="icons" style="padding-right: 15px;" title="Delete">
            <path
                d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
        </svg>
    </button>

    <ModalOnSteroids 
        :show="isModalMedicationInfoOpen" 
        :set="setIsModalMedicationInfoOpen"
        :title="`Eliminació d'usuari`"
    >
        <template v-slot:body>
            <div class="consolas">Estàs segur de que vols eliminar l'usuari <span>{{ props.users.name }}</span>?</div>
            <div class="nota consolas">Aquesta opció no es podra desfer</div>

            <button class="btn_delete" @click="deleteUser">{{ props.traduccion["deleteText"] }}</button>
        </template>
    </ModalOnSteroids>
</template> 
<style>
.btn_delete {
    padding: 10px 20px;
    background: red;
    border-radius: 10px;
    color: white;
    cursor: pointer;
    float: right;
}

.rols {
    margin-top: 20px;
    display: flex;
    justify-content: space-around;
    align-items: center;
}

.correo_back {
    margin-top: 20px;
}

.center_flex_modal {
    display: flex;
    flex-direction: row;
    justify-content: space-evenly;
}

.center_flex {
    display: flex;
    flex-direction: row;
    justify-content: center;
}

.btn_add {
    display: flex;
    align-items: center;
    justify-content: center;
    white-space: nowrap;
    border: none;
    background-color: transparent;
    cursor: pointer;
    padding: 8px 12px;
    outline: none;
    border-radius: 5px;
    background-color: black;
    color: white;
}

.btn_add svg {
    fill: currentColor;
    width: 16px;
    height: auto;
    margin-right: 8px;
}

.consolas span {
    font-size: 1.2rem;
    font-weight: bold;
    text-transform: uppercase;
}

.nota {
    font-size: 0.8rem;
    font-weight: normal;
    text-transform: none;
    color: #666;
}
</style>