<script setup>
  import { ref } from 'vue';
  import axios from 'axios';
  import WizardSquare from '@/Components/WizardSquare.vue';
  import { useForm } from "@inertiajs/vue3";
  import PrimaryButton from '@/Components/PrimaryButton.vue';

  let form = useForm({
    alergic: false,
    mrsa: false,
    gender: "",
});

const submit = () => {
  if (form.gender == ""){
    alert("Selecciona un género");
    return;
  }
  console.log(form);
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
  });

  const surgeries = ref([]);
  const selectedOperation = ref(0);

  axios.get("/json/surgeriesWithOperations")
  .then(response => {
    surgeries.value = response.data;
  });

  function handleSurgeryClick(surgery) {
    props.setSelectedSurgery(surgery)
    props.setCrumb(1);
  }

  function handleOperationClick(operation) {
    selectedOperation.value = operation;
    props.setCrumb(2);
  }

  //Modifica el color del texto para hacerlo mas legible
  function makeTextColorReadable(backgroundColor) {
    const rgb = backgroundColor.match(/\w\w/g).map(x => parseInt(x, 16));
    const luminance = (0.299 * rgb[0] + 0.587 * rgb[1] + 0.114 * rgb[2]) / 255;
    return luminance > 0.5 ? '#000000' : '#ffffff';
}

//Modifica el color para hacerlo mas oscuro
function makeDarkColor(color) {
    const rgb = color.match(/\w\w/g).map(x => parseInt(x, 16));
    const darkRgb = rgb.map(x => Math.round(x * 0.6));
    return `#${darkRgb.map(x => x.toString(16).padStart(2, '0')).join('')}`;
  }

</script>
<template>

  <div class="wizard-grid-container">
    <!-- Mostrando todas las cirugías -->
    <WizardSquare
      v-show="crumb === 0"
      v-for="(surgery, index) in surgeries"
      @click="() => handleSurgeryClick(index)"
      :name="surgery.name"
      :color="surgery.color"
      :textColor="makeTextColorReadable(surgery.color)"
      type="surgery"
    />
  </div>

  <!-- Filtrando operaciones con el atributo 'profilaxis' en 1 -->    
  <div class="wizard-grid-container">
    <WizardSquare
      v-show="crumb === 1"
      v-for="operation in surgeries.length > 0 ? surgeries[props.selectedSurgery].operations.filter(op => op.profilaxis === 1) : []"
      @click="() => handleOperationClick(operation.id)"
      :name="operation.name"
      :color="surgeries[props.selectedSurgery].color"
      :textColor="makeTextColorReadable(surgeries[props.selectedSurgery].color)"
      type="operation"
    />
  </div>

  <!-- Verificando si hay operaciones sin profilaxis -->
  <div v-show="crumb === 1 && surgeries.length > 0 && surgeries[props.selectedSurgery].operations.some(op => op.profilaxis === 0)">
    <h1 class="title is-1">No precisa profilaxis</h1>
  </div>

  <div class="wizard-grid-container">
    <!-- Filtrando operaciones sin profilaxis -->
    <WizardSquare
      v-show="crumb === 1"
      v-for="operation in surgeries.length > 0 ? surgeries[props.selectedSurgery].operations.filter(op => op.profilaxis === 0) : []"
      :name="operation.name"
      :color="makeDarkColor(surgeries[props.selectedSurgery].color)"
      :textColor="makeTextColorReadable(makeDarkColor(surgeries[props.selectedSurgery].color))"
      type="operation"
    />
  </div>

  <div v-show="crumb === 2" class="rectangle">
  <div class="wrapper">
    <div class="grid">
      <form @submit.prevent="submit">
        <legend>Preguntes</legend>
        <div class="form__group">
          <div class="checkbox-wrapper-46">
            <input type="checkbox" id="alergic" class="inp-cbx" value="alergic" name="alergic" v-model="form.alergic"/>
            <label for="alergic" class="cbx larger-label"
              ><span>
                <svg viewBox="0 0 12 10" height="10px" width="12px">
                  <polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span
              ><span>Al·lergic a la penicilina</span>
            </label>
          </div>
        </div>
        <div class="form__group">
          <div class="checkbox-wrapper-46">
            <input type="checkbox" id="mrsa" class="inp-cbx" value="mrsa" name="mrsa" v-model="form.mrsa"/>
            <label for="mrsa" class="cbx larger-label"
              ><span>
                <svg viewBox="0 0 12 10" height="10px" width="12px">
                  <polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span
              ><span>Operat per MRSA</span>
            </label>
          </div>
        </div>
        <legend>Genero del pacient</legend>
        <div class="mydict">
          <div class="form__group">
            <label class="radio">
              <input type="radio" id="male" value="false" name="gender" v-model="form.gender">
              <span>Home</span>
            </label>
            <label class="radio">
              <input type="radio" id="female" value="true" name="gender" v-model="form.gender">
              <span>Dona</span>
            </label>
          </div>
        </div>
        <PrimaryButton type="submit">Consultar</PrimaryButton>
      </form>
    </div>
  </div>
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
  .rectangle {
    background-color: #f0f0f0;
    padding: 20px;
    border: 2px solid #333;
    border-radius: 10px;
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

  .form__group {
    display: flex;
    align-items: center;
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

.checkbox-wrapper-46 .inp-cbx:checked + .cbx span:first-child {
  background: #506eec;
  border-color: #506eec;
  animation: wave-46 0.4s ease;
}
.checkbox-wrapper-46 .inp-cbx:checked + .cbx span:first-child svg {
  stroke-dashoffset: 0;
}
.checkbox-wrapper-46 .inp-cbx:checked + .cbx span:first-child:before {
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

.mydict input[type="radio"]:checked + span {
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

</style>