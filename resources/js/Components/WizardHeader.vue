<script setup>
import UserDropdown from "@/Components/UserDropdown.vue";
import BreadcrumbsProgress from "@/Components/BreadcrumbsProgress.vue";

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
  }
});

const breadcrumbs = ["Cirurgía", "Operació", "Preguntes", "Resultat"];

</script>

<template>
    <div class="wizard-header-container">
      {{ props.idSurgery }}
      <BreadcrumbsProgress
        :breadcrumbs="breadcrumbs"
        :crumb="crumb"
        :setCrumb="setCrumb"
      />
      <UserDropdown :user="props.user" />
    </div>
</template>

<style scoped>

.wizard-header-container {
  display: grid;
  grid-template-columns: auto 175px;
  height: 50px;
  gap: 15px;
}

</style>