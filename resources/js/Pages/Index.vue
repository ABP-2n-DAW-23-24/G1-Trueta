<script setup>

import { ref,watch, defineProps } from 'vue';
import Footer from '@/Components/Footer.vue';
import Logo from '@/Components/Logo.vue';
import Aside from '@/Components/Aside.vue';
import Wizard from '@/Components/Wizard.vue';
import { Head } from '@inertiajs/vue3';


const selectedSurgery = ref(1);
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
});

const hoveredSurgery = ref(-1);
const hoveredOperation = ref(-1);

const selectedOperation = ref(0);

function setSelectedOperation(value) {
  console.log(value, "aaa");
  selectedOperation.value = value;
}


// funcio toggleHoverOperation: passar id de la operació

// funcio toggleHoverSurgery: passar id de la cirurgia
function setHoveredSurgery(id) {
  hoveredSurgery.value = id;
}

function setHoveredOperation(id) {
  hoveredOperation.value = id;
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
        :toggleCollapse="toggleCollapse"
        :setSelectedOperation="setSelectedOperation"
        :selectedOperation="selectedOperation"
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
