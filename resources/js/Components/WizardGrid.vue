<script setup>
import { ref, computed, onMounted } from 'vue';
import axios from 'axios';
import WizardSquare from '@/Components/WizardSquare.vue';
import { useForm } from "@inertiajs/vue3";
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextAreaOnSteroids from '@/Components/TextAreaOnSteroids.vue';
import SelectOnSteroids from '@/Components/SelectOnSteroids.vue';
import Button from '@/Components/Button.vue';

// Results
const resumes = ref([]);
const QuestionSelected = ref([]);

const submit = () => {
  // foreach question selected, axios get the resumes
  QuestionSelected.value.forEach((question) => {
    axios.get(`/get-resumes/${props.selectedOperation}/${question.id}`)
      .then(response => {
        resumes.value.push(response.data);
        console.log(resumes.value);
        props.setCrumb(3);

      });
  });
};




// push the selected questions to the array if is checked, if not, remove it
const handleQuestion = (question) => {
  if (QuestionSelected.value.includes(question)) {
    QuestionSelected.value = QuestionSelected.value.filter((item) => item !== question);
    console.log(QuestionSelected.value);
  } else {
    QuestionSelected.value.push(question);
    console.log(QuestionSelected.value);
  }
};

const props = defineProps({
  crumb: {
    type: Number,
    required: true
  },
  setCrumb: {
    type: Function,
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
  }
});

const surgeries = ref([]);
var questions = ref([]);
var isLoading = ref();


isLoading.value = true;
axios.get("/json/surgeriesWithOperations")
  .then(response => {
    surgeries.value = response.data;
  }).finally(() => {
    isLoading.value = false;
  });

function handleSurgeryClick(surgery) {
  props.setSelectedSurgery(surgery)
  props.setCrumb(1);
  props.toggleCollapse(surgery + 1);
}

function handleOperationClick(operationId) {
  questions.value = [];
  QuestionSelected.value = [];
  isLoading.value = true;
  axios.get(`/get-questions/${operationId}`)
    .then(response => {
      questions.value = response.data.questionsOperation;
    })
    .finally(() => {
      isLoading.value = false;
    });
  props.setSelectedOperation(operationId);
  props.setCrumb(2);
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
  return surgeries.value.length > 0 ? surgeries.value[props.selectedSurgery].operations.filter(op => op.id === props.selectedOperation)[0] : {};
});

// Get medications
const medications = ref([]);

onMounted(() => {
  axios.get('/medication-panel/get-medication')
    .then(response => {
      medications.value = response.data;
      console.log(medications.value);
    });
});

function addAntibioticToTextarea(e) {
  const div = document.getElementById("textAreaOnSteroids");

  if (div.innerText.length > 0) {
    div.innerHTML += "&nbsp;";
  }
  div.innerHTML += `<span style="color: white; background: #eb4034; padding: 0 8px; border-radius: 5px" length='${e.text.length}' class="dynamic-span" value='${e.value}'>${e.text}</span>&nbsp;`;

  div.focus();
  window.getSelection().collapse(div, div.childNodes.length);
}

function handleTextAreaOnSteroidsInput() {
  const spans = document.querySelectorAll("#textAreaOnSteroids span");
  spans.forEach(span => {
    let length = span.getAttribute('length');
    let realLength = span.innerText.length;
    if (realLength != length) {
      span.remove();
    }
  })

}

</script>
<template>
  <!-- All surgeries -->
  <div v-show="crumb === 0 && !isLoading" class="wizard-grid-container">
    <WizardSquare v-show="surgery.operations.length > 0" v-for="(surgery, index) in surgeries" :class="{
    'hover': props.hoveredSurgery == surgery.id,
  }" @mouseover="props.setHoveredSurgery(surgery.id)" @mouseleave="props.setHoveredSurgery(-1)"
      @click="() => handleSurgeryClick(index)" :name="surgery.name" :color="surgery.color"
      :textColor="makeTextColorReadable(surgery.color)" type="surgery" />
  </div>

  <!-- All operations with profilaxis -->
  <div v-show="crumb === 1 && !isLoading" class="wizard-grid-container">
    <WizardSquare :class="{
    'hover': props.hoveredOperation === operation.id,
  }" @mouseover="props.setHoveredOperation(operation.id)" @mouseleave="props.setHoveredOperation(-1)"
      v-for="operation in surgeries.length > 0 ? surgeries[props.selectedSurgery].operations.filter(op => op.profilaxis === 1) : []"
      @click="() => handleOperationClick(operation.id)" :name="operation.name"
      :color="surgeries[props.selectedSurgery].color"
      :textColor="makeTextColorReadable(surgeries[props.selectedSurgery].color)" type="operation" />
  </div>

  <!-- Text separator for operations without profilaxis -->
  <div
    v-show="crumb === 1 && !isLoading && surgeries.length > 0 && surgeries[props.selectedSurgery].operations.some(op => op.profilaxis === 0)">
    <h1 class="title is-1">No precisa profilaxis</h1>
  </div>


  <!-- All operations without profilaxis -->
  <div v-show="crumb === 1 && !isLoading" class="wizard-grid-container">
    <WizardSquare :class="{
    'hover': props.hoveredOperation == operation.id,
  }" @mouseover="props.setHoveredOperation(operation.id)" @mouseleave="props.setHoveredOperation(-1)"
      v-for="operation in surgeries.length > 0 ? surgeries[props.selectedSurgery].operations.filter(op => op.profilaxis === 0) : []"
      :name="operation.name" :color="makeDarkColor(surgeries[props.selectedSurgery].color)"
      :textColor="makeTextColorReadable(makeDarkColor(surgeries[props.selectedSurgery].color))" type="operation" />
  </div>

  <!-- Questions for the operation -->
  <div v-show="crumb === 2 && !isLoading" class="questions-container">
        <form @submit.prevent="submit" class="questions-manager-container">
          <h2>{{ currentOperation && currentOperation.name }}</h2>
          <div class="form__group" v-for="(question, index) in questions" :key="index">
            <div class="checkbox-wrapper-46">
              <input type="checkbox" class="inp-cbx" :id="'question_' + index" :name="'question_' + index" v-model="form['question_' + index]"/>
              <label :for="'question_' + index" class="cbx larger-label">
                <span>
                <svg viewBox="0 0 12 10" height="10px" width="12px">
                  <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                </svg>
              </span>
              <span>{{question.question}}</span>
              </label>
            </div>
          </div>
          <div class="button-btn-div">
         <Button text="Consultar" @click="submit" class="button-btn"/>
        </div>
        </form>
        <div class="questions-manager-container">
          <h2>Gestor de condicions</h2>
          <div class="manager-inputs">
            <input type="text" placeholder="Nom de la condició">
            <!-- <textarea placeholder="Instruccions de la condició"></textarea> -->
            <div class="ck-medications-editor">
              <div class="select-options">
                <SelectOnSteroids
                  @change="addAntibioticToTextarea"
                  placeholder="Selecciona un antibiòtic"
                  search-placeholder="Cerca un antibiòtic">
                  <option v-for="medication in medications" :value="medication.id">{{ medication.name }}</option>
                </SelectOnSteroids>
              </div>
              <TextAreaOnSteroids
                @input="handleTextAreaOnSteroidsInput"
                placeholder="Instruccions de la condició"
                id="textAreaOnSteroids"
                class="textAreaOnSteroids">
              </TextAreaOnSteroids>
            </div>
          </div>
          <TextAreaOnSteroids placeholder="Instruccions de la condició">
          </TextAreaOnSteroids>
        </div>
      </div>
      <button>Afegir condició</button>
    </div>
  </div>

  <!-- The result  -->

  <div v-show="crumb === 3">
    <div class="results-manager-container">
      <h2>Resultats:</h2>
      <div v-for="resume in resumes" :key="resume.id">
        <h3>- {{ resume.resume[0].resume }}</h3> <br/>
      </div>
    </div>
  </div>

  <div class="spinner-container" v-if="isLoading">
    <div class="lds-ring"></div>
  </div>
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
  grid-template-columns: 1fr 500px;
  gap: 15px;
}

.questions-operation-container,
.questions-manager-container {
  background-color: #f0f0f0;
  padding: 30px 40px;
  border-radius: 10px;
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

form>*+* {
  margin-top: 1.5rem;
}

.form__group {
  display: flex;
  align-items: center;
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
  margin: auto;
  -webkit-user-select: none;
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
  width: 18px;
  height: 18px;
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

/* textarea:active, input:active{
  outline: none;
  border: none;
}  */

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

.checkbox-wrapper-46 .cbx span:last-child {
  padding-left: 8px;
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
  width: 100px;
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
</style>