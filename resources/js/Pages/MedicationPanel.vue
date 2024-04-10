<script setup>
import { ref, onMounted,defineProps } from 'vue';
import axios from 'axios';
import { useForm } from '@inertiajs/vue3';
import Logo from '@/Components/Logo.vue';
import UserDropdown from '@/Components/UserDropdown.vue';
import Footer from '@/Components/Footer.vue';
import Button from '@/Components/Button.vue';
import ModalOnSteroids from '@/Components/ModalOnSteroids.vue';
import { Head } from '@inertiajs/vue3';


// Medications
const activeMedication = ref(1);
// Toggle medication table
const toggleMedication = (medicationId) => {
    activeMedication.value = medicationId;
    getMedicationDosage(medicationId);
    getDoses(medicationId);

};
// Modals
const isAddDoseModalActive = ref(false);
const isAddDosageActive = ref(false);
const isModalMedicationInfoOpen = ref(false);
const isModalAddMedicationOpen = ref(false);
const isModalDeleteMedicationOpen = ref(false);


function setIsModalMedicationInfoOpen(value) {
    isModalMedicationInfoOpen.value = value;
    document.body.parentElement.style.overflow = value ? 'hidden' : 'auto';
}

function setIsModalAddMedicationOpen(value) {
    EditDosageForm.dosage = medicationDosage.value.find(dosage => dosage.id === activeMedication.value)?.dosage;
    isModalAddMedicationOpen.value = value;
    document.body.parentElement.style.overflow = value ? 'hidden' : 'auto';
}

function setIsModalDeleteMedicationOpen(value) {
    EditDosageForm.name = medications.value.find(medication => medication.id === activeMedication.value)?.name;
    isModalDeleteMedicationOpen.value = value;
    document.body.parentElement.style.overflow = value ? 'hidden' : 'auto';
}

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

const closeModalDosage = () => {
    isAddDosageActive.value = false;
};
// Get medications
const medications = ref([]);

onMounted(() => {
    axios.get('/medication-panel/get-medication')
        .then(response => {
            medications.value = response.data;

            if (medications.value.length > 0) {
                activeMedication.value = medications.value[0].id;
                getDoses(activeMedication.value);
                getMedicationDosage(activeMedication.value);
            }
        })
        .catch(error => {
            console.log(error);
        });
});

const addMedicationForm = useForm({
    name: '',
});

// Add medication
const addMedication = () => {
    addMedicationForm.post('/medication-panel/add-medication', {
        onSuccess: () => {
            setIsModalMedicationInfoOpen(false);
            getMedications()
        }
    });
};

// Get medications
function getMedications() {
    axios.get('/medication-panel/get-medication')
        .then(response => {
            medications.value = response.data;
            
            if (medications.value.length > 0) {
                activeMedication.value = medications.value[0].id;
                getDoses(activeMedication.value);
                getMedicationDosage(activeMedication.value);
            }
        })
        .catch(error => {
            console.log(error);
        });

}
// Doses
const doses = ref([]);
// Get doses by medication id
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
// get criterias
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
    traduccionjson: Object,

});


// Delete dose
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
// Edit dose
const ConditionsToDelete = ref([]);
const ConditionsArray = ref([]);
// Add condition to delete
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
// Edit dose
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

// Conditions
const AddConditionDoseForm = useForm({
    criteriaId: '',
    min: '',
    max: '',
    doseId: '',
    conditionId: '',
});
// Add condition to dose
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

const medicationDosage = ref([]);
function getMedicationDosage(medicationId) {
    axios.get('/medication-panel/get-medication-dosage/' + medicationId)
        .then(response => {
            console.log(response.data);
            medicationDosage.value = response.data;
        })
        .catch(error => {
            console.log(error);
        });
}


// edit dosage
const EditDosageForm = useForm({
    dosage: '',
    medicationId: '',
});

// /medication-panel/edit-medication-dosage
const editDosage = () => {
    EditDosageForm.medicationId = activeMedication.value;
    EditDosageForm.post('/medication-panel/edit-medication-dosage', {
        onSuccess: () => {
            setIsModalAddMedicationOpen(false);
            getDoses(activeMedication.value);
            getMedicationDosage(activeMedication.value);
        }
    });
};

// delete medication
function deleteMedication(medicationId) {
    axios.delete('/medication-panel/delete-medication/' + medicationId)
        .then(response => {
            setIsModalDeleteMedicationOpen(false);
            getMedications();
            console.log('medication deleted');
        })
        .catch(error => {
            console.log(error);
        });
};

let traduccion=JSON.parse(props.traduccionjson)
</script>

<template>
    <Head title="Panel de Medicaments" />
    <div class="medication-panel-container">
        <header class="header">
            <Logo class="logo" />
            <div class="user-dropdown">
                <UserDropdown :user="props.user" :traductions="traduccion" />
            </div>
        </header>

        <div class="medication-panel-content">
            <div class="medications">
                <div class="add-medication" v-if="user.isManager">
                    <button @click="setIsModalMedicationInfoOpen(true)" class="add-button" id="showModal">
                        + Afegir Medicament
                    </button>

                    <ModalOnSteroids 
                        :show="isModalMedicationInfoOpen" 
                        :set="setIsModalMedicationInfoOpen"
                        :title="`Afegir medicament`"
                    >
                        <template v-slot:body>
                            <div class="field">
                                <label class="label">Nom del medicament:</label>
                                <div class="control">
                                    <input class="input input-add-medication" type="text"
                                        placeholder="Nom del medicament..." title="Nom del medicament..."
                                        v-model="addMedicationForm.name">
                                </div>
                            </div>
                            <div class="add-med">
                                <button class="button add-button" @click="addMedication"  type="submit">
                                    Afegir
                                </button>
                                <button class="button add-button-delete" @click="setIsModalMedicationInfoOpen(false)" type="submit">
                                    Cancelar
                                </button>
                            </div>
                            
                        </template>
                    </ModalOnSteroids>
                </div>
                <div class="medication-button" :class="{ 'active': activeMedication === medication.id }"
                    v-for="medication in medications" :key="medication.id" @click="toggleMedication(medication.id)">
                    <button>
                        {{ medication.name }}
                    </button>
                </div>

            </div>

            <div class="medication-content">
                <div class="medication-buttons-panel">

                </div>
                <div class="medication-dosage-content">
                    <h1 class="title-dosage">Dosificacions de l'antibiòtic {{ medications.find(med => med.id === activeMedication)?.name }}: </h1>
                    <div class="medication-dosage-div" v-for="dosage in medicationDosage" :key="dosage.id">
                        <textarea class="textarea is-link" readonly placeholder="Encara no hi ha dosificació per aquest antibiòtic" title="Dosificació de l'antibiòtic..."
                        >{{ dosage.dosage === null ? 'Encara no hi ha dosificació per aquest antibiòtic' : dosage.dosage }}
                        </textarea>
                    </div>
                    <div class="button-edit-dosage">
                        <div :class="{ 'is-active': isAddDosageActive }" class="modal">
                            <div class="modal-background" @click="closeModalDosage"></div>
                        </div>

                        <ModalOnSteroids 
                                :show="isModalAddMedicationOpen" 
                                :set="setIsModalAddMedicationOpen"
                                :title="`Dosificació de ${medications.find(med => med.id === activeMedication)?.name }:`"
                            >
                                <template v-slot:body>
                                    <div class="consolas">
                                        <div class="field">
                                            <div class="control">
                                                <textarea 
                                                    class="textarea input-edit-dosage"
                                                    placeholder="Encara no hi ha dosificació per aquest antibiòtic"
                                                    title="Dosificació de l'antibiòtic..."
                                                    v-model="EditDosageForm.dosage">
                                                </textarea>
                                            </div>
                                        </div>

                                        <div class="add-med">
                                            <button class="button add-button" @click="editDosage" type="submit">
                                                Actualizar
                                            </button>

                                            <button class="button add-button-delete" @click="setIsModalAddMedicationOpen(false)" type="submit">
                                                Cancelar
                                            </button>
                                        </div>
                                    </div>

                                </template>
                        </ModalOnSteroids>

                        <!-- only if IsMaager (user) is true -->
                        <div class="buttons-dosage" v-if="props.user.isManager">
                                          
                            <Button
                                @click="setIsModalAddMedicationOpen(true)"
                                class="button-dosage" 
                                :text="'Editar dosificació'" 
                            />
                    
                            <Button
                                @click="setIsModalDeleteMedicationOpen(true)"
                                class="delete-med" 
                                :text="'Eliminar medicament'" 
                                :id="activeMedication"
                            />
                        </div>

                        <ModalOnSteroids 
                            :show="isModalDeleteMedicationOpen" 
                            :set="setIsModalDeleteMedicationOpen"
                            :title="`Eliminació de medicament ${EditDosageForm.name }`"
                        >
                            <template v-slot:body>
                                <div class="consolas">Estàs segur de que vols eliminar el medicament <span>{{ EditDosageForm.name }}</span>?</div>
                                <div class="nota consolas">Aquesta opció no es podrà desfer</div>

                                <button class="button delete-medication" @click="deleteMedication(activeMedication)">Eliminar</button>
                            </template>
                        </ModalOnSteroids>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <Footer />
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

.table-header .right-align {
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

.add-med {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 20px;
}

.add-med .add-button,
.add-med .add-button-delete {
    width: 20% !important;
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

.consolas span {
    font-size: 1.2rem;
    font-weight: bold;
    text-transform: uppercase;
}

.delete-medication {
    padding: 10px 20px;
    background: red;
    border-radius: 10px;
    color: white;
    cursor: pointer;
    float: right;
}

.nota {
    font-size: 0.8rem;
    font-weight: normal;
    text-transform: none;
    color: #666;
    padding-bottom: 30px;
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
    background-color: #767676;
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

.no-medicaments {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 15px;
    padding: 15px;
}


.medication-dosage-content {
    display: flex;
    flex-direction: column;
    gap: 15px;
    background-color: #f0f0f0;
    padding: 30px 40px;
    border-radius: 10px;
}

.title-dosage {
    font-size: 1.5em;
    font-weight: bold;
}

.textarea {
    height: 300px;
    max-height: 500px;
    background-color: #f0f0f0;
    overflow-y: auto;
    resize: none;
    font-family: consolas;
}

.textarea:focus {
    background-color: #f0f0f0 !important;
}

.textarea::placeholder {
    color: #00000096;
}

.buttons-dosage {
    display: flex;
    gap: 15px;
    align-items: center;
    justify-content: center;
}

 .delete-med{
    width: 200px;
    background-color: #a90909;
}

.button-dosage{
    width: 200px;

} 

</style>