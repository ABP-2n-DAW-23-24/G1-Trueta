<script setup>

import { ref,watch, defineProps } from 'vue';
import Footer from '@/Components/Footer.vue';
import Logo from '@/Components/Logo.vue';
import Aside from '@/Components/Aside.vue';
import Wizard from '@/Components/Wizard.vue';
import { Head } from '@inertiajs/vue3';
import { onMounted } from 'vue';


let letters = [];

const EASTER_EGGS = [
  {
    "word": ["R", "I", "C", "K", "R", "O", "L", "L"],
    "url": "https://www.youtube.com/watch?v=dQw4w9WgXcQ"
  },
  {
    "word": ["S", "T", "A", "R", "W", "A", "R", "S"],
    "url": "https://www.youtube.com/watch?v=JMDoAdGsdNU"
  },
  {
    "word": ["ArrowUp", "ArrowUp", "ArrowDown", "ArrowDown", "ArrowLeft", "ArrowRight", "ArrowLeft", "ArrowRight"],
    "url": "https://www.youtube.com/watch?v=Zcb8yPEItwA"
  }
]

onMounted(() => {
  window.addEventListener('keydown', (e) => {
    letters.push(e.key);
    if (letters.length > 8) {
      letters.shift();
    }
    EASTER_EGGS.forEach((egg) => {
      if (egg.word.every((letter, index) => letter === letters[index])) {
        window.open(egg.url, '_blank');
      }
    });
  });
});


const selectedSurgery = ref(1);
const questions = ref([]);
const selectedQuestions = ref([]);
const resumes = ref([]);
const isLoading = ref(true);
function setSelectedSurgery(value) {
  selectedSurgery.value = value;
}


const collapsed = ref(null);

const toggleCollapse = (id) => {
  if (collapsed.value == id) {
    collapsed.value = null;
    setCrumb(0);
    return;
  }
  
  setSelectedSurgery(id - 1);
  collapsed.value = id;
  setCrumb(1);
};

const crumb = ref(0);

function setCrumb(value) {
  crumb.value = value;
  if (value == 0) {
    collapsed.value = null;
    selectedOperation.value = 0;
  }
  if (value == 1) {
    selectedOperation.value = 0;
  }
}

const user = ref({})
const props = defineProps({
    user: Object,
    traductions: Object

});
let traductions=JSON.parse(props.traductions)
const surgeries = ref([]);

const hoveredSurgery = ref(-1);
const hoveredOperation = ref(-1);

const selectedOperation = ref(0);

function setSelectedOperation(value) {
  crumb.value = 2;
  selectedOperation.value = value;
  questions.value = [];
  selectedQuestions.value = [];
  resumes.value = [];
  axios.get(`/get-questions/${value}`)
  .then(response => {
    questions.value = response.data.questionsOperation;
  })
  .finally(() => {
    isLoading.value = false;
  });
}

function setSurgeries(value) {
  surgeries.value = value;
}

function setHoveredSurgery(id) {
  hoveredSurgery.value = id;
}

function setHoveredOperation(id) {
  hoveredOperation.value = id;
}

function setIsLoading(value) {
  isLoading.value = value;
}

function setSelectedQuestions(value) {
  selectedQuestions.value = value;
}

function setResumes(value) {
  resumes.value = value;
}


</script>
<template>
  <Head title="Index" />
  <div class="index-container">
    <div class="col-left">
      <Logo class="logo" />
      <Aside
        :setCrumb="setCrumb"
        :selectedSurgery="selectedSurgery"
        :setSelectedSurgery="setSelectedSurgery"
        :setHoveredSurgery="setHoveredSurgery"
        :setHoveredOperation="setHoveredOperation"
        :collapsed="collapsed"
        :toggleCollapse="toggleCollapse"
        :setSelectedOperation="setSelectedOperation"
        :selectedOperation="selectedOperation"
        :hoveredSurgery="hoveredSurgery"
        :hoveredOperation="hoveredOperation"
        :surgeries="surgeries"
      />
    </div>
    <div class="col-right">
      <Wizard
        :setCrumb="setCrumb"
        :crumb="crumb"
        :selectedSurgery="selectedSurgery"
        :hoveredSurgery="hoveredSurgery"
        :hoveredOperation="hoveredOperation"
        :setHoveredOperation="setHoveredOperation"
        :setHoveredSurgery="setHoveredSurgery"
        :setSelectedSurgery="setSelectedSurgery"
        :user="props.user"
        :traductions="traductions" 
        :toggleCollapse="toggleCollapse"
        :setSelectedOperation="setSelectedOperation"
        :selectedOperation="selectedOperation"
        :questions="questions"
        :selectedQuestions="selectedQuestions"
        :resumes="resumes"
        :isLoading="isLoading"
        :setIsLoading="setIsLoading"
        :setSelectedQuestions="setSelectedQuestions"
        :setResumes="setResumes"
        :surgeries="surgeries"
        :setSurgeries="setSurgeries"
      />
    </div>
  </div>
  <Footer />
</template>

<style scoped>

.logo {
  height: 50px;
}

.index-container {
  display: grid;
  grid-template-columns: 300px auto;
  margin: 0;
}

.col-left {
  padding: 30px;
  display: grid;
  grid-template-rows: auto 1fr;
  gap: 15px;
}

.col-right {
  padding: 30px;
}

@media (max-width: 768px) {
  .index-container {
    grid-template-columns: none;
  }

  .col-right {
    padding-top: 0px;
  }
}
</style>
