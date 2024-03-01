<script setup>
import { ref,onMounted  } from 'vue';
import DropdownLink from '@/Components/DropdownLink.vue';
//values for use the component
const props = defineProps({
  text: Object,

  routes: Object
})
const menuVisible = ref(false);
const mainRef = ref(null);
const childRef = ref(null);

const topPosition = ref(0);
//Validate height for dropdown
onMounted(() => {
  if (mainRef.value) {
    topPosition.value = mainRef.value.offsetHeight;
  }
})

//Detect event for clear dropdown 
function handleClickOutside(event) {
  if (menuVisible.value && !mainRef.value.contains(event.target) && !childRef.value.contains(event.target)) {
    menuVisible.value = false;
  
    document.removeEventListener('click', handleClickOutside);
  }
}
//show dropdown
function toggleMenu(event) {
  menuVisible.value = !menuVisible.value;

  if (menuVisible.value) {
    document.addEventListener('click', handleClickOutside);
  } else {
    document.removeEventListener('click', handleClickOutside);
  }

  event.stopPropagation();
}


</script>
<template>
    <div class="relative inline-block text-left h-full" style="height: 100%;">
      <div style="height: 100%;">
        <button @click="toggleMenu" 
          class="inline-flex items-center justify-center w-full px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none "
          type="button" style="width: fit-content;height: 100%;background-color: #D9D9D9;border:none;" :style="{fontSize:text.font_size}"  ref="mainRef">

          {{ text.text }}

          <svg :class="menuVisible ? 'transform rotate-180' : ''" class="w-5 h-5 ml-2 -mr-1"
            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd"
              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
              clip-rule="evenodd" />
          </svg>
        </button>
      </div>
      <div v-show="menuVisible"
       ref="childRef"
       class="origin-top-right absolute right-0 mt-2 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-10"
       role="menu"
       aria-orientation="vertical"
       aria-labelledby="menu-button"
       tabindex="-1"
       style="min-width: 100%; max-width: max-content;background-color: #D9D9D9;"
       :style="{ top: topPosition + 'px' }">
    <div class="py-1" role="none" v-for="(i, index) in routes">
      <DropdownLink :href="route(i.routeName)" :method="i.method"> {{ i.label }} </DropdownLink>

    </div>
  </div>




        
    </div>
</template>
<style>
.relative {
  position: relative;
}

.inline-block {
  display: inline-block;
}

.text-left {
  text-align: left;
}

.inline-flex {
  display: inline-flex;
}

.items-center {
  align-items: center;
}

.justify-center {
  justify-content: center;
}

.w-full {
  width: 100%;
}

.rounded-md {
  border-radius: 0.375rem;
}

.border {
  border-width: 1px;
}

.border-gray-300 {
  border-color: #d2d6dc;
}

.shadow-sm {
  box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
}

.px-4 {
  padding-left: 1rem;
  padding-right: 1rem;
}

.py-2 {
  padding-top: 0.5rem;
  padding-bottom: 0.5rem;
}

.bg-white {
  background-color: white;
}

.text-sm {
  font-size: 0.875rem;
  /* 14px */
}

.font-medium {
  font-weight: 500;
}

.text-gray-700 {
  color: #4a5568;
}

.hover\:bg-gray-50:hover {
  background-color: #f9fafb;
}

.focus\:outline-none:focus {
  outline: 0;
}

.w-5 {
  width: 1.25rem;
  height: 1.25rem;
}

.ml-2 {
  margin-left: 0.5rem;
}

.-mr-1 {
  margin-right: -0.25rem;
}

.transform {}

.rotate-180 {
  transform: rotate(180deg);
}


.origin-top-right {
  transform-origin: top right;
}

.absolute {
  position: absolute;
}

.w-56 {
  width: 14rem;
  /* 224px */
}

.mt-2 {
  margin-top: 0.5rem;
}

.rounded-md {
  border-radius: 0.375rem;
}

.shadow-lg {
  box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
}

.bg-white {
  background-color: white;
}

.ring-1 {
  box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.05);
}

.ring-black {
  box-shadow: 0 0 0 1px rgba(0, 0, 0, 1);
}

.ring-opacity-5 {
  box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.05);
}

.focus\:outline-none:focus {
  outline: 0;
}

.z-10 {
  z-index: 10;
}


.py-1 {
  padding-top: 0.25rem;
  padding-bottom: 0.25rem;
}</style>
