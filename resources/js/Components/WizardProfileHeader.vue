<script setup>
import UserDropdown from "@/Components/UserDropdown.vue";
import BreadcrumbsProgress from "@/Components/BreadcrumbsProgress.vue";
import LanguageSelect from '@/Components/LanguageSelect.vue';
import Logo from '@/Components/Logo.vue';



const props = defineProps({
  user: {
    type: Object,
    required: true
  }
});


</script>

<template>
  <div class="wizard-header-container">
    <Logo style="height: 8vh;"/>
    <div class="breadcrumbs-progress-container">
    
      <a href="/" class="breadcrumb-link">Pagina d'inici</a>
      
      <LanguageSelect  :user="props.user" class="language-select"/>
    </div>
    <UserDropdown  :user="props.user" class="user-dropdown" />

  </div>
</template>

<style scoped>
.wizard-header-container {
  padding: 20px; /* Reducir el espacio entre los elementos */
  display: grid;
  grid-template-columns: 15% 60% 20%; 
  align-items: center; 
  height: 50px; 
  gap: 15px;
}

.breadcrumbs-progress-container {
  background: #D9D9D9;
  border-radius: 10px;
  display: flex;
  align-items: center;
  padding: 0 15px; /* Reducir el espacio interno */
  justify-content: space-between;
  width: 100%;
}

.breadcrumb-link {
  color: #0239EB;
  font-size: 18px; /* Reducir el tamaño de fuente */
}

.language-select {
  height: 70px; /* Reducir el tamaño de fuente */
}

@media (max-width: 425px) {
  .breadcrumbs-progress-container {
    flex-direction: column;
  }
  .wizard-header-container {
    padding: auto;
    grid-template-columns: auto;
  }
  .breadcrumbs-progress-container a {
    margin-bottom: 10px;
  }
}
</style>

