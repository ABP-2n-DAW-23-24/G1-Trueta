<script setup>
import UserDropdown from "@/Components/UserDropdown.vue";
import BreadcrumbsProgress from "@/Components/BreadcrumbsProgress.vue";
import HeaderButtonModal from "@/Components/HeaderButtonModal.vue";
import { onMounted, ref } from "vue";

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
  traductions:{
    type: Object,
  },
  setResumes: {
    type: Function,
    required: true
  },
  resumes: {
    type: Array,
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
  }

});
const headerContainer = ref(null);

onMounted(() => {
  const recalculate = () => {
    console.log(props.crumb);
    const screenWidth = document.documentElement.clientWidth;
    if (props.crumb < 2) {
      if (screenWidth < 479) {
        if (props.user.isAdmin) {
          headerContainer.value.style.gridTemplateRows = '50px 50px 50px';
        } else {
          headerContainer.value.style.gridTemplateRows = '50px 50px';

        }
      } else {
        headerContainer.value.style.gridTemplateRows = '50px';
      }
    } else {
      if (screenWidth < 479) {
        headerContainer.value.style.gridTemplateRows = '50px 50px';
      } else {
        headerContainer.value.style.gridTemplateRows = '50px';
      }
    }
  };
  recalculate();
  window.addEventListener("resize", () => {
console.log(props.user);

    // console.log(window.innerWidth);
    recalculate();
  });
})


const breadcrumbs = ["Cirurgía", "Operació", "Preguntes", "Resultat"];

</script>

<template>
    <div
      class="wizard-header-container"
      ref="headerContainer"
      :style="{
        'grid-template-columns': (props.crumb < 2 && props.user.isAdmin) ? 'auto 50px 175px' : 'auto 175px',
      }"
    >
      {{ props.idSurgery }}
      <BreadcrumbsProgress
        :breadcrumbs="breadcrumbs"
        :crumb="crumb"
        :setCrumb="setCrumb"
        :setResumes="props.setResumes"
        :resumes="resumes"
        class="breadcrumbs"
        :user="props.user"
      />
      <HeaderButtonModal
        :breadcrumbs="breadcrumbs"
        :crumb="crumb"
        :setCrumb="setCrumb"
        :user="props.user"
        class="breadcrumb-button-modal"
        :setSelectedSurgery="props.setSelectedSurgery"
        :selectedSurgery="props.selectedSurgery"
        :selectedOperation="props.selectedOperation"
        :setSelectedOperation="props.setSelectedOperation"
        :setSurgeries="props.setSurgeries"
        :surgeries="props.surgeries"
      />
      <UserDropdown :user="props.user" :traductions="props.traductions" />
    </div>
</template>

<style scoped>
.wizard-header-container {
  display: grid;
  min-height: 50px;
  gap: 15px;
}

@media (max-width: 479px) {
  .wizard-header-container {
    grid-template-columns: auto !important;
    grid-template-rows: 50px 50px;
  }

  .breadcrumbs {
    grid-row: 2;
  }

  .breadcrumb-button-modal {
    grid-row: 3;
  }
}

</style>