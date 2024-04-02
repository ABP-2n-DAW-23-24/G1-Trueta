<script setup>
import Users from "@/Components/Users.vue";
import Modal from './Modal.vue';
import { ref, defineProps, computed, defineEmits } from 'vue';
import { onMounted } from "vue";
import axios from "axios";
const emit = defineEmits(['endDelete'])
let props = defineProps({
    users: Object,
    traduccion: Object

})
let isModalOpen = ref(false);

function deleteUser() {
    axios.post("deleteUser", {
        id: props.users.id,
    }
    )
        .then(response => {
            console.log(response)
            isModalOpen.value = false

            emit('endDelete');
        })
}
function closeModal(params) {
    isModalOpen.value = false

}


</script>

<template>
    <button class="" @click=" isModalOpen = true" title="Delete">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="icons" style="padding-right: 15px;" title="Delete">
            <path
                d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
        </svg>
    </button>

    <Modal :show="isModalOpen" @close="closeModal">
        <div style="padding:20px;">
            <div style="float:right">
                <svg xmlns="http://www.w3.org/2000/svg" 
                    viewBox="0 0 384 512" 
                    style="height: 20px; cursor:pointer;"
                    @click="closeModal">
                    <path
                        d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                </svg>
            </div>
            <h2 style="padding:20px;">{{props.traduccion["textDeleteConfirm"]}}</h2>
            <button class="btn_delete" @click="deleteUser">{{props.traduccion["deleteText"]}}</button>
        </div>
    </Modal>
</template>
<style>
.btn_delete {
    padding: 10px;
    background: red;
    border-radius: 10px;
    color: white;
    float: right;
    cursor: pointer;
    margin-bottom: 30px;
    
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
</style>