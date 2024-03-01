<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { useForm,router } from '@inertiajs/vue3';

const activeMedication = ref(1);

const toggleMedication = (index) => {
    activeMedication.value = index;
};

const hideAllMedications = () => {
    document.querySelectorAll('.medicationcontent > div').forEach((medication, index) => {
        if (index !== activeMedication.value - 1) {
            medication.style.display = 'none';
        } else {
            medication.style.display = 'block';
        }
    });
};

onMounted(() => {
    hideAllMedications();
});

const showModal = () => {
    const modal = document.getElementById('image-modal');
    modal.classList.add('is-active');
};

const closeModal = () => {
    const modal = document.getElementById('image-modal');
    modal.classList.remove('is-active');
};

const showModalDosis = () => {
    const modal = document.getElementById('image-modal-dosis');
    modal.classList.add('is-active');
};

const closeModalDosis = () => {
    const modal = document.getElementById('image-modal-dosis');
    modal.classList.remove('is-active');
};


const showModalEditar = () => {
    const modal = document.getElementById('image-modal-editar');
    modal.classList.add('is-active');
};

const closeModalEditar = () => {
    const modal = document.getElementById('image-modal-editar');
    modal.classList.remove('is-active');
};

const showModalCondicio = () => {
    const modal = document.getElementById('condicio-modal');
    modal.classList.add('is-active');
};

const closeModalCondicio = () => {
    const modal = document.getElementById('condicio-modal');
    modal.classList.remove('is-active');
};

const medications = ref([]);

onMounted(() => {
    axios.get('/medication-panel/get-medication')
        .then(response => {
            medications.value = response.data;
        })
        .catch(error => {
            console.log(error);
        });
});

// form to add a new medication
const addMedication = useForm({
    name: '',
});

const submit = () => {
    addMedication.post('/medication-panel/add-medication', {
        onSuccess: () => {
            getMedications()
            closeModal();
         
        }
    });
};

function getMedications(){
    axios.get('/medication-panel/get-medication')
        .then(response => {
            medications.value = response.data;
        })
        .catch(error => {
            console.log(error);
        });

}


</script>

<template>
    <body>
        <div class="medications">
            <div class="medication-button">
                <div class="medicationbuttons" v-for="medication in medications" :key="medication.id">

                    <a href="#" class="medicationbutton" :class="{ active: activeMedication === medication.id }" :value="medication.id"
                        @click="toggleMedication(medication.id)">
                        {{ medication.name }}
                    </a>
                </div>
            </div>
            <div class="afegirmedicament">
                <div id="image-modal" class="modal">
                    <div class="modal-background" @click="closeModal"></div>
                    <form @submit.prevent="submit">
                        <div class="modal-content">
                            <div class="modal-card">
                                <section class="modal-card-body">
                                    <div class="field">
                                        <label class="label">Nom del medicament:</label>
                                        <div class="control">
                                            <input class="input" type="text" placeholder="Nom del medicament..."
                                                v-model="addMedication.name">
                                        </div>
                                    </div>
                                </section>
                                <footer class="modal-card-foot">
                                    <button class="button is-success afegirmedicamentbtn" type="submit">Afegir</button>
                                    <button class="button" @click="closeModal" type="button">Cancelar</button>
                                </footer>
                            </div>
                        </div>
                        <button id="image-modal-close" class="modal-close" @click="closeModal"></button>
                    </form>
                </div>
                <button class="afegirmedicamentbtn" id="showModal" @click="showModal">
                    + Afegir medicament
                </button>
            </div>
        </div>

        <div class="medicationcotent">
            <div class="medication1btn" v-show="activeMedication === 1">
                <div class="afegir">
                    <div id="image-modal-dosis" class="modal">
                        <div class="modal-background" @click="closeModalDosis"></div>
                        <!-- header -->
                        <div class="modal-header">
                            <p class="modal-header-title">Afegir dosi</p>
                        </div>
                        <div class="modal-content">
                            <div class="modal-card">

                                <section class="modal-card-body">
                                    <div class="field">
                                        <label class="label label-dosis">Afegir una nova dosis:</label>
                                        <div class="control">
                                            <input class="input" type="text" placeholder="Dosis: ">

                                            <input class="input" type="text" placeholder="Condició: ">
                                        </div>
                                    </div>
                                </section>
                                <footer class="modal-card-foot">
                                    <button class="button is-success afegirmedicamentbtn">Afegir</button>
                                    <button class="button" @click="closeModalDosis">Cancelar</button>
                                </footer>
                            </div>
                        </div>
                        <button id="image-modal-close" class="modal-close" @click="closeModalDosis"></button>
                    </div>
                    <button class="afegirdosi" id="showModalDosis" @click="showModalDosis">
                        + Afegir dosi
                    </button>
                    <div class="modal" id="condicio-modal">
                        <div class="modal-background" @click="closeModalCondicio"></div>
                        <div class="modal-card">

                            <section class="modal-card-body">
                                <div class="field">
                                    <div class="control select-dosis">
                                        <label class="label label-dosis">Dosis:</label>

                                        <select class="select">
                                            <option>5mg/kg</option>
                                            <option>120mg/kg</option>
                                        </select>
                                    </div>
                                    <label class="label label-dosis mt-5">Condició:</label>
                                    <div class="control edit-select">

                                        <div class="select edit-select-div">


                                            <select>
                                                <option disabled selected>Selecciona una opció</option>
                                                <option>Opció 1</option>
                                                <option>Opció 2</option>
                                                <option>Opció 3</option>
                                            </select>
                                        </div>
                                        <input class="input" type="number" placeholder="Minim: ">
                                        <input class="input" type="number" placeholder="Maxim: ">
                                    </div>
                                </div>
                            </section>
                            <footer class="modal-card-foot">
                                <button class="button is-success afegirmedicamentbtn">Afegir</button>
                                <button class="button" @click="closeModalCondicio">Cancel</button>
                            </footer>
                        </div>
                    </div>
                    <button class="afegirdosi" id="showModalCondicio" @click="showModalCondicio">
                        + Afegir condició
                    </button>
                </div>
                <table class="table is-hoverable">
                    <thead>
                        <tr class="table-header">
                            <th class="left-align">Dosis</th>
                            <th class="left-align">Condició</th>
                            <th class="right-align">Acció</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td rowspan="4">5mg/kg</td>
                            <td>Clcr > 60ml/min</td>
                            <td class="right-align">
                                <button class="button is-danger is-outlined drop">
                                    <img src="../../assets/svg/basura.svg" alt="Drop" width="20px" height="20px">
                                </button>
                                <button class="button is-success is-outlined editar">
                                    <img src="../../assets/svg/lapiz.svg" alt="Editar" width="20px" height="20px">
                                </button>
                            </td>
                        </tr>
                        <tr>

                            <td>Clcr 40-60ml/min</td>
                            <td class="right-align">
                                <button class="button is-danger is-outlined drop">
                                    <img src="../../assets/svg/basura.svg" alt="Drop" width="20px" height="20px">
                                </button>
                                <div class="modal" id="image-modal-editar">

                                    <div class="modal-background" @click="closeModalEditar"></div>
                                    <div class="modal-card">

                                        <section class="modal-card-body">
                                            <div class="field">
                                                <label class="label label-dosis ">Condició:</label>
                                                <div class="control edit-select">

                                                    <div class="select edit-select-div">


                                                        <select>
                                                            <option disabled selected>Selecciona una opció</option>
                                                            <option>Opció 1</option>
                                                            <option>Opció 2</option>
                                                            <option>Opció 3</option>
                                                        </select>
                                                    </div>
                                                    <input class="input" type="number" placeholder="Minim: ">
                                                    <input class="input" type="number" placeholder="Maxim: ">
                                                </div>
                                            </div>
                                        </section>
                                        <footer class="modal-card-foot">
                                            <button class="button is-success afegirmedicamentbtn">Afegir</button>
                                            <button class="button" @click="closeModalEditar">Cancelar</button>
                                        </footer>
                                    </div>
                                </div>
                                <button class="button is-success is-outlined editar" id="showModalEditar"
                                    @click="showModalEditar">
                                    <img src="../../assets/svg/lapiz.svg" alt="Editar" width="20px" height="20px">
                                </button>

                            </td>
                        </tr>
                        <tr>

                            <td>Clcr 20-40ml/min</td>
                            <td class="right-align"> <button class="button is-danger is-outlined drop">
                                    <img src="../../assets/svg/basura.svg" alt="Drop" width="20px" height="20px">
                                </button>
                                <button class="button is-success is-outlined editar">
                                    <img src="../../assets/svg/lapiz.svg" alt="Editar" width="20px" height="20px">
                                </button>
                            </td>
                        </tr>
                        <tr>

                            <td>Clcr 20ml/min</td>
                            <td class="right-align"> <button class="button is-danger is-outlined drop">
                                    <img src="../../assets/svg/basura.svg" alt="Drop" width="20px" height="20px">
                                </button>
                                <button class="button is-success is-outlined editar">
                                    <img src="../../assets/svg/lapiz.svg" alt="Editar" width="20px" height="20px">
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="2">120mg/kg</td>
                            <td>Clcr > 60ml/min</td>
                            <td class="right-align"> <button class="button is-danger is-outlined drop">
                                    <img src="../../assets/svg/basura.svg" alt="Drop" width="20px" height="20px">
                                </button>
                                <button class="button is-success is-outlined editar">
                                    <img src="../../assets/svg/lapiz.svg" alt="Editar" width="20px" height="20px">
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>Clcr 40-60ml/min</td>
                            <td class="right-align"> <button class="button is-danger is-outlined drop">
                                    <img src="../../assets/svg/basura.svg" alt="Drop" width="20px" height="20px">
                                </button>
                                <button class="button is-success is-outlined editar">
                                    <img src="../../assets/svg/lapiz.svg" alt="Editar" width="20px" height="20px">
                                </button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="medication2btn" v-show="activeMedication === 2">
                <div class="afegir">
                    <div class="afegir">
                        <div id="image-modal-dosis" class="modal">
                            <div class="modal-background" @click="closeModalDosis"></div>
                            <div class="modal-content">
                                <div class="modal-card">
                                    <section class="modal-card-body">
                                        <div class="field">
                                            <label class="label label-dosis">Nom del medicament:</label>
                                            <div class="control">
                                                <input class="input" type="text" placeholder="Nom del medicament...">
                                            </div>
                                        </div>
                                    </section>
                                    <footer class="modal-card-foot">
                                        <button class="button is-success afegirmedicamentbtn">Afegir</button>
                                        <button class="button" @click="closeModalDosis">Cancelar</button>
                                    </footer>
                                </div>
                            </div>
                            <button id="image-modal-close" class="modal-close" @click="closeModalDosis"></button>
                        </div>
                        <button class="afegirdosi" id="showModalDosis" @click="showModalDosis">
                            + Afegir dosi
                        </button>
                    </div>
                </div>
                <table class="table is-hoverable">
                    <thead>
                        <tr class="table-header">
                            <th>Dosis</th>
                            <th>Condició</th>
                            <th class="right-align">Acció</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>5mg/kg</td>
                            <td>Clcr > 60ml/min</td>
                            <td class="right-align"> <button class="button is-danger is-outlined drop">
                                    <img src="../../assets/svg/basura.svg" alt="Drop" width="20px" height="20px">
                                </button>
                                <button class="button is-success is-outlined editar">
                                    <img src="../../assets/svg/lapiz.svg" alt="Editar" width="20px" height="20px">
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>5mg/kg</td>
                            <td>Clcr 40-60ml/min</td>
                            <td class="right-align"> <button class="button is-danger is-outlined drop">
                                    <img src="../../assets/svg/basura.svg" alt="Drop" width="20px" height="20px">
                                </button>
                                <button class="button is-success is-outlined editar">
                                    <img src="../../assets/svg/lapiz.svg" alt="Editar" width="20px" height="20px">
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>5mg/kg</td>
                            <td>Clcr 20-40ml/min</td>
                            <td class="right-align"> <button class="button is-danger is-outlined drop">
                                    <img src="../../assets/svg/basura.svg" alt="Drop" width="20px" height="20px">
                                </button>
                                <button class="button is-success is-outlined editar">
                                    <img src="../../assets/svg/lapiz.svg" alt="Editar" width="20px" height="20px">
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>5mg/kg</td>
                            <td>Clcr 20ml/min</td>
                            <td class="right-align"> <button class="button is-danger is-outlined drop">
                                    <img src="../../assets/svg/basura.svg" alt="Drop" width="20px" height="20px">
                                </button>
                                <button class="button is-success is-outlined editar">
                                    <img src="../../assets/svg/lapiz.svg" alt="Editar" width="20px" height="20px">
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="medication3btn" v-show="activeMedication === 3">
                <div class="afegir">
                    <div class="afegir">
                        <div id="image-modal-dosis" class="modal">
                            <div class="modal-background" @click="closeModalDosis"></div>
                            <div class="modal-content">
                                <div class="modal-card">
                                    <section class="modal-card-body">
                                        <div class="field">
                                            <label class="label label-dosis">Nom del medicament:</label>
                                            <div class="control">
                                                <input class="input" type="text" placeholder="Nom del medicament...">
                                            </div>
                                        </div>
                                    </section>
                                    <footer class="modal-card-foot">
                                        <button class="button is-success afegirmedicamentbtn">Afegir</button>
                                        <button class="button" @click="closeModalDosis">Cancelar</button>
                                    </footer>
                                </div>
                            </div>
                            <button id="image-modal-close" class="modal-close" @click="closeModalDosis"></button>
                        </div>
                        <button class="afegirdosi" id="showModalDosis" @click="showModalDosis">
                            + Afegir dosi
                        </button>
                    </div>
                </div>
                <table class="table is-hoverable">
                    <thead>
                        <tr class="table-header">
                            <th>Dosis</th>
                            <th>Condició</th>
                            <th class="right-align">Acció</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>5mg/kg</td>
                            <td>Clcr > 60ml/min</td>
                            <td class="right-align"> <button class="button is-danger is-outlined drop">
                                    <img src="../../assets/svg/basura.svg" alt="Drop" width="20px" height="20px">
                                </button>
                                <button class="button is-success is-outlined editar">
                                    <img src="../../assets/svg/lapiz.svg" alt="Editar" width="20px" height="20px">
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>5mg/kg</td>
                            <td>Clcr 40-60ml/mindgbgfbfdbgfdbgfdbfd</td>
                            <td class="right-align"> <button class="button is-danger is-outlined drop">
                                    <img src="../../assets/svg/basura.svg" alt="Drop" width="20px" height="20px">
                                </button>
                                <button class="button is-success is-outlined editar">
                                    <img src="../../assets/svg/lapiz.svg" alt="Editar" width="20px" height="20px">
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>5mg/kg</td>
                            <td>Clcr 20-40ml/min</td>
                            <td class="right-align"> <button class="button is-danger is-outlined drop">
                                    <img src="../../assets/svg/basura.svg" alt="Drop" width="20px" height="20px">
                                </button>
                                <button class="button is-success is-outlined editar">
                                    <img src="../../assets/svg/lapiz.svg" alt="Editar" width="20px" height="20px">
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>5mg/kg</td>
                            <td>Clcr 20ml/min</td>
                            <td class="right-align"> <button class="button is-danger is-outlined drop">
                                    <img src="../../assets/svg/basura.svg" alt="Drop" width="20px" height="20px">
                                </button>
                                <button class="button is-success is-outlined editar">
                                    <img src="../../assets/svg/lapiz.svg" alt="Editar" width="20px" height="20px">
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</template>

<style scoped>
body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}

.medications {
    position: fixed;
    width: 200px;
    height: 100%;
    background-color: #ffffff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

    display: flex;
    flex-direction: column;
    justify-content: space-between;

}


.medicationbuttons {
    display: flex;
    flex-direction: column;
}


.medicationbutton {
    padding: 10px;
    margin: 5px 0;
    color: #296fa8;
    text-align: center;
    text-decoration: none;
    display: block;
    transition: 0.3s;
    border-bottom: 2px solid #296fa8;
}

.medicationbutton:hover {
    background-color: #296fa8;
    color: #ffffff;
    border-radius: 5px;
}

.medicationcotent {
    margin-left: 200px;
    padding: 20px;
}

.medicationbutton.active {
    background-color: #296fa8;
    color: #ffffff;
    border-radius: 5px;
}

.drop {
    margin-right: 10px;
    border-color: #0000001b !important;
}

.editar {
    border-color: #0000001b !important;
}

.drop:hover {
    border-color: transparent !important;
}

.editar:hover {
    border-color: transparent !important;
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
    border-radius: 5px;
}

.afegir {
    margin-top: 20px;
    margin-bottom: 20px;
    text-align: right;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: flex-end;


}

.afegirdosi {
    padding: 10px;
    background-color: #296fa8;
    color: #ffffff;
    border: none;
    border-radius: 5px;
    transition: 0.3s;
    font-weight: bold;
    margin-bottom: 5px;
}

.afegirdosi:hover {
    background-color: #132d42;
    color: #ffffff;

}

.table-header {

    .left-align {
        text-align: left;
    }

    .right-align {
        text-align: right;

    }


}

.right-align {
    text-align: right;
    margin-right: 10px;
}

.afegirmedicament {
    margin-top: 20px;

}

.afegirmedicamentbtn {
    padding: 10px;
    background-color: #296fa8;
    color: #ffffff;
    border: none;
    border-radius: 5px;
    transition: 0.3s;
    font-weight: bold;
    font-size: 15px;
}

.afegirmedicamentbtn:hover {
    background-color: #132d42;
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
</style>