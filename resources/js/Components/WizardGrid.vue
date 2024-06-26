<script setup>
import { ref, computed, onMounted } from 'vue';
import axios from 'axios';
import WizardSquare from '@/Components/WizardSquare.vue';
import TextAreaOnSteroids from '@/Components/TextAreaOnSteroids.vue';
import SelectOnSteroids from '@/Components/SelectOnSteroids.vue';
import Boto from '@/Components/Button.vue';
import Modal from './Modal.vue';
import ModalOnSteroids from '@/Components/ModalOnSteroids.vue';


const selectedQuestions = ref([]);
const medicationsResumes = ref([]);
const resumesLoaded = ref([]);

const modalMedicationInfoBody = ref("");
const modalMedicationInfo = ref(null);
const isModalMedicationInfoOpen = ref(false);
const selectedModalMedication = ref(null);
const isModalDeleteResumeOpen = ref(false);
const selectedQuestionName = ref(null);

function setIsModalMedicationInfoOpen(value) {
  isModalMedicationInfoOpen.value = value;
  document.body.parentElement.style.overflow = value ? 'hidden' : 'auto';
}

function setIsModalDeleteResumeOpen(value, id, name) {
  selectedQuestionId.value = id;
  selectedQuestionName.value = name;
  isModalDeleteResumeOpen.value = value;
  document.body.parentElement.style.overflow = value ? 'hidden' : 'auto';
}


const handleToggleQuestion = (question) => {
  if (selectedQuestions.value.includes(question)) {
    selectedQuestions.value = selectedQuestions.value.filter((item) => item !== question);
  } else {
    selectedQuestions.value.push(question);
  }
};

const checkboxContainer = ref(null);

const props = defineProps({
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
  setSelectedSurgery: {
    type: Function,
    required: true
  },
  selectedSurgery: {
    type: Number,
    required: true
  },
  hoveredSurgery: {
    type: Number,
    required: true
  },
  hoveredOperation: {
    type: Number,
    required: true
  },
  toggleCollapse: {
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
  setHoveredSurgery: {
    type: Function,
    required: true
  },
  setHoveredOperation: {
    type: Function,
    required: true
  },
  questions: {
    type: Array,
    required: true
  },
  selectedQuestions: {
    type: Array,
    required: true
  },
  resumes: {
    type: Array,
    required: true
  },
  isLoading: {
    type: Boolean,
    required: true
  },
  setIsLoading: {
    type: Function,
    required: true
  },
  setSelectedQuestions: {
    type: Function,
    required: true
  },
  setResumes: {
    type: Function,
    required: true
  },
  surgeries: {
    type: Array,
    required: true
  },
  setSurgeries: {
    type: Function,
    required: true
  }
});

function formattedResume(resume) {
  return stylizeHTML(resume.replace(/{{(.*?)}}/g, "<span>$1</span>"));
}

function extractMedicationsResumes(resume) {
  let medications = [];
  resume.replace(/{{(.*?)}}/g, (match, p1) => {
    if (!medicationsResumes.value.includes(p1)) {
      medications.push(p1);
      medicationsResumes.value.push(p1);
    }
  });

  return medications;
}

const handleSubmitQuestionsQuery = e => {
  props.setResumes([]);
  selectedQuestions.value.forEach((question) => {
    axios.get(`/get-resumes/${props.selectedOperation}/${question.id}`)
      .then(response => {
        const newMedications = extractMedicationsResumes(response.data.resume[0].resume);

        newMedications.forEach(medicationId => {
          axios.get(`/medication-panel/get-medication-dosage/${medicationId}`)
            .then(response => {
              resumesLoaded.value.push({
                id: medicationId,
                dosage: response.data[0].dosage
              });
              const spans = document.querySelectorAll(".operation-content span[value='" + medicationId + "']");

              spans.forEach(span => {
                const dosage = resumesLoaded.value.filter(resume => resume.id == medicationId)[0].dosage;
                span.addEventListener('click', e => {
                  setIsModalMedicationInfoOpen(true);
                  selectedModalMedication.value = medicationId;
                  modalMedicationInfo.value = dosage;
                });
              });
            });
        });

        props.setResumes([...props.resumes, response.data]);
        props.setCrumb(3);
        props.setResumes([...props.resumes, response.data]);
        checkboxContainer.value.querySelectorAll("input[type=checkbox]").forEach(checkbox => checkbox.checked = false);
        selectedQuestions.value = [];
      });
  });
};

function getMedicationName(medicationId) {
  if (!medications.value) return "";
  if (!medicationId) return "";
  return medications.value.filter(medication => medication.id == medicationId)[0].name;
};

const conditionNameInput = ref(null);


props.setIsLoading(true);
axios.get("/json/surgeriesWithOperations")
  .then(response => {
    console.log(response.data);
    props.setSurgeries(response.data);
  }).finally(() => {
    props.setIsLoading(false);
  });

function handleSurgeryClick(surgery) {
  props.setSelectedSurgery(surgery)
  props.setCrumb(1);
  props.toggleCollapse(surgery + 1);
  props.setSelectedQuestions([]);
  props.setResumes([]);
}

// Modifica el color del text per fer-lo més llegible
function makeTextColorReadable(backgroundColor) {
  const rgb = backgroundColor.match(/\w\w/g).map(x => parseInt(x, 16));
  const luminance = (0.299 * rgb[0] + 0.587 * rgb[1] + 0.114 * rgb[2]) / 255;
  return luminance > 0.5 ? '#000000' : '#ffffff';
}

//Modifica el color per fer-lo més fosc
function makeDarkColor(color) {
  const rgb = color.match(/\w\w/g).map(x => parseInt(x, 16));
  const darkRgb = rgb.map(x => Math.round(x * 0.6));
  return `#${darkRgb.map(x => x.toString(16).padStart(2, '0')).join('')}`;
}

const currentOperation = computed(() => {
  return props.surgeries.length > 0 ? props.surgeries[props.selectedSurgery].operations.filter(op => op.id === props.selectedOperation)[0] : {};
});

// Get medications
const medications = ref([]);

onMounted(() => {
  axios.get('/medication-panel/get-medication')
    .then(response => {
      console.log(response.data);
      medications.value = response.data;
    });
});

const spanStyles = ref({
  backgroundColor: '#eb4034',
  borderRadius: '5px',
  padding: '0 8px',
  color: 'white',
  cursor: 'pointer',
  display: 'inline-block',
  marginTop: '5px',
});

function stylizeTextArea(textArea) {
  textArea.querySelectorAll('span').forEach(span => {
    for (const [key, value] of Object.entries(spanStyles.value)) {
      span.style[key] = value;
    }

    span.addEventListener('click', () => {
      span.remove();
    });

    span.addEventListener('mouseover', () => {
      span.style.textDecoration = 'line-through';
    });


    span.addEventListener('mouseout', () => {
      span.style.textDecoration = 'none';
    });
  });
}

function stylizeHTML(stringHTML) {
  const div = document.createElement('div');
  div.innerHTML = stringHTML;
  div.querySelectorAll('span').forEach(span => {
    span.setAttribute('value', span.innerHTML);
    span.innerHTML = medications.value.filter(medication => medication.id == span.innerHTML)[0].name;
  })
  stylizeTextArea(div);
  return div.innerHTML;
}

function addAntibioticToTextarea(e) {
  const div = document.getElementById("textAreaOnSteroids");

  if (div.innerHTML.slice(-6) != '&nbsp;' && div.innerHTML.length > 0) {
    div.innerHTML += "&nbsp;";
  }

  div.innerHTML += `<span length='${e.text.length}' value='${e.value}'>${e.text}</span>&nbsp;`;


  stylizeTextArea(div);
  div.focus();
  setCursorToEnd(div);
}

function setCursorToEnd(div) {
  window.getSelection().collapse(div, div.childNodes.length);
}

function handleTextAreaOnSteroidsInput() {
  const spans = document.querySelectorAll("#textAreaOnSteroids span");
  const div = document.getElementById("textAreaOnSteroids");


  spans.forEach(span => {
    let length = span.getAttribute('length');
    let realLength = span.innerText.length;
    if (realLength - 1 == length) {
      realLength--;
      let lastCharacter = span.innerText.slice(-1);
      if (lastCharacter.charCodeAt(0) != 160) {
        lastCharacter = " " + lastCharacter;
      }

      span.innerText = span.innerText.slice(0, -1);
      div.innerHTML += lastCharacter;
      setCursorToEnd(div);
    }

    if (realLength != length) {
      span.remove();
    }
  })
  stylizeTextArea(div);

}

function handleAddCondition() {
  const textArea = document.getElementById("textAreaOnSteroids");
  let resume = "";

  textArea.childNodes.forEach(node => {
    let isSpan = !node.length;

    if (isSpan) {
      resume += `{{${node.getAttribute("value")}}}`;
    } else {
      resume += node.textContent;
    }
  });


  axios.post('/wizard/question/add', {
    resume: resume,
    operationId: props.selectedOperation,
    question: conditionNameInput.value.value
  }).then(response => {
    props.setSelectedOperation(props.selectedOperation);

    textArea.innerHTML = "";
    conditionNameInput.value.value = "";
  });
}

const isModalDeleteOpen = ref(false);
const selectedQuestionId = ref(null);

function closeModalDelete() {
  isModalDeleteOpen.value = false;
}

function openModalDelete(questionId) {
  selectedQuestionId.value = questionId;
  isModalDeleteOpen.value = true;
}

function deleteQuestion(id) {

  axios.post('/wizard/resume/delete', {
    operationId: props.selectedOperation,
    questionId: id
  }).then(response => {
    setIsModalDeleteResumeOpen(false);
    props.setSelectedOperation(props.selectedOperation);
  });
}

const computeModalMedicationInfo = computed(() => {
  if (modalMedicationInfo.value) {
    return modalMedicationInfo.value.replaceAll("\n", "<br>");
  }
  return "";
});

</script>
<template>
  <!-- All surgeries -->
  <div v-show="crumb === 0 && !isLoading" class="wizard-grid-container">
    <WizardSquare
      v-show="surgery.operations.length > 0"
      v-for="(surgery, index) in surgeries"
      type="surgery"
      :surgeryId="surgery.id"
      :class="{
    'hover': props.hoveredSurgery == surgery.id,
  }" @mouseover="props.setHoveredSurgery(surgery.id)" @mouseleave="props.setHoveredSurgery(-1)"
      @click="() => handleSurgeryClick(index)" :name="surgery.name" :color="surgery.color"
      :textColor="makeTextColorReadable(surgery.color)"/>
  </div>

  <!-- All operations with profilaxis -->
  <div v-show="crumb === 1 && !isLoading" class="wizard-grid-container">
    <WizardSquare 
      :class="{
        'hover': props.hoveredOperation === operation.id,
      }"
      type="operation"
      :operationId="operation.id"
      @mouseover="props.setHoveredOperation(operation.id)" 
      @mouseleave="props.setHoveredOperation(-1)"
      v-for="operation in props.surgeries.length > 0 ? props.surgeries[props.selectedSurgery].operations.filter(op => op.profilaxis === 1) : []"
      @click="() => props.setSelectedOperation(operation.id)" 
      :name="operation.name"
      :color="props.surgeries[props.selectedSurgery].color"
      :textColor="makeTextColorReadable(props.surgeries[props.selectedSurgery].color)" />
  </div>

  <!-- Text separator for operations without profilaxis -->
  <div
    v-show="crumb === 1 && !isLoading && props.surgeries.length > 0 && props.surgeries[props.selectedSurgery].operations.some(op => op.profilaxis === 0)">
    <h1 class="title is-1">No precisa profilaxis</h1>
  </div>


  <!-- All operations without profilaxis -->
  <div v-show="crumb === 1 && !isLoading" class="wizard-grid-container">
    <WizardSquare
      :class="{
        'hover': props.hoveredOperation == operation.id,
      }"
      v-for="operation in props.surgeries.length > 0 ? props.surgeries[props.selectedSurgery].operations.filter(op => op.profilaxis === 0) : []"
      type="operation"
      :operationId="operation.id"
      @mouseover="props.setHoveredOperation(operation.id)" 
      @mouseleave="props.setHoveredOperation(-1)"
      :name="operation.name" 
      :color="makeDarkColor(props.surgeries[props.selectedSurgery].color)"
      :textColor="makeTextColorReadable(makeDarkColor(props.surgeries[props.selectedSurgery].color))" />
  </div>
  <div v-show="crumb === 2 && !isLoading" :class="{ 'questions-container': true, 'show-both': props.user.isAdmin == 1 || props.user.isManager == 1 }">
    <div class="questions-manager-container" ref="checkboxContainer">
      <h2>{{ currentOperation && currentOperation.name ? currentOperation.name : 'Encara no hi ha nom' }}</h2>
      <div class="questions">
        <div class="form__group" v-for="(question, index) in questions" :key="index">
          <div class="checkbox-wrapper-46 flex">
            <input
              type="checkbox" 
              class="inp-cbx" 
              :id="'question_' + index" 
              :name="'question_' + index" 
              @change="() => handleToggleQuestion(question)"
            >
            <label :for="'question_' + index" class="cbx larger-label">
              <span>
                <svg viewBox="0 0 12 10" height="10px" width="12px">
                  <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                </svg>
              </span>
              <span>{{ question.question }}</span>
            </label>
            
            <svg v-show="props.user.isAdmin == 1 || props.user.isManager == 1"
              xmlns="http://www.w3.org/2000/svg" 
              viewBox="0 0 448 512" 
              class="icons"
              @click="setIsModalDeleteResumeOpen(true, question.id, question.question)"
            >
              <path
                d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" 
              />
            </svg>
          </div>
        </div>
      </div>

      <div class="button-btn-div">
        <Boto
          @click="handleSubmitQuestionsQuery"
          text="Consultar" 
          type="submit" 
          class="button-btn" 
          :id="props.selectedOperation"
        >
        </Boto>
      </div>
    </div>
    <div v-show="props.user.isAdmin == 1 || props.user.isManager == 1" class="questions-manager-container">
      <h2>Gestor de condicions</h2>
      <div class="manager-inputs">
        <input type="text" placeholder="Nom de la condició" ref="conditionNameInput" title="Nom de la condició">
        <div class="ck-medications-editor">
          <div class="select-options">
            <label for="cercador"></label>
            <SelectOnSteroids 
              :update-header="false" +
              @change="addAntibioticToTextarea"
              placeholder="Selecciona un antibiòtic" search-placeholder="Cerca un antibiòtic" title="Cercador d'antibiotics"  name="cercador" id="cercador"
            >
              <option v-for="medication in medications" :value="medication.id">{{ medication.name }}</option>
            </SelectOnSteroids>
          </div>
          <TextAreaOnSteroids @input="handleTextAreaOnSteroidsInput" placeholder="Instruccions de la condició"
            id="textAreaOnSteroids" class="textAreaOnSteroids">
          </TextAreaOnSteroids>
        </div>
      </div>
      <Boto @click="handleAddCondition" text="Afegir condició" type="submit" class="button-btn-condition" title="Afegir Condició"></Boto>
    </div>
  </div>


  <!-- The result  -->
  <div v-show="crumb === 3">
    <div class="results-manager-container">
      <div v-for="resume in resumes" :key="resume.id" class="operation-container">
        <h3 class="operation">{{ questions.filter(q => q.id == resume.resume[0].questionId)[0].question }}</h3>
        <span class="operation-content" v-html="formattedResume(resume.resume[0].resume)"></span>
      </div>
    </div>
  </div>

  <div class="spinner-container" v-if="isLoading">
    <div class="lds-ring"></div>
  </div>

  <ModalOnSteroids :show="isModalMedicationInfoOpen" :set="setIsModalMedicationInfoOpen"
    :title="`Informació de ${getMedicationName(selectedModalMedication)}`">
    <template v-slot:body>
      <div class="consolas-wrapper">
        <div v-html="computeModalMedicationInfo" class="consolas"></div>
      </div>
    </template>
  </ModalOnSteroids>

  <ModalOnSteroids
    :show="isModalDeleteResumeOpen" 
    :set="setIsModalDeleteResumeOpen"
    :title="`Eliminació del resum ${selectedQuestionName}`"
  >
    <template v-slot:body>
      <div class="consolas-resum">Estàs segur de que vols eliminar el resum <span>{{ selectedQuestionName }}</span>?</div>
      <div class="nota-resum">Aquesta opció no es podrà desfer</div>

      <button class="btn_delete" @click="deleteQuestion(selectedQuestionId)">Eliminar</button>
    </template>
  </ModalOnSteroids>
</template>

<style scoped>
.wizard-grid-container {
  display: grid;
  gap: 15px;
  grid-template-columns: repeat(auto-fit, minmax(230px, auto));
}

.larger-label {
  font-size: 1.2em;
}

.questions-container {
  display: grid;
  grid-template-columns: auto;
  gap: 15px;
}

.questions-operation-container,
.questions-manager-container {
  width: 100%;
  background-color: #f0f0f0;
  padding: 30px 40px;
  border-radius: 10px;
}

.questions-container.show-both {
  grid-template-columns: 1.25fr 1fr;
}

.questions-container h2 {
  font-size: 1.5em;
  font-weight: bold;
}

.grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(20rem, 1fr));
  gap: 3rem;
}

.wrapper {
  max-width: 75rem;
  width: 100%;
  padding: min(3rem, 5vw);
}

legend {
  font-weight: 900;
  font-size: 1.5em;
}

form > * + * {
  margin-top: 1.5rem;
}

.questions {
  display: grid;
  justify-items: start;
  gap: 24px;
}

.form__group:first-child {
  margin-top: 24px;
}

@media screen and (max-width: 1150px) {
  .questions-container {
    display: grid;
    grid-template-columns: 1fr !important;
  }

  .button-btn-div {
    justify-content: flex-start !important;
  }
}

.select-options {
  max-width: fit-content;
}

input[type="checkbox"],
input[type="radio"] {
  width: 1.5em;
  height: 1.5em;
  margin-right: 0.65rem;
}

.checkbox-wrapper-46 input[type="checkbox"] {
  display: none;
  visibility: hidden;
}

.checkbox-wrapper-46 .cbx {
  display: flex;
  align-items: center;
  margin: auto;
  user-select: none;
  cursor: pointer;
}

.checkbox-wrapper-46 .cbx span {
  display: inline-block;
  vertical-align: middle;
  transform: translate3d(0, 0, 0);
}

.checkbox-wrapper-46 .cbx span:first-child {
  position: relative;
  min-width: 18px;
  min-height: 18px;
  border-radius: 3px;
  transform: scale(1);
  vertical-align: middle;
  border: 1px solid #9098a9;
  transition: all 0.2s ease;
}

.checkbox-wrapper-46 .cbx span:first-child svg {
  position: absolute;
  top: 3px;
  left: 2px;
  fill: none;
  stroke: #ffffff;
  stroke-width: 2;
  stroke-linecap: round;
  stroke-linejoin: round;
  stroke-dasharray: 16px;
  stroke-dashoffset: 16px;
  transition: all 0.3s ease;
  transition-delay: 0.1s;
  transform: translate3d(0, 0, 0);
}

.manager-inputs {
  display: grid;
  gap: 15px;
  margin-top: 24px;
}

.manager-inputs>* {
  display: block;
  resize: none;
  width: 100%;
}

input,
textarea {
  border: none;
  border-radius: 5px;
}

input:focus,
textarea:focus {
  border-color: inherit;
  box-shadow: none;
}

.checkbox-wrapper-46 .cbx span:first-child:before {
  content: "";
  width: 100%;
  height: 100%;
  background: #506eec;
  display: block;
  transform: scale(0);
  opacity: 1;
  border-radius: 50%;
}

.checkbox-wrapper-46 .cbx:hover span:first-child {
  border-color: #506eec;
}

.checkbox-wrapper-46 .inp-cbx:checked+.cbx span:first-child {
  background: #506eec;
  border-color: #506eec;
  animation: wave-46 0.4s ease;
}

.checkbox-wrapper-46 .inp-cbx:checked+.cbx span:first-child svg {
  stroke-dashoffset: 0;
}

.checkbox-wrapper-46 .inp-cbx:checked+.cbx span:first-child:before {
  transform: scale(3.5);
  opacity: 0;
  transition: all 0.6s ease;
}

@keyframes wave-46 {
  50% {
    transform: scale(0.9);
  }
}


.mydict {
  display: flex;
  justify-content: flex-start;
}

:focus {
  outline: 0;
  border-color: #2260ff;
  box-shadow: 0 0 0 4px #b5c9fc;
}

.mydict div {
  display: flex;
  flex-wrap: wrap;
  margin-top: 0.5rem;
  justify-content: center;
}

.mydict input[type="radio"] {
  clip: rect(0 0 0 0);
  clip-path: inset(100%);
  height: 1px;
  overflow: hidden;
  position: absolute;
  white-space: nowrap;
  width: 1px;
}

.mydict input[type="radio"]:checked+span {
  box-shadow: 0 0 0 0.0625em #0043ed;
  background-color: #dee7ff;
  z-index: 1;
  color: #0043ed;
}

.radio span {
  display: block;
  cursor: pointer;
  background-color: #fff;
  padding: 0.375em .75em;
  position: relative;
  margin-left: .0625em;
  box-shadow: 0 0 0 0.0625em #b5bfd9;
  letter-spacing: .05em;
  color: #3e4963;
  text-align: center;
  transition: background-color .5s ease;
}

.radio:first-child span {
  border-radius: .375em 0 0 .375em;
}

.radio:last-child span {
  border-radius: 0 .375em .375em 0;
}


.spinner-container {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 9999;
}

.lds-ring {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
}

.lds-ring div {
  box-sizing: border-box;
  display: block;
  position: absolute;
  width: 64px;
  height: 64px;
  margin: 8px;
  border: 8px solid #000;
  border-radius: 50%;
  animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
  border-color: #000 transparent transparent transparent;
}

.lds-ring div:nth-child(1) {
  animation-delay: -0.45s;
}

.lds-ring div:nth-child(2) {
  animation-delay: -0.3s;
}

.lds-ring div:nth-child(3) {
  animation-delay: -0.15s;
}

@keyframes lds-ring {
  0% {
    transform: rotate(0deg);
  }

  100% {
    transform: rotate(360deg);
  }
}

.button-btn-div {
  display: flex;
  justify-content: center;
  margin-top: 20px;
}

.button-btn {
  height: 40px;
  width: auto;
}

.button-btn-condition {
  height: 40px;
  width: auto;
  margin-top: 20px;
}

.results-manager-container {
  background-color: #f0f0f0;
  padding: 30px 40px;
  border-radius: 10px;
}

.results-manager-container h2 {
  font-size: 1.5em;
  font-weight: bold;
}

.flex span {
  padding-left: 8px;
}

.flex .icons {
  min-width: 20px;
  max-width: 20px;
  cursor: pointer;
  margin-left: 15px;
}

.btn_delete {
  padding: 10px;
  background: red;
  border-radius: 10px;
  color: white;
  float: right;
  cursor: pointer;
}

.operation {
  color: #000;
  width: fit-content;
  padding: 5px 10px;
  font-size: 1.5em;
  font-weight: bold;
  border-radius: 10px;
}

.operation-container:not(:first-child) {
  margin-top: 50px;
}

.operation-content {
  display: block;
  border-radius: 10px;
  margin-top: 10px;
  padding: 7px 10px;
}

.consolas {
  font-family: 'Consolas', monospace;
  background: #eee;
  padding: 10px;
  line-height: 1.75;
}

.consolas-wrapper {
  border: 1px solid black;
  border-radius: 5px;
  height: 100%;
  overflow-y: scroll;
}

.consolas-resum span {
  font-size: 1.2rem;
  font-weight: bold;
  text-transform: uppercase;
}

.nota-resum {
  font-size: 0.8rem;
  font-weight: normal;
  text-transform: none;
  color: #666;
}
</style>