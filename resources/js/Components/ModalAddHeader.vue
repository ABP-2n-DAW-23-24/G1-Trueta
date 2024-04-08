<script setup>
import { defineProps, ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import axios from 'axios';
import Button from './Button.vue';
import Modal from './Modal.vue';
import ModalOnSteroids from '@/Components/ModalOnSteroids.vue';


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
    },
    isModalOpen: {
        type: Boolean,
        required: true
    },
    isModalOpen1: {
        type: Boolean,
        required: true
    },
    setIsModalOpen: {
        type: Function,
        required: true
    },
    setIsModalOpen1: {
        type: Function,
        required: true
    }
});

const isModalAddCirurgiaOpen = ref(false);

function setIsModalAddCirurgiaOpen(value) {
    isModalAddCirurgiaOpen.value = value;
    document.body.parentElement.style.overflow = value ? 'hidden' : 'auto';
}

function closeModal(params) {
    props.setIsModalOpen(false)
}

function closeModal1(params) {
    props.setIsModalOpen1(false)
    console.log(props.selectedSurgery);
}


const addSurgery = useForm({
    name: ''
});

const addSurgerySubmit = () => {
    axios.post('/add-surgery', {name: addSurgery.name})
        .then(response => {
            closeModal();
            console.log(response.data);
            const newSurgery = response.data.surgery;
            const newOperation = response.data.operation;
            newOperation.profilaxis = 1;
            newSurgery.operations = [newOperation];
            console.log(newSurgery);
            props.setSurgeries([...props.surgeries, newSurgery]);
        });
}

const addOperation = useForm({
    name: '',
    surgeryId: ''
});

const addOperationSubmit = () => {
    if (props.selectedSurgery === 0) {
        addOperation.surgeryId = 1;
    } else {
        addOperation.surgeryId = props.selectedSurgery + 1;
    }

    axios.post('/add-operation', {name: addOperation.name, surgeryId: addOperation.surgeryId})
        .then(response => {
            closeModal1();
            const surgeryId = response.data.operation.surgeryId;
            const operation = response.data.operation;
            operation.profilaxis = 1;

            const _surgeries = props.surgeries;
            for (let i = 0; i < _surgeries.length; i++) {
                if (_surgeries[i].id == surgeryId) {
                    _surgeries[i].operations.push(operation);
                    break;
                }
            }
            props.setSurgeries(_surgeries);
            console.log(_surgeries);
        });
}
</script>

<template>
    <button class="button-add">
        <img src="../../assets/img/mas.png" alt="Add" class="add-icon">
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
            <div class="form">
                <h1 class="title-form">Afegir Cirurgía</h1>
                <form @submit.prevent="addSurgerySubmit">
                    <div class="control">
                        <input class="input input-add-medication" type="text" placeholder="Nom de la cirugía..."
                            title="Nom de la cirugía..." v-model="addSurgery.name">
                    </div>
                    <div class="control">
                        <Button type="submit" class="button is-primary" :text="'Afegir'"></Button>
                    </div>
                </form>
            </div>
        </div>
    </Modal>

    <!-- <ModalOnSteroids 
        :show="isModalAddCirurgiaOpen" 
        :set="setIsModalAddCirurgiaOpen"
        :title="`Afegir nova cirurgia`"
    >
        <template v-slot:body>
            <div class="form">
                <form @submit.prevent="addSurgerySubmit">
                    <div class="control">
                        <input class="input input-add-medication" type="text" placeholder="Nom de la cirugía..."
                            title="Nom de la cirugía..." v-model="addSurgery.name">
                    </div>
                    <div class="control">
                        <Button type="submit" class="button is-primary" :text="'Afegir'"></Button>
                    </div>
                </form>
            </div>
        </template>
    </ModalOnSteroids> -->

    <Modal :show="isModalOpen1" @close="closeModal1">
        <div style="padding:20px;">
            <div style="float:right">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" style="height: 20px;cursor:pointer;"
                    @click="closeModal1">
                    <path
                        d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                </svg>
            </div>
            <div class="form">

                <h1 class="title-form">Afegir Operació</h1>
                <form @submit.prevent="addOperationSubmit">
                    <div class="control">
                        <input class="input input-add-medication" type="text" placeholder="Nom de l'operació..."
                            title="Nom de l'operació..." v-model="addOperation.name">
                    </div>
                    <div class="control">
                        <Button type="submit" class="button is-primary" :text="'Afegir'"></Button>
                    </div>
                </form>
            </div>
        </div>
    </Modal>
</template>

<style scoped>
.button-add {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}

.input {
    width: 100%;
    border-radius: 15px;
    border: 1px solid #00000039;
}

.button {
    width: 150px;

}

.control {
    padding: 5px;
    padding-top: 10px;
    display: flex;
    justify-content: center;
    align-items: center;

}

.form {
    padding: 10px;
}

.title-form {

    font-size: 20px;
    font-weight: bold;
    padding: 10px
}
</style>