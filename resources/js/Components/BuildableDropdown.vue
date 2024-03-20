<script setup>
import { ref, defineProps, onMounted, onUnmounted } from 'vue';
import DropdownLink from '@/Components/DropdownLink.vue';

const props = defineProps({
  user: Object,
  routes: Object,

});

const isDropdownUnfolded = ref(false);

function toggleDropdown(event) {
  isDropdownUnfolded.value = !isDropdownUnfolded.value;
}

function handleClickOutside(event) {
  const dropdownContainer = document.querySelector('.buildable-dropdown-container');
  if (dropdownContainer && !dropdownContainer.contains(event.target)) {
    isDropdownUnfolded.value = false;
  }
}

onMounted(() => {
  document.addEventListener('click', handleClickOutside);
});

onUnmounted(() => {
  document.removeEventListener('click', handleClickOutside);
});

</script>
<template>
  <div class="buildable-dropdown-container">
    <button
      @click="toggleDropdown"
      type="button">
      <span>{{ user.name.toUpperCase() }} {{ user.surnames.toUpperCase() }}</span>
      <img
        src="../../assets/svg/arrow.svg"
        alt="arrow"
        :style="{ transform: isDropdownUnfolded ? 'rotate(180deg)' : 'rotate(0deg)' }"
      />
    </button>
    <div
    
    v-show="isDropdownUnfolded"
    class="dropdown-options">
    <div  v-for="dropdownRoute in routes">
      
      <DropdownLink
       
        class="dropdown-link"
        :href="route(dropdownRoute.route)"
        :method="dropdownRoute.method ?? 'GET'"
        as="button"   v-if="(user.isAdmin==true) || (dropdownRoute.isManager==1 && user.isManager==true) 
        || (dropdownRoute.isManager==0  && dropdownRoute.isAdmin==0 )"   
> {{ dropdownRoute.label }}
      </DropdownLink>
    </div>
  </div>
  </div>
</template>

<style scoped>
  .buildable-dropdown-container {
    height: 100%;
    width: 100%;
    background: #D9D9D9;
    border-radius: 10px;
    position: relative;
  }

  .buildable-dropdown-container button {
    height: 100%;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 5px 10px;
    gap: 5px;
  }

  .buildable-dropdown-container img {
    height: 20px;
  }

  .dropdown-options {
    position: absolute;
    margin-top: 10px;
    min-width: 100%;
    width: fit-content;
    border-radius: 10px;
    overflow: hidden;
    border: 1px solid #D9D9D9;
    z-index: 1000;
  }

  .dropdown-link {
    width: 100%;
    padding: 10px 15px;
    background: #f5f5f5;
    text-align: left;
  }

  .dropdown-link:not(:last-child) {
    border-bottom: 1px solid #D9D9D9;
  }

  .dropdown-link:hover {
    background: #D9D9D9;
  }
</style>
