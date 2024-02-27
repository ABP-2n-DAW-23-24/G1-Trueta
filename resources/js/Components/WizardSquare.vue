<script setup>
import { defineProps } from 'vue';

const props = defineProps({
  name: {
    type: String,
    required: true
  },
  type: {
    type: Boolean,
    required: true
  }
});
</script>

<template>
    <div class="column m-5 box is-size-2 has-text-centered is-full"
      :class="{
        'has-surgery has-text-white': type === 'cirugia',
        'has-subSurgery has-text-white': type === 'subcirugia'
      }" style="height: 250px; max-width: 250px; display: flex; justify-content: center; align-items: center; border-radius: 15px;">
      {{ name.toUpperCase() }}
    </div>
  </template>  

<style>
.has-subSurgery {
    background-color: #34bbca;
    min-width: 250px;
    @media (max-width: 430px) {
      min-width: 200px;
      max-height: 200px;
    }
}
.has-surgery {
    background-color: #1131d4;
    min-width: 250px;
    @media (max-width: 430px) {
      min-width: 200px;
      max-height: 200px;
  }
}
</style>