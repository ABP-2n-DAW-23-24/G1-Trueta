<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { useForm, router } from '@inertiajs/vue3';
import Logo from '@/Components/Logo.vue';
import UserDropdown from '@/Components/UserDropdown.vue';

const activeMedication = ref(1);

const toggleMedication = (medicationId) => {
    activeMedication.value = medicationId;
    getDoses(medicationId);
};

const isAddMedicationModalActive = ref(false);
const isAddDoseModalActive = ref(false);
const isAddConditionModalActive = ref(false);
const isEditDoseModalActive = ref(false);

const showModal = () => {
    isAddMedicationModalActive.value = true;
};

const closeModal = () => {
    isAddMedicationModalActive.value = false;
};

const showModalDosis = () => {
    isAddDoseModalActive.value = true;
};

const closeModalDosis = () => {
    isAddDoseModalActive.value = false;
    AddDose.conditions = [
        {
            criteriaId: '',
            min: '',
            max: '',
        }
    ];
    AddDose.dose = '';
    AddDose.doseId = '';
    AddDose.conditionId = '';

};

const showModalCondicio = (doseId) => {
    const modal = document.getElementById('image-modal-add' + doseId);
    modal.classList.add('is-active');
    console.log(doseId);
};

const closeModalCondicio = (doseId) => {
    const modal = document.getElementById('image-modal-add' + doseId);
    modal.classList.remove('is-active');
    AddConditionDoseForm.value = [];

};

const showModalEdit = (doseId) => {
    const modal = document.getElementById('image-modal-edit' + doseId);
    modal.classList.add('is-active');
    console.log(doseId);
};

const closeModalEdit = (doseId) => {
    const modal = document.getElementById('image-modal-edit' + doseId);
    modal.classList.remove('is-active');
    AddContitionToDelete.value = [];
    ConditionsArray.value = [];
};


const medications = ref([]);

onMounted(() => {
    axios.get('/medication-panel/get-medication')
        .then(response => {
            medications.value = response.data;
            if (medications.value.length > 0) {
                activeMedication.value = medications.value[0].id;
                getDoses(activeMedication.value);
            }
        })
        .catch(error => {
            console.log(error);
        });
});

const addMedicationForm = useForm({
    name: '',
});

const addMedication = () => {
    addMedicationForm.post('/medication-panel/add-medication', {
        onSuccess: () => {
            getMedications()
            closeModal();
        }
    });
};

function getMedications() {
    axios.get('/medication-panel/get-medication')
        .then(response => {
            medications.value = response.data;
        })
        .catch(error => {
            console.log(error);
        });

}

const doses = ref([]);

function getDoses(medicationId) {
    axios.get('/medication-panel/get-dose-medication/' + medicationId)
        .then(response => {
            console.log(response.data);
            doses.value = response.data;
        })
        .catch(error => {
            console.log(error);
        });
}

const criterias = ref([]);

onMounted(() => {
    axios.get('/medication-panel/get-criterias')
        .then(response => {
            criterias.value = response.data;
        })
        .catch(error => {
            console.log(error);
        });
});

const props = defineProps({
    user: Object,
});

const deleteDose = (doseId) => {
    const confirmDelete = confirm("Segur que vols eliminar aquesta dosi?");
    if (confirmDelete) {
        axios.delete('/medication-panel/delete-dose/' + doseId)
            .then(response => {
                getDoses(activeMedication.value);
                console.log('dose deleted');
            })
            .catch(error => {
                console.log(error);
            });
    }
};


const ConditionsToDelete = ref([]);
const ConditionsArray = ref([]);

const AddContitionToDelete = (doseId, conditionId) => {
    ConditionsToDelete.value.push({ doseId, conditionId });
    console.log(ConditionsToDelete.value);

};

// display none if the condition is deleted
const IsConditionDelete = (doseId, conditionId) => {
    return ConditionsToDelete.value.some(condition => condition.doseId === doseId && condition.conditionId === conditionId);
};

const EditDoseForm = useForm({
    conditions: [
        {
            conditionId: '',    
            criteriaId: '',
            min: '',
            max: '',
        }
    ],
   
});


const editDose = (doseId, conditions) => {

    // edit
    if (conditions && conditions.length > 0) {
        EditDoseForm.conditions = conditions;
        EditDoseForm.conditions.forEach((condition, index) => {
            condition.conditionId = conditions[index].id;
        });
        console.log(conditions, EditDoseForm.conditions);
        EditDoseForm.post('/medication-panel/edit-dose-condition/', {
            onSuccess: () => {
                getDoses(activeMedication.value);
                closeModalEdit(doseId);
            }
        });
    }

    // delete
    if (ConditionsToDelete.value.length > 0) {
        ConditionsToDelete.value.forEach(({ conditionId, doseId }) => {
            axios.delete('/medication-panel/delete-condition-dose/' + doseId + '/' + conditionId)
                .then(response => {
                    console.log('condition deleted');
                    ConditionsToDelete.value = [];
                    getDoses(activeMedication.value);
                    closeModalEdit(doseId);
                })
                .catch(error => {
                    console.log(error);
                });
        });
    } else {
        ConditionsToDelete.value = [];
        closeModalEdit(doseId);
    }


};

const CancelEditDose = (doseId) => {
    ConditionsToDelete.value = [];
    ConditionsArray.value = [];
    closeModalEdit(doseId);
};

// Conditions
const AddConditionDoseForm = useForm({
    criteriaId: '',
    min: '',
    max: '',
    doseId: '',
    conditionId: '',
});

const addConditionDose = () => {
    AddConditionDoseForm.post('/medication-panel/add-condition-dose', {
        onSuccess: () => {
            getDoses(activeMedication.value);
            AddConditionDoseForm.criteriaId = '';
            AddConditionDoseForm.min = '';
            AddConditionDoseForm.max = '';
            closeModalCondicio(AddConditionDoseForm.doseId);

        }
    });
};

// Add doses and conditions
const conditions = ref(['']);

const addCondition = () => {
    AddDose.conditions.push({
        criteriaId: '',
        min: '',
        max: '',
    });
};

const AddDose = useForm({
    medicationId: '',
    doseId: '',
    conditionId: '',
    dose: '',
    conditions: [
        {
            criteriaId: '',
            min: '',
            max: '',
        }
    ],

});

const addDose = () => {
    AddDose.medicationId = activeMedication.value;
    AddDose.post('/medication-panel/add-dose', {
        onSuccess: () => {
            getDoses(activeMedication.value);
            AddDose.dose = '';
            AddDose.conditions = [
                {
                    criteriaId: '',
                    min: '',
                    max: '',
                }
            ];
            closeModalDosis();
        }
    });
};


</script>

<template>
    <div class="medication-panel-container">
        <header class="header">
            <Logo class="logo" />
            <div class="user-dropdown">
                <UserDropdown :user="props.user" />
            </div>
        </header>

        <div class="medication-panel-content">
            <div class="medications">
                <div class="medication-button" :class="{ 'active': activeMedication === medication.id }"
                    v-for="medication in medications" :key="medication.id" @click="toggleMedication(medication.id)">
                    <button>
                        {{ medication.name }}
                    </button>
                </div>
                <div class="add-medication">
                    <div :class="{ 'is-active': isAddMedicationModalActive }" class="modal">
                        <div class="modal-background" @click="closeModal"></div>
                        <form @submit.prevent="addMedication">
                            <div class="modal-content">
                                <div class="modal-card">
                                    <section class="modal-card-body">
                                        <div class="field">
                                            <label class="label">Nom del medicament:</label>
                                            <div class="control">
                                                <input class="input input-add-medication" type="text"
                                                    placeholder="Nom del medicament..."
                                                    v-model="addMedicationForm.name">
                                            </div>
                                        </div>
                                    </section>
                                    <footer class="modal-card-foot">
                                        <button class="button is-success add-button" type="submit">Afegir</button>
                                        <button class="button-cancel" @click="closeModal"
                                            type="button">Cancelar</button>
                                    </footer>
                                </div>
                            </div>
                            <button id="image-modal-close" class="modal-close" @click="closeModal"></button>
                        </form>
                    </div>
                    <button class="add-button" id="showModal" @click="showModal">
                        + Afegir medicament
                    </button>
                </div>
            </div>
            <div class="medication-content">
                <div class="medication-buttons-panel">
                    <div id="image-modal-dosis" :class="{ 'is-active': isAddDoseModalActive }" class="modal">
                        <div class="modal-background" @click="closeModalDosis"></div>

                        <div class="modal-header">
                            <p class="modal-header-title">Afegir dosi</p>
                        </div>
                        <div class="modal-content">
                            <div class="modal-card">
                                <form @submit.prevent="addDose">
                                    <section class="modal-card-body">
                                        <div class="field">
                                            <label class="label label-dosis">Afegir una nova dosi:</label>
                                            <div class="control">
                                                <input class="input" type="text" placeholder="Dosis: "
                                                    v-model="AddDose.dose">
                                                <label class="label label-dosis m-0" for="dosis">Condicions:</label>
                                                <div v-for="(condition, index) in AddDose.conditions" :key="index"
                                                    class="control-row">
                                                    <select class="input" placeholder="Selecciona una opció"
                                                        v-model="condition.criteriaId">
                                                        <option disabled selected>Seleccionar opció</option>
                                                        <option v-for="criteria in criterias" :key="criteria.id"
                                                            :value="criteria.id">{{ criteria.name }}</option>
                                                    </select>
                                                    <input class="input" type="number" placeholder="Minim"
                                                        v-model="condition.min">
                                                    <input class="input" type="number" placeholder="Màxim"
                                                        v-model="condition.max">
                                                </div>
                                                <input type="hidden" v-model="AddDose.doseId">
                                                <input type="hidden" v-model="AddDose.conditionId">

                                                <div class="control flex items-center">
                                                    <button
                                                        class="bg-transparent w-max hover:underline text-blue-500 flex items-center ml-auto"
                                                        @click="addCondition" type="button">
                                                        + Afegir condició
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <footer class="modal-card-foot">
                                        <button class="button is-success add-button" @click="addDose">Afegir</button>
                                        <button class="button-cancel" @click="closeModalDosis"
                                            type="button">Cancelar</button>
                                    </footer>
                                </form>
                            </div>
                        </div>
                        <button id="image-modal-close" class="modal-close" @click="closeModalDosis"></button>
                    </div>
                    <button class="add-dose" id="showModalDosis" @click="showModalDosis">
                        + Afegir dosi
                    </button>
                </div>
                <table class="table is-hoverable" v-if="doses.length > 0">
                    <thead>
                        <tr class="table-header">
                            <th class="left-align">Dosi</th>
                            <th class="left-align">Condició</th>
                            <th class="right-align">Acció</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="dose, index in doses" :key="dose.doseId">
                            <td> {{ doses[index].dose }}
                            </td>
                            <td>
                                <div v-for="doseCondition in doses[index].conditions" :key="doseCondition.conditionId">
                                    <div class="condition">
                                        {{ doseCondition.criteriaName }} ({{ doseCondition.criteriaUnity || '0' }}):
                                        <span v-if="doseCondition.min === 0">
                                            &lt;{{ doseCondition.max + 1 }}
                                        </span>
                                        <span v-else-if="!doseCondition.max">
                                            &gt;{{ doseCondition.min }}
                                        </span>
                                        <span v-else>
                                            {{ doseCondition.min }}-{{ doseCondition.max }}
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td class="right-align">
                                <button class="button is-danger is-outlined drop" @click="deleteDose(dose.id)"
                                    :id="dose.id">
                                    <img src="../../assets/svg/basura.svg" alt="Drop" width="20px" height="20px">
                                </button>
                                <div class="modal" :class="{ 'is-active': isEditDoseModalActive }"
                                    :id="'image-modal-edit' + dose.id">
                                    <div class="modal-background" @click="closeModalEdit(dose.id)"></div>
                                    <div class="modal-card">
                                        <form @submit.prevent="editDose">
                                            <section class="modal-card-body">
                                                <div class="field">
                                                    <div class="control select-dosis">
                                                        <label class="label label-dosis" for="dosis">Editar dosi
                                                            {{ dose.dose }}</label>
                                                        <div class="control-editar"
                                                            v-for="(doseCondition, conditionIndex) in doses[index].conditions"
                                                            :key="conditionIndex">
                                                            <div v-if="!IsConditionDelete(dose.id, doseCondition.id)"
                                                                class="control-row">
                                                                <select class="input"
                                                                    placeholder="Selecciona una opción"
                                                                    v-model="doseCondition.criteriaId">
                                                                    <option v-for="criteria in criterias"
                                                                        :key="criteria.id" :value="criteria.id"
                                                                        :selected="criteria.id === doseCondition.criteriaId">
                                                                        {{ criteria.name }}
                                                                    </option>
                                                                </select>
                                                                <input class="input" type="number" placeholder="Minim"
                                                                    v-model="doseCondition.min">
                                                                <input class="input" type="number" placeholder="Màxim"
                                                                    v-model="doseCondition.max">
                                                                <button
                                                                    class="checkdelete hover:bg-red-500 text-white font-bold py-2 px-2 rounded"
                                                                    @click="AddContitionToDelete(dose.id, doseCondition.id)"
                                                                    :id="doseCondition.id">
                                                                    <img src="../../assets/svg/basura.svg" alt="Drop"
                                                                        width="20px" height="20px">
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <footer class="modal-card-foot">
                                                <button class="button is-success add-button"
                                                    @click="editDose(dose.id, doses[index].conditions)"
                                                    :id="doses.conditions">Editar</button>
                                                <button class="button-cancel"
                                                    @click="CancelEditDose(dose.id)">Cancelar</button>
                                            </footer>
                                        </form>
                                    </div>
                                </div>
                                <button class="button is-success is-outlined editar" @click="showModalEdit(dose.id)"
                                    :id="dose.id">
                                    <img src="../../assets/svg/lapiz.svg" alt="Editar" width="20px" height="20px">
                                </button>
                                <div class="modal" :class="{ 'is-active': isAddConditionModalActive }"
                                    :id="'image-modal-add' + dose.id">
                                    <div class="modal-background" @click="closeModalCondicio(dose.id)"></div>
                                    <div class="modal-card modal-card-add-condition">
                                        <form @submit.prevent="addConditionDose">
                                            <section class="modal-card-body">
                                                <div class="field">
                                                    <div class="control select-dosis">
                                                        <label class="label label-dosis" for="dosis">Afegir Condició a
                                                            {{
                    dose.dose }}</label>
                                                        <div class="control">
                                                            <div class="select is-fullwidth">
                                                                <select class="input" placeholder="Selecciona una opció"
                                                                    v-model="AddConditionDoseForm.criteriaId">
                                                                    <option disabled selected>Selecciona una opció
                                                                    </option>
                                                                    <option v-for="criteria in criterias"
                                                                        :key="criteria.id" :value="criteria.id">
                                                                        {{ criteria.name }}
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <input class="input" type="number" placeholder="Minim"
                                                                v-model="AddConditionDoseForm.min">
                                                            <input class="input" type="number" placeholder="Màxim"
                                                                v-model="AddConditionDoseForm.max">
                                                            <input type="hidden" v-model="AddConditionDoseForm.doseId">
                                                            <input type="hidden"
                                                                v-model="AddConditionDoseForm.conditionId">
                                                        </div>

                                                    </div>
                                                </div>
                                            </section>
                                            <footer class="modal-card-foot">
                                                <button class="button is-success add-button"
                                                    @click="AddConditionDoseForm.doseId = dose.id; addConditionDose()">Afegir</button>
                                                <button class="button-cancel" type="button"
                                                    @click="closeModalCondicio(dose.id)">Cancelar</button>
                                            </footer>
                                        </form>
                                    </div>
                                </div>
                                <button class="button is-success is-outlined add-condition"
                                    @click="showModalCondicio(dose.id)">
                                    <img src="../../assets/svg/plus.svg" alt="Afegir condició" width="20px"
                                        height="20px">
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p v-else>No hi han dosis disponibles per aquest medicament</p>
            </div>
        </div>
    </div>
</template>

<style scoped>
.medication-panel-container {
    padding: 30px;
    display: grid;
    gap: 15px;
}

.medication-panel-content {
    display: grid;
    grid-template-columns: 200px auto;
    gap: 60px;
}


.medication-content {
    display: flex;
    flex-direction: column;
    gap: 15px;

}

.medications {
    width: auto;
    height: fit-content;
    background-color: #ffffff;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    overflow-y: auto;
    display: grid;
    gap: 5px;
}

.medicationbuttons {
    display: flex;
    flex-direction: column;
}


.medication-button {
    padding: 10px 15px;
    font-size: 16px;
    font-weight: 600;
    text-decoration: none;
    border-radius: 15px;
    cursor: pointer;
}

.medication-button button {
    text-align: left;
    width: 100%;
}

.medication-button:hover {
    background-color: #ff8400;
    color: #ffffff;
}

.medication-button.active {
    background-color: #296fa83f;
    color: black;
    border-radius: 15px;
}

.drop {
    margin-right: 10px;
    border-color: #0000001b !important;
    border-radius: 15px;
    margin-top: 5px;
}

.editar {
    border-color: #0000001b !important;
    border-radius: 15px;
    margin-top: 5px;
    margin-right: 10px;
}

.add-condition {
    border-color: #0000001b !important;
    border-radius: 15px;
    margin-top: 5px;
}

.add-condition:hover {
    background-color: #eb881f !important;
    color: #000000;
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
    border-radius: 5px;
}

.medication-buttons-panel {
    display: flex;
    justify-content: flex-end;
    align-items: center;
}

.add-dose {
    padding: 10px;
    background-color: #296fa8;
    color: #fff;
    border: none;
    border-radius: 15px;
    font-size: 15px;
    transition: background 0.3s;
}

.add-dose:hover {
    background-color: #c86700;
}

.table-header .right-align{
    text-align: right;

}

.right-align {
    text-align: right;
    margin-right: 10px;
}

.afegirmedicament {
    margin-top: 20px;

}

.add-button {
    padding: 10px;
    background-color: #296fa8;
    color: #ffffff;
    border: none;
    border-radius: 15px;
    transition: 0.3s;
    font-size: 15px;
    transition: 0.3s;
    width: 100%;
    text-align: center;

}

.add-button:hover {
    background-color: #b85e00;
    color: #ffffff;
}

.add-button-delete {
    padding: 10px;
    background-color: #ff0000;
    color: #ffffff;
    border: none;
    border-radius: 15px;
    transition: 0.3s;
    font-size: 15px;
    transition: 0.3s;
    width: 100%;
    text-align: center;

}

.add-button-delete:hover {
    background-color: #a90909;
    color: #ffffff;
}

.label-dosis {
    text-align: left;
}

.edit-select {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}

.select-dosis {
    text-align: left;
}


.checkdelete img {
    width: 75px;
}

header {
    height: 50px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.logo {
    height: 50px;

}

.user-dropdown {
    width: 175px;
    height: 100%;
}

.button-cancel {
    padding: 8px;
    background-color: #838383;
    color: #ffffff;
    border: none;
    border-radius: 15px;
    transition: 0.3s;
    font-size: 15px;
    transition: 0.3s;
    width: 100%;
    text-align: center;
}

.button-cancel:hover {
    background-color: #4d4d4d;
    color: #ffffff;
}

.input {
    width: 100%;
    border-radius: 15px;
    border: 1px solid #00000039;
}

.modal-content {
    border-radius: 15px;
}

.modal-card {
    border-radius: 15px;

}

.control {
    display: grid;
    gap: 10px;
}

.checkbox-input {
    border-radius: 15px;
    border-color: #0000005e;
}

.modal-card-add-condition {
    border-radius: 15px;
    height: 310px;
}

.control-editar {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    gap: 10px;
    align-items: center;
}

.control-row {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    gap: 10px;
    align-items: center;
}
</style>