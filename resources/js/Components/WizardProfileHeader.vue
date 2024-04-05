<script setup>
import UserDropdown from "@/Components/UserDropdown.vue";
import BreadcrumbsProgress from "@/Components/BreadcrumbsProgress.vue";
import LanguageSelect from '@/Components/LanguageSelect.vue';
import Logo from '@/Components/Logo.vue';



const props = defineProps({
  user: {
    type: Object,
    required: true
  },
  traductions:{
    type:Object,
    required:true
  }
});


</script>

<template>
  <div class="wizard-header-container">
    <Logo class="logo"/>
    <div class="right-menu">
    
    <div class="breadcrumbs-progress-container">
      <LanguageSelect :user="props.user" class="language-select" />
    </div>
    <UserDropdown :user="props.user" :traductions="props.traductions" class="user-dropdown" />
</div>
  </div>
</template>

<style scoped>
.wizard-header-container {
  display: flex;
  justify-content: space-between;
  width: 100%;

}

.logo{
  width: 250px;
  height: 50px;
}

.right-menu {
 display: grid;
  grid-template-columns: auto 175px;
  gap: 15px;
  width: 100%;
}


.breadcrumbs-progress-container {
  background: #ffffff;
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: flex-end;
  width: 100%;
  height: 50px;

}

.breadcrumb-link {
  color: #0239EB;
  font-size: 18px;

}


@media (max-width: 768px) {
  .right-menu {
    display: grid;
    grid-template-columns: auto 175px;
    gap: 15px;
    width: 100%;
    height: 50px;
  }
}

@media screen and (max-width: 600px){

  .wizard-header-container {
    display: grid;
    grid-template-columns: 1fr;
    gap: 15px;
    width: 100%;
  }
  .logo {
    justify-content: center !important;
    width: 100%;
  }
  .right-menu {
    display: grid;
    grid-template-columns: 1fr;
    gap: 15px;
    width: 100%;
    height: 50px;
  }

  .breadcrumbs-progress-container {
    display: grid;
    grid-template-columns: 1fr;
    gap: 15px;
    width: 100%;
    height: 50px;
  }
}
</style>
