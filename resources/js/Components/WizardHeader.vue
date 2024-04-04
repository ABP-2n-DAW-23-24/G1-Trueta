<script setup>
import UserDropdown from "@/Components/UserDropdown.vue";
import BreadcrumbsProgress from "@/Components/BreadcrumbsProgress.vue";
import HeaderButtonModal from "@/Components/HeaderButtonModal.vue";

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
  }

});

console.log(props.selectedSurgery);

const breadcrumbs = ["Cirurgía", "Operació", "Preguntes", "Resultat"];

</script>

<template>
    <div class="wizard-header-container">
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
      />
      <UserDropdown :user="props.user" />
    </div>
</template>

<style scoped>

.wizard-header-container {
  display: grid;
  grid-template-columns: auto 50px 175px;
  min-height: 50px;
  gap: 15px;
}

@media (max-width: 479px) {
  .wizard-header-container {
    grid-template-columns: auto;
    grid-template-rows: 50px 50px 50px;
  }

  .breadcrumbs {
    grid-row: 2;
  }

  .breadcrumb-button-modal {
    grid-row: 3;
  }
}

</style>